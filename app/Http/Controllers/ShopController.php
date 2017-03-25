<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Shop\ShopFacade;
use App\Models\Shop\Shopper;
use App\Models\Memento\Memento;

class ShopController extends Controller {
    /*
     * SUMMARY OF FUNCTIONALITIES
     * 
     * the application permits to order rattan furniture online.
     * The controller manages the following tasks.
     * showing categories, browsing products by categories,
     * showing details of products, adding products to cart,
     * removing products from cart, choose the delivery area,
     * calculate the delivery costs by delivery area,
     * entering datas to checkout, submitting a new order by email 
     * no online payment implemented yet
     * 
     */

    // initialize middlewares
    public function __construct() {
        
    }

    /**
     * Display a list of categories.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {


      
        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);
        $this->updateShopper( $shop->getShopper() );


        /*
          |--------------------------------------------------------------------------
          | RETRIEVING CATEGORIES
          |--------------------------------------------------------------------------
          |
          | the index action ( route(/index) ) is where the user can browse all
          | categories in the shop and can access to the product collection
          | category::findAll() retrieve all categories from DB
          |
         */
        
        
         try {

            /**
             * findAll() method retrieve all categories
             *
             * @param  null
             * @return Collection
             */
            $shop = $shop->setProductCategories();

            //check if
            if ($shop == null) {
                //throw exception if email is not valid
                throw new \App\Exceptions\CategoriesNotFoundException();
            }
           
            $this->updateShopper( $shop->getShopper() );
        } catch (\App\Exceptions\CategoriesNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }




        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW INDEX.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | retrun the template with parameters
          |
         */

