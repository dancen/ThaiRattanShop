<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;
use App\Models\Shop\ShopMediatorInterface;

// this class manage shop tasks related to cart

class ShopCartFacade {

    private $shopper;

    public function __construct( ShopMediatorInterface $mediator ) {

        $this->shopper = $mediator->getShopper();
    }
    
    /**
     * getShopper() - set discount in shopper object
     *
     * @param  null
     * @return Shopper
     */
    public function getShopper() {
        return $this->shopper;
    }

   
    /**
     * updateCart() - update Cart adding a product
     *
     * @param  array
     * @return ShopCartFacade
     */
    public function updateCart($update_params) {

        // retrieving the cart stored in the shopper object
        // and update adding the product
        $couponcode = $update_params["couponcode"];
        $cart = $this->shopper->getCart();
        $product = $this->shopper->getProduct();
        $subscriber = $this->shopper->getSubscriber();

        // check if subcriber is stored in shopper object
        if (!$subscriber) {
            //retrieve subscriber data by coupon code
            $subscriber = \App\Models\Subscriber\Subscriber::findSubscriberByCoupon($couponcode);
            // store in shopper object the subscriber
            $this->shopper->setSubscriber($subscriber);
        }

        if ($cart != null) {

            // add product to cart
            $cart->addItem($product);
        } else {

            // create a new Cart adding the first product
            // save the cart in shared data
            $cart = new \App\Models\Cart\Cart;
            $cart->addItem($product);

            /*
              |--------------------------------------------------------------------------
              | COUPON STRATEGY BY SUBSCRIBER
              |--------------------------------------------------------------------------
              |
              | the coupon is entry point to create a shopping cart, without a valid
              | coupon users cannot order products. The shop has 3 types of coupons
              | NoCoupon - not implemented ( get the same TopCoupon Discount )
              | RegularCoupon - get the 20% Discount
              | TopCoupon - get the 30% Discount
              | The coupon owned by the user is a TopCoupon for the first purchase
              | and it changes to RegularCoupon for the subsequent purchases
             */

            // implement the Strategy Pattern and The Factory Pattern
            // to get the right discount based on the type of coupon owned by the user
            $strategy = new \App\Models\Coupon\CouponStrategy($subscriber);

            // get a coupon factory
            $factory = $strategy->getCouponFactory();

            // get a coupon object
            $coupon = $factory->createCoupon();

            // set the discount type
            $coupon->setDiscountType(new \App\Models\Discount\ProductDiscount());

            // get the discount
            $discount = $coupon->getDiscount();


            /*
              |--------------------------------------------------------------------------
              | STORING DATA TO SHAREDATA OBJECT
              |--------------------------------------------------------------------------
              |
              | coupon, discount and subscriber's email are saved in SharedData Object
             */

            // store the discount percentage in shopper object
            $this->shopper->setDiscount($discount);
        }

        // store in shopper object email related to the subscriber
        $this->shopper->setEmail($subscriber->email);

        // set the cart in shopper object       
        $this->shopper->setCart($cart);

        // store in shopper object the coupon code entered by the user
        $this->shopper->setCouponCode($couponcode);

        // return the shopper
        return $this;
    }

   
    
    
    /**
     * setQuantityChangedAjax - set a new quantity and provide array to the view 
     *
     * @param  \App\Models\Delivery\Delivery
     * @param  \App\Models\Cart\Cart
     * @return array
     */
    public function setQuantityChangedAjax( $areaobj , $cart ) {
        
        // calculate delivery cost and store in session
        $calculator = new \App\Models\Delivery\StandardDeliveryAreaCalculator($areaobj, $cart);

        // calculate the delivery cost
        $delivery_cost = $calculator->calculateDeliveryCost();
        
        $this->shopper->setDeliveryArea($areaobj->area);
        $this->shopper->setDeliveryCost($delivery_cost);        
        
        // format values to show in view
        $cart_total_price_list_formatted = \App\Models\Helper::formatCurrency( $cart->getAmount() );
        $cart_total_formatted = \App\Models\Helper::formatCurrency( \App\Models\Helper::calculateDiscount( $cart->getAmount(), $this->shopper->getDiscount() ));
        $delivery_cost_formatted = \App\Models\Helper::formatCurrency( $this->shopper->getDeliveryCost() );
        $grand_total_formatted = \App\Models\Helper::formatCurrency( \App\Models\Helper::sum( \App\Models\Helper::calculateDiscount( $cart->getAmount(), $this->shopper->getDiscount() ) , $this->shopper->getDeliveryCost() ) );
        
        
        // create the response array
        $arraycost = array("delivery_area" => $this->shopper->getDeliveryArea(),
                           "delivery_cost" => $delivery_cost_formatted,
                           "cart_total" => $cart_total_formatted,
                           "grand_total" => $grand_total_formatted,
                           "cart_total_price_list" => $cart_total_price_list_formatted,
                           "cart_number_of_items" => $cart->getNumOfItems() );

        // return the array
        return $arraycost;
    }
    

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  integer
     * @return ShopCartFacade
     */
    public function removeItem($item_id) {

        // remove item from the cart and update the shopper object
        $cart = $this->shopper->getCart();
        $cart->removeItem($item_id);
        $this->shopper->setCart($cart);

        // return the shopper
        return $this;
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  array
     * @return ShopCartFacade
     */
    public function updateItem($item_params) {

        // remove item from the cart and update the shopper object
        $cart = $this->shopper->getCart();
        $cart->updateItem($item_params["item_id"], $item_params["qty"]);
        $this->shopper->setCart($cart);

        // return the shopper
        return $this;
    }

   

}
