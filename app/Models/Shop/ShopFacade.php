<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;

// this class retrun static method for useful tasks provided in the template

class ShopFacade {

    private $shopper;

    public function __construct( Shopper $shopper ) {

        $this->shopper = $shopper;
    }

    public function init() {
        /*
          |--------------------------------------------------------------------------
          | INITIALIZE SHOP PARAMETERS
          |--------------------------------------------------------------------------
          |
          | setDiscount() and initDeliveryCost() initialize the default delivery cost
          | and the default discount value ( if not already present in session,
          | methods load in session default variables in the shopper object.
          |
         */

        $this->initDiscount();
        $this->initDeliveryCost();
        $this->loadDeliveryAreas();

        // return the shopper
        return $this;
    }

    public function getShopper() {
        return $this->shopper;
    }

    /**
     * getProductCategories() - set all categories of product in shopper object
     *
     * @param  null
     * @return Collection
     */
    public function getProductCategories() {
        return $this->shopper->getCategories();
    }

    /**
     * setProductCategories() - get all categories of product
     *
     * @param  null
     * @return $this
     */
    public function setProductCategories() {


        /**
         * findAll() method retrieve all categories
         *
         * @param  null
         * @return Collection
         */
        $categories = \App\Models\Category\Category::findAll();

        /**
         * store category list in shopper object
         * to avoid repetitives db calls
         *
         * @param  \Illuminate\Http\Request  $request
         * @param   \App\Models\Category\Category  $categories
         * @return null
         */
        $this->shopper->setCategories($categories);

        // return the shopper
        return $this;
    }

    /**
     * setDiscount() - set discount in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDiscount() {

        if (!$this->shopper->getDiscount()) {

            // set the discount based on No coupon
            $factory = new \App\Models\Coupon\CouponFactory(new \App\Models\Coupon\NoCoupon\NoCouponType);

            // get a coupon object
            $coupon = $factory->createCoupon();

            // set the discount type
            $coupon->setDiscountType(new \App\Models\Discount\ProductDiscount());

            // get the discount
            $discount = $coupon->getDiscount();
            $this->shopper->setDiscount($discount);
        }

        // return the shopper
        return $this;
    }

    /**
     * initDeliveryCost() - set the initial delivery cost in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDeliveryCost() {

        if (!$this->shopper->getDeliveryCost()) {

            // load the free Delivery to seesion
            $delivery = new \App\Models\Delivery\FreeDeliveryAreaCalculator();
            $this->shopper->setDeliveryCost($delivery->calculateDeliveryCost());
        }

        // return the shopper
        return $this;
    }

   

    /**
     * setCategory() - get category by slug
     *
     * @param  null
     * @return $this
     */
    public function setCategory($slug) {

        // retrive category by slug
        $category = \App\Models\Category\Category::findCategoryBySlug($slug);

        // check if the category is valid
        if ($category instanceof \App\Models\Category\Category) {

            // update the shopper
            $this->shopper->setCategory($category);
            // return the shopper
            return $this;
        } else {

            return null;
        }
    }

    /**
     * setProducts() - get products by category id 
     *
     * @param  null
     * @return $this
     */
    public function setProducts() {

        // get Category from shopper object
        $category = $this->shopper->getCategory();
        // retrieves products by category 
        $products = \App\Models\Product\Product::findProductsByCategoryId($category->id);

        // check if the category is valid
        if ($products != null) {

            // update the shopper
            $this->shopper->setProducts($products);
            // return the shopper
            return $this;
        } else {

            return null;
        }
    }

    /**
     * setProduct() - get product by slug
     *
     * @param  null
     * @return $this
     */
    public function setProduct($slug) {

        // retrieve the product from DB
        $product = \App\Models\Product\Product::findProductBySlug($slug);

        //check if
        if ($product != null) {
            $this->shopper->setProduct($product);
            // return the shopper
            return $this;
        } else {

            return null;
        }
    }

    /**
     * populateProduct() - set product properties
     *
     * @param  null
     * @return $this
     */
    public function populateProduct($product_params) {

        $product = $this->shopper->getProduct();

        $product->setQuantity($product_params["qty"]);
        $product->setRattanColor($product_params["rc"]);
        $product->setFabricColor($product_params["fc"]);

        $this->shopper->setProduct($product);

        // return the shopper
        return $this;
    }

    /**
     * updateCart() - update Cart adding a product
     *
     * @param  null
     * @return $this
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
     * load the delivery areas 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function loadDeliveryAreas() {


        /*
          |--------------------------------------------------------------------------
          | DELIVERY AREAS
          |--------------------------------------------------------------------------
          |
          | delivery areas are stored in shared data and they populate the
          | html select element for calculating the delivery cost
          |
         */

        if (!$this->shopper->getDeliveryAreas()) {

            /**
             * if delivery areas that populate the html select element
             * is not present in shared data it will be retrieved from
             * database. 
             *
             * @return \App\Models\Product\Delivery $areas
             */
            // retrieving the areas to fill the delivery combo 
            $areas = \App\Models\Delivery\Delivery::findAll();
            
            /**
             * if delivery areas that populate the html select element
             * is not present in shared data it will be retrieved from
             * database. 
             *
             * @return \App\Models\Product\Delivery $areas
             */
            // retrieving the areas to fill the delivery combo 
            $allfields = \App\Models\Delivery\Delivery::findComplete();

            // store delivery areas in shopper object form html select
            $this->shopper->setDeliveryAreas($areas);
            
            // store all fields delivery areas in shopper object for delivery cost calculation
            $this->shopper->setDeliveryAreasComplete($allfields);
        }

