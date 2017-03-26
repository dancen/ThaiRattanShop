<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;

// this class manage shop tasks related to orders

class ShopOrdersFacade {

    private $shopper;

    public function __construct( Shopper $shopper ) {

        $this->shopper = $shopper;
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
     * setOrder - set the order in the shopper object
     *
     * @param  null
     * @return ShopOrdersFacade
     */
    public function setLastOrder() {

        $email = $this->shopper->getEmail();
        $order = \App\Models\Orders\Orders::findLastOrderbyEmail($email);
        $this->shopper->setLastOrder($order);

        // return the shopper
        return $this;
    }

    /**
     * callPaymentService - execute a call to a external payment method 
     * such as paypal and return a transaction code
     *
     * @param  null
     * @return ShopOrdersFacade
     */
    public function setPaymentCode() {

        // calls a web service payment 
        $paymentcode = "12345678910";

        $this->shopper->setPaymentCode($paymentcode);

        // return the shopper
        return $this;
    }

    /**
     * buildOrder - build the order and set last id in the shopper object
     *
     * @param  array
     * @return ShopOrdersFacade
     */
    public function buildOrder($order_params) {

        $builder = new \App\Models\Orders\OrderBuilder(\App\Models\Orders\OrdersFactory::createOrder());

        // set the first_name
        $builder->populate("first_name", $order_params["first_name"]);

        // set the last_name
        $builder->populate("last_name", $order_params["last_name"]);

        // set the email
        $builder->populate("email", $this->shopper->getEmail());

        // set the phone
        $builder->populate("phone", $order_params["phone"]);

        // set the address
        $builder->populate("address", $order_params["address"]);

        // set the country
        $builder->populate("country", 'THAILAND');

        // set the city
        $builder->populate("city", $order_params["city"]);

        // set the province
        $builder->populate("province", $order_params["province"]);

        // set the zip
        $builder->populate("zip", $order_params["zip"]);

        // set the instruction
        $builder->populate("instruction", $order_params["instruction"]);

        // set the delivery_area       
        $builder->populate("delivery_area", $order_params["province"]);

        // set the shipping_cost
        $builder->populate("shipping_cost", $order_params["shipping_cost"]);

        // set the total_amount
        $builder->populate("total_amount", $order_params["total_amount"]);

        // set the payment_code
        $builder->populate("payment_code", '');

        // set the created_at
        $builder->populate("created_at", new \DateTime("now"));

        // set the updated_at
        $builder->populate("updated_at", new \DateTime("now"));

        // build the order
        $builder->build();

        // save to DB
        $neworder = $builder->save();

        // save the last insert id in shopper object
        $this->shopper->setLastInsertOrderId($neworder->id);

        // return the shopper
        return $this;
    }

    /**
     * finalizeOrder - complete and update the order in the shopper object
     *
     * @param  null
     * @return ShopOrdersFacade
     */
    public function finalizeOrder() {


        // retrive last insert id from shopper Object
        $order_id = $this->shopper->getLastInsertOrderId();
        $paymentcode = $this->shopper->getPaymentCode();

        // retrieve the order by id
        $order = \App\Models\Orders\Orders::findById($order_id);

        //check if
        if ($order != null) {

            // assign payment code and update the order
            $builder = new \App\Models\Orders\OrderBuilder($order);
            $builder->populate("payment_code", $paymentcode);
            $builder->populate("updated_at", new \DateTime("now"));
            $builder->build();
            $builder->save();

            // update the last insert id in shopper object
            $this->shopper->setLastInsertOrderId($order->id);

            // set the new order in shopper object
            $this->shopper->setOrder($order);

            // return the shopper
            return $this;
        } else {
            return null;
        }
    }

    /**
     * updateCoupon - update the coupon 
     *
     * @param  null
     * @return ShopOrdersFacade
     */
    public function updateCoupon() {

        $subscriber = $this->shopper->getSubscriber();

        // assign used 1 to consume the coupon
        // first time discount 30% next purchasing 20%             
        $strategy = new \App\Models\Coupon\CouponUpdater($subscriber);
        $coupontype = $strategy->downgradeCoupon();

        // update subscripber to DB
        $subscriber->save();

        // set the coupon type 
        $this->shopper->setCouponType($coupontype);

        // store in shopper object email related to the subscriber
        $this->shopper->setEmail($subscriber->email);

        // return the shopper
        return $this;
    }

    /**
     * savePurchase - save the purchase 
     *
     * @param  null
     * @return ShopOrdersFacade
     */
    public function savePurchase() {

        // retrieve shopping cart and coupon from shopper object
        $cart = $this->shopper->getCart();
        $coupon = $this->shopper->getCouponCode();
        $last_order_id = $this->shopper->getLastInsertOrderId();
        $discount = $this->shopper->getDiscount();

        // loop in the cart and save items
        // to the purchase object
        foreach ($cart->getCollection() as $item) {

            // create a new Purchase object and populate
            // with order data and extract cart data
            $purchase = new \App\Models\Purchase;

            // set order data
            $purchase->order_id = $last_order_id;
            $purchase->discount = $discount;
            $purchase->coupon = $coupon;

            // serialize the product stored in the cart
            // and assign to the product property
            // the product object is saved as a string
            $purchase->product = serialize($item);

            // set more data from cart to purchase object
            $purchase->quantity = $item->getQuantity();
            $purchase->rattan_color = $item->getRattanColor();
            $purchase->fabric_color = $item->getFabricColor();

            // set datetime           
            $purchase->created_at = new \DateTime("now");
            $purchase->updated_at = new \DateTime("now");

            // save the purchase to DB 
            $purchase->save();
        }

        // return the shopper
        return $this;
    }

   

}