        // return the template
        return \View::make('index', array("shopper" => $shop->getShopper()));
    }

    /**
     * Display a list of products.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request, $slug) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);

        /*
          |--------------------------------------------------------------------------
          | RETRIEVING CATEGORY BY SLUG
          |--------------------------------------------------------------------------
          |
          | the category action ( route(/show-products) ) is where the user can browse all
          | products by category. the user can see the product detail by clicking on the
          | product image and on the product name
          | setCategory() retrieve the category from DB  and set in shopper object
         */

        try {

            $shop = $shop->setCategory($slug);

            //check if
            if ($shop == null) {

                //throw exception if category is null
                throw new \App\Exceptions\CategoryNotFoundException();
            }

            $this->updateShopper( $shop->getShopper() );
        } catch (\App\Exceptions\CategoryNotFoundException $e) {
            // redirect to page not found

            return $e->handle();
        }




        /*
          |--------------------------------------------------------------------------
          | RETRIEVING PRODUCT BY CATEGORY ID
          |--------------------------------------------------------------------------
          |
          | the setProducts() method retrieves all products by category id
          |
         */


        try {

            $shop = $shop->setProducts();

            //check if
            if ($shop == null) {
                //throw exception if products collection is null
                throw new \App\Exceptions\ProductNotFoundException();
            }

            $this->updateShopper( $shop->getShopper() );
        } catch (\App\Exceptions\ProductNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }





        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW PRODUCTS.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | return the template with parameters
          |
         */

        // return the template
        return \View::make('products', array("shopper" => $shop->getShopper()));
    }

    /**
     * showProduct is the action to show product details.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showProduct(Request $request, $slug) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);




        /*
          |--------------------------------------------------------------------------
          | RETRIEVING PRODUCT BY SLUG
          |--------------------------------------------------------------------------
          |
          | the showProduct action ( route(/show-product) ) is where the user can see
          | product details. the user can add the product to cart by entering the
          | coupon owned by subscription. The use choose product color and select
          | the quantity.
          | Product::findProductBySlug() retrieve the product from DB
          |
         */


        try {

            $shop = $shop->setProduct($slug);

            //check if
            if ($shop == null) {
                //throw exception if product is not valid
                throw new \App\Exceptions\ProductNotFoundException();
            }

            $this->updateShopper( $shop->getShopper() );
        } catch (\App\Exceptions\ProductNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }







        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW SHOPRODUCT.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | return the template with parameters
          |
         */

        // return the template
        return \View::make('showproduct', array("shopper" => $shop->getShopper()));
    }

    /**
     * cart is the action to manage the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addToCart(Request $request) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);



        /*
          |--------------------------------------------------------------------------
          | RETRIEVING PRODUCT BY SLUG
          |--------------------------------------------------------------------------
          |
          | the showProduct action ( route(/show-product) ) is where the user can see
          | product details. the user can add the product to cart by entering the
          | coupon owned by subscription. The use choose product color and select
          | the quantity.
          | Product::findProductBySlug() retrieve the product from DB
          |
         */

        $shop->setProduct($request->get("product"));
        $this->updateShopper( $shop->getShopper() );

        /*
          |--------------------------------------------------------------------------
          | POPULATING THE PRODUCT OBJECT
          |--------------------------------------------------------------------------
          |
          | the product object is populated with data in request object
          | setQuantity()
          | setRattanColor()
          | setFabricColor()
          |
         */

        // populate the product object with data
        // entered by the user from the product detail form

        $product_params = array(
            "qty" => $request->get('qty'),
            "rc" => $request->get('rc'),
            "fc" => $request->get('fc')
        );

        $shop->populateProduct($product_params);
        $this->updateShopper( $shop->getShopper() );


        /*
          |--------------------------------------------------------------------------
          | VALIDATING THE PRODUCT OBJECT
          |--------------------------------------------------------------------------
          |
          | validation is executed via the ProductValidatorStrategy object
          | implemented Strategy Pattern and Dynamic Factory
          | All the classes involved resides into the App\Models\Validator Package
          |
         */

        $product = $shop->getShopper()->getProduct();

        try {


            // validator strategy to manage diffent validations based on different products
            $strategy = new \App\Models\Validator\ProductValidatorStrategy($product, $request);
            // instanciate a new validator factory
            $validatorFactory = $strategy->getFactory();
            // create a new product validator
            $productvalidator = $validatorFactory->createValidator();
            // return a validator object with validation status
            $validator = $productvalidator->validate();

            //check if
            if ($validator->fails()) {
                //throw exception if validator fails
                throw new \App\Exceptions\ProductValidationFailException();
            }
        } catch (\App\Exceptions\ProductValidationFailException $e) {
            // redirect to page not found
            return $e->handle($validator, $request);
        }


        /**
         * updating the cart object
         *
         * @param  \App\Models\Product\Product $product
         * @return null
         */
        $update_params = array(
            "couponcode" => $request->get('couponcode'),
        );

        $shop->updateCart($update_params);
        $this->updateShopper( $shop->getShopper() );

        /*
          |--------------------------------------------------------------------------
          |  DELIVERY AREA ID
          |--------------------------------------------------------------------------
          |
          | the user may have placed already a order
          | in this case we load the last delivery area
          | specified. this for delivery cost calculation
          | before creating the cart
         */

        $shop->setDeliveryAreaId();
        $this->updateShopper( $shop->getShopper() );


        /*
          |--------------------------------------------------------------------------
          | DELIVERY CHANGED
          |--------------------------------------------------------------------------
          |
          | DeliveryChangedListener retrieves the delivery area object
          | and calculates the delivery cost saving data in the shopper object
         */

        $shop->setDeliveryChanged();
        $this->updateShopper( $shop->getShopper() );


        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW CART.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | return the template with parameters
          |
         */


        // return the template
        return \View::make('cart', array("shopper" => $shop->getShopper()));
    }

    /**
     * removeCart is the method to remove item from the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function removeCart(Request $request) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);


        /*
          |--------------------------------------------------------------------------
          | REMOVING THE ITEM FROM THE CART
          |--------------------------------------------------------------------------
          |
          | remove the item and update the cart in to the shared data
          |
         */

        // remove item from the cart and update the shopper object 
        $item_id = $request->get("item_id");
        $shop->removeItem($item_id);
        $this->updateShopper( $shop->getShopper() );



        /*
          |--------------------------------------------------------------------------
          | REDIRECT TO SHOW CART ACTION
          |--------------------------------------------------------------------------
          |
          | return controller action
          |
         */


        // redirect to controller
        return Redirect::action('ShopController@showCart');
    }

    /**
     * deliveryCart is the method to calculate the shipping cost.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function deliveryCart(Request $request) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);


        /*
          |--------------------------------------------------------------------------
          | DELIVERY CHANGED EVENT
          |--------------------------------------------------------------------------
          |
          | DeliveryChangedListener retrieves the delivery area object
          | and calculates the delivery cost saving data in the shared data
         */

        $shop->setDeliveryChanged($request->get('co_province'));
        $this->updateShopper( $shop->getShopper() );

        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW CART.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | return the template
          |
         */


        // return the template
        return \View::make('cart', array("shopper" => $shop->getShopper()));
    }

    /**
     * updateCart is the method to update item from the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateCart(Request $request) {

        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);


        /*
          |--------------------------------------------------------------------------
          | UPDATING THE ITEM FROM THE CART
          |--------------------------------------------------------------------------
          |
          | updating the item and update the cart in to the shared data
          |
         */


        // retrieve the cart from shopper object and update the cart
        $item_params = array(
            "item_id" => $request->get("item_id"),
            "qty" => $request->get("qty"),
        );

        $shop->updateItem($item_params);
        $this->updateShopper( $shop->getShopper() );


        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW CART.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | return the template
          |
         */


        // return the template
        return \View::make('cart', array("shopper" => $shop->getShopper()));
    }

    /**
     * updateCart is the method to update item from the shopping cart.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function showCart(Request $request) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);

        //$shopper = $shop->getShopper();

        try {

            $cart = $shop->getShopper()->getCart();

            // check if the user has init a shopping cart
            // or cart is empty
            if ($cart == null || ($cart != null && count($cart->getCollection()) == 0)) {

                //throw exception if product is not valid
                throw new \App\Exceptions\CartEmptyException();
            }
        } catch (\App\Exceptions\CartEmptyException $e) {
            // redirect to page not found
            return $e->handle();
        }


        /*
          |--------------------------------------------------------------------------
          | RETURN VIEW CART.BLADE.PHP
          |--------------------------------------------------------------------------
          |
          | return the template
          |
         */


        // return the template
        return \View::make('cart', array("shopper" => $shop->getShopper()));
    }

    /**
     * checkout is the method to manage order and delivery data
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request) {



        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);

        /*
          |--------------------------------------------------------------------------
          | CHECKING IF COUPON IS VALID
          |--------------------------------------------------------------------------
          | functionalities such as add products in shopping cart,
          | deleting products or checkout are available only for
          | users who entered a valid coupon. This method check the coupon
          | and in case of null return the blade template
         */

        try {

            $coupon = $shop->getShopper()->getCouponCode();

            // check if the shopper object has a coupon
            if ($coupon == "") {

                //throw exception if product is not valid
                throw new \App\Exceptions\CouponNotFoundException();
            }
        } catch (\App\Exceptions\CouponNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }


        // when the user go to checkout can be a new subscriber
        // or a subscriber that made a purchase. In this case 
        // the system pre-fill checkout data with the last order                      
        $shop->setLastOrder();
        $this->updateShopper( $shop->getShopper() );


        if (!$shop->getShopper()->getLastOrder()) {
            return \View::make('firstcheckout', array("shopper" => $shop->getShopper()));
        } else {
            return \View::make('nextcheckout', array("shopper" => $shop->getShopper()));
        }
    }

    /**
     * pay is the method to manage payment and saving new order data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function pay(Request $request) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);



        /*
          |--------------------------------------------------------------------------
          | CHECKING IF COUPON IS VALID
          |--------------------------------------------------------------------------
          | functionalities such as add products in shopping cart,
          | deleting products or checkout are available only for
          | users who entered a valid coupon. This method check the coupon
          | and in case of null return the blade template
         */

        try {


            $coupon = $shop->getShopper()->getCouponCode();

            // check if the shopper object has a coupon
            if ($coupon == "") {

                //throw exception if product is not valid
                throw new \App\Exceptions\CouponNotFoundException();
            }
        } catch (\App\Exceptions\CouponNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }


        /*
          |--------------------------------------------------------------------------
          | VALIDATING THE CHECKOUT
          |--------------------------------------------------------------------------
          |
          | validation is executed via the CheckoutValidatorStrategy object
          | implemented Strategy Pattern and Dynamic Factory
          | All the classes involved resides into the App\Models\Validator Package
          |
         */

        try {

            /*
             * 
             * check data entered by the user
             * in the checkout form
             * 
             */


            // validator strategy to manage diffent validations based on different products
            $strategy = new \App\Models\Validator\CheckoutValidatorStrategy($request);
            // instanciate a new validator factory
            $validatorFactory = $strategy->getFactory();
            // create a new product validator
            $productvalidator = $validatorFactory->createValidator();
            // return a validator object with validation status
            $validator = $productvalidator->validate();


            //check if
            if ($validator->fails()) {
                //throw exception if validator fails
                throw new \App\Exceptions\CheckoutValidationFailException();
            }
        } catch (\App\Exceptions\CheckoutValidationFailException $e) {
            // redirect to page not found
            return $e->handle($validator, $request);
        }



        /*
          |--------------------------------------------------------------------------
          | BUILD A NEW ORDER
          |--------------------------------------------------------------------------
          | SaveOrderCreatedListener saves the order data to DB
          | and store in shared data the last insert id
         */

        $order_params = array(
            "first_name" => $request->get('co_f_name'),
            "last_name" => $request->get('co_l_name'),
            "phone" => $request->get('co_phone'),
            "address" => $request->get('co_address1'),
            "city" => $request->get('co_city'),
            "province" => $request->get('co_province'),
            "zip" => $request->get('co_zip'),
            "instruction" => $request->get('co_instruction'),
            "shipping_cost" => $request->get('shipping_cost'),
            "total_amount" => $request->get('total_amount'),
        );


        $shop->buildOrder($order_params);
        $this->updateShopper( $shop->getShopper() );

        /*
         * payment code from external service
         * in case of failure must implements a notifier
         */

        // payment service calls
        $shop->setPaymentCode();
        $this->updateShopper( $shop->getShopper() );


        /*
          |--------------------------------------------------------------------------
          | REDIRECT TO CLOSE ACTION
          |--------------------------------------------------------------------------
          |
          | return controller action
          |
         */

        // return the template
        return Redirect::action('ShopController@close');
    }

    /**
     * close is the method to redirect to the final page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function close(Request $request) {


        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);


        /*
          |--------------------------------------------------------------------------
          | CHECKING IF COUPON IS VALID
          |--------------------------------------------------------------------------
          | functionalities such as add products in shopping cart,
          | deleting products or checkout are available only for
          | users who entered a valid coupon. This method check the coupon
          | and in case of null return the blade template
         */

        try {


            $coupon = $shop->getShopper()->getCouponCode();

            // check if the shopper object has a coupon
            if ($coupon == "") {

                //throw exception if product is not valid
                throw new \App\Exceptions\CouponNotFoundException();
            }
        } catch (\App\Exceptions\CouponNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }




        /*
          |--------------------------------------------------------------------------
          | FINALIZE THE ORDER DATA AND SAVE THE PURCHASE
          |--------------------------------------------------------------------------
          |
          | return null
          |
         */

        try {

            // retrieve the order by id
            $shop = $shop->finalizeOrder();

            //check if
            if ($shop == null) {
                //throw exception if order is not valid
                throw new \App\Exceptions\OrderNotFoundException();
            }

            $this->updateShopper( $shop->getShopper() );
        } catch (\App\Exceptions\OrderNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }


        $shop->savePurchase();
        $this->updateShopper( $shop->getShopper() );

        /*
          |--------------------------------------------------------------------------
          | UPDATE THE COUPON BY SUBSCRIBER
          |--------------------------------------------------------------------------
          |
          | return null
          |
         */

        $shop->updateCoupon();
        $this->updateShopper( $shop->getShopper() );



        /*
          |--------------------------------------------------------------------------
          | NOTIFY NEW ORDER
          |--------------------------------------------------------------------------
          |
          | notify to customer and merchant
          | return null
          |
         */

        /**
         * NotifyOrder is the event to notify the new order
         *
         * @param  \App\Models\Subscriber    $subscriber
         * @param  \App\Models\Orders        $order
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        // dispacth the NotifyOrder
        event(new \App\Events\NotifyOrder($request, array("shopper" => $shop->getShopper())));




        /*
          |--------------------------------------------------------------------------
          | REDIRECT TO THANKS ACTION
          |--------------------------------------------------------------------------
          |
          | return controller action
          |
         */

        // return the template
        return Redirect::action('ShopController@thanks');
    }

    /**
     * thanks is the method to say thank you for a new order
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function thanks(Request $request) {

        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);

        /*
          |--------------------------------------------------------------------------
          | EMPTY AND DELETE THE CART
          |--------------------------------------------------------------------------
          |
          | return null
          |
         */

        $shop->resetShopper();
        $this->updateShopper( $shop->getShopper() );


        //        
        return \View::make('pay', array("shopper" => $shop->getShopper()));
    }

    /**
     * tester is the method to show the color tester.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function tester(Request $request) {

        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);

        //        
        return \View::make('tester', array("shopper" => $shop->getShopper()));
    }

    /**
     * staff is the method to access the restricted area.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function staff(Request $request) {

        /*
          |--------------------------------------------------------------------------
          | SHOP FACADE INSTANCE
          |--------------------------------------------------------------------------
          |
          | The ShopFacade class manage all functionalities of the shop
          | hiding complexity and logic in a single interface
          |
         */

        /**
         * ShopFacade()
         *
         * @param  \Illuminate\Http\Request  $request
         * @return null
         */
        $shop = $this->loadShop($request);

        //        
        return \View::make('staff', array("shopper" => $shop->getShopper()));
    }

    /**
     * notfound is the method to show product not found.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function notFound(Request $request) {

        //        
        return \View::make('errors/notfound', array("message" => $request->get("message")));
    }

    /**
     * loadShop return a instance of ShopFacade
     *
     * @param  \Illuminate\Http\Request  $request
     * @return  ShopFacade
     */
    private function loadShop(Request $request) {
        
        // class Memento store in shared memory
        // the Shopper object using Caching driver 
        // configured in config/cache.php
        $memento = new Memento();
        $shopper = $memento->get( 'Shopper' );
        
        
        // if the shopper not in memory
        // we create and initialize a new shop
        if (!$shopper) {
            $shopper = new Shopper();
            $shop = new ShopFacade( $shopper );
            $shop->init();
            return $shop;
        }
        
        return new ShopFacade( $shopper );
    }
    
    
     /**
     * updateShopper() - set the initial delivery cost in shopper object
     *
     * @param  Request $request
     * @return Shopper
     */
    // update the shopper object in session
    public function updateShopper( $shopper ) {
        
        // class Memento store in shared memory
        // the Shopper object using Caching driver 
        // configured in config/cache.php
        $memento = new Memento();
        $memento->set( "Shopper", $shopper );
    }

    // deleting the shopper in cache
    public function quit() {
        
        // class Memento store in shared memory
        // the Shopper object using Caching driver 
        // configured in config/cache.php
        $memento = new Memento();
        $memento->delete( "Shopper" );
        $memento->set( "Shopper", new Shopper() );
    }
    
    

}