        // return the shopper
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryAreaId() {


        $email = $this->shopper->getEmail();
        $delivery_area = $this->shopper->getDeliveryArea();
        $free_delivery = \App\Models\Delivery\FreeDeliveryAreaCalculator::DEFAULT_DELIVERY_AREA;

        // the user may have placed already a order
        // in this case we load the last delivery area
        // specified. this for delivery cost calculation
        // before creating the cart
        $order = \App\Models\Orders\Orders::findLastOrderbyEmail($email);


        if ($order) {

            // execute logic
            // the delivery area is not empty

            if (( $order->delivery_area != null ) &&
                    // the delivery area is different from the default value
                    ( $order->delivery_area != $free_delivery ) &&
                    // the delivery area is not stored in session
                    ( $delivery_area == null )) {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($order->delivery_area);
            } else {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($delivery_area);
            }
        } else {

            // in case the user are placing the first order we check the session
            // in case the session is empty we set the default delivery area

            if ($delivery_area == null) {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($free_delivery);
            } else {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($delivery_area);
            }
        }

        // set the delivery area id
        $this->shopper->setDeliveryAreaId($area->id);

        // return the shopper
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryChanged($delivery_area_id = null) {

        $delivery_area_id != null ?
                        $area_id = $delivery_area_id :
                        $area_id = $this->shopper->getDeliveryAreaId();

        $cart = $this->shopper->getCart();

        // retrieving the area by id
        $area = \App\Models\Delivery\Delivery::findByAreaId($area_id);

        // calculate delivery cost and store in session
        $calculator = new \App\Models\Delivery\StandardDeliveryAreaCalculator($area, $cart);

        // calculate the delivery cost
        $delivery_cost = $calculator->calculateDeliveryCost();

        // update the delivery area and cost in shopper object
        $this->shopper->setDeliveryArea($area->area);
        $this->shopper->setDeliveryCost($delivery_cost);

        // return the shopper
        return $this;
    }
    
    
    
    /**
     * setDeliveryChangedAjax - set a new delivery area and provide array to the view 
     *
     * @param  \App\Models\Delivery\Delivery
     * @param  \App\Models\Cart\Cart
     * @return array
     */
    public function setDeliveryChangedAjax( $areaobj, $cart ) {

        // calculate delivery cost and store in session
        $calculator = new \App\Models\Delivery\StandardDeliveryAreaCalculator($areaobj, $cart);

        // calculate the delivery cost
        $delivery_cost = $calculator->calculateDeliveryCost();
        
        $this->shopper->setDeliveryArea($areaobj->area);
        $this->shopper->setDeliveryCost($delivery_cost);
        
        $cart_total_formatted = \App\Models\Helper::formatCurrency( \App\Models\Helper::calculateDiscount( $cart->getAmount(), $this->shopper->getDiscount() ));
        $delivery_cost_formatted = \App\Models\Helper::formatCurrency( $this->shopper->getDeliveryCost() );
        $grand_total_formatted = \App\Models\Helper::formatCurrency( \App\Models\Helper::sum( \App\Models\Helper::calculateDiscount( $cart->getAmount(), $this->shopper->getDiscount() ) , $this->shopper->getDeliveryCost() ) );
        
        
        // create the response array
        $arraycost = array("delivery_area" => $this->shopper->getDeliveryArea(),
                           "delivery_cost" => $delivery_cost_formatted,
                           "cart_total" => $cart_total_formatted,
                           "grand_total" => $grand_total_formatted );

        // return the array
        return $arraycost;
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
     * @param  null
     * @return null
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
     * @param  null
     * @return null
     */
    public function updateItem($item_params) {

        // remove item from the cart and update the shopper object
        $cart = $this->shopper->getCart();
        $cart->updateItem($item_params["item_id"], $item_params["qty"]);
        $this->shopper->setCart($cart);

        // return the shopper
        return $this;
    }

    /**
     * setOrder - set the order in the shopper object
     *
     * @param  null
     * @return null
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
     * @return null
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
     * @param  null
     * @return null
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
     * @return null
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
     * @return null
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
     * @return null
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

    /**
     * releaseCart - unset the cart in the shopper object
     *
     * @param  null
     * @return null
     */
    public function resetShopper() {

        // unset the cart
        $shopper = new Shopper();
        $shopper->setCouponCode($this->shopper->getCouponCode());
        $shopper->setDeliveryAreas($this->shopper->getDeliveryAreas());
        $shopper->setDeliveryArea($this->shopper->getDeliveryArea());
        $shopper->setCategories($this->shopper->getCategories());

        // unset the shopper
        $this->shopper = null;

        // assign the shopper
        $this->shopper = $shopper;

        // return the shopper
        return $this;
    }

}
