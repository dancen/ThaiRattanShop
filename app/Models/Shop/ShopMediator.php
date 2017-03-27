<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;
use App\Models\Shop\ShopFacade;
use App\Models\Shop\ShopProductFacade;
use App\Models\Shop\ShopCartFacade;
use App\Models\Shop\ShopDeliveryFacade;
use App\Models\Shop\ShopOrdersFacade;
use App\Models\Shop\ShopMediatorInterface;

// this class acts as a mediator between Facade classes

class ShopMediator implements ShopMediatorInterface {

    private $mediator;

    public function __construct(Shopper $shopper) {

        $this->mediator = $shopper;
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

        $facade = new ShopFacade( $this );
        $facade->initDiscount();
        $this->mediator = $facade->getShopper();
       
        $facade_delivery = new ShopDeliveryFacade( $this );
        $facade_delivery->initDeliveryCost();
        $facade_delivery->loadDeliveryAreas();
        $this->mediator = $facade_delivery->getShopper();

        // return the shopper
        return $this;
    }

    /**
     * getShopper() 
     *
     * @param  null
     * @return Shopper
     */
    public function getShopper() {

        return $this->mediator;
    }
    
    
    

    /**
     * getProductCategories() - set all categories of product in shopper object
     *
     * @param  null
     * @return Collection
     */
    public function getProductCategories() {

        $facade = new ShopProductFacade( $this );
        $facade->getProductCategories();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setProductCategories() - get all categories of product
     *
     * @param  null
     * @return $this
     */
    public function setProductCategories() {

        $facade = new ShopProductFacade( $this );
        $facade->setProductCategories();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setDiscount() - set discount in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDiscount() {

        $facade = new ShopFacade( $this );
        $facade->initDiscount();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * initDeliveryCost() - set the initial delivery cost in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDeliveryCost() {

        $facade = new ShopDeliveryFacade( $this );
        $facade->initDeliveryCost();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setCategory() - get category by slug
     *
     * @param  null
     * @return $this
     */
    public function setCategory($slug) {

        $facade = new ShopProductFacade( $this );
        $facade->setCategory($slug);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setProducts() - get products by category id 
     *
     * @param  null
     * @return $this
     */
    public function setProducts() {

        $facade = new ShopProductFacade( $this );
        $facade->setProducts();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setProduct() - get product by slug
     *
     * @param  null
     * @return $this
     */
    public function setProduct($slug) {

        $facade = new ShopProductFacade( $this );
        $facade->setProduct($slug);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * populateProduct() - set product properties
     *
     * @param  null
     * @return $this
     */
    public function populateProduct( $product_params ) {

        $facade = new ShopProductFacade( $this );
        $facade->populateProduct($product_params);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * updateCart() - update Cart adding a product
     *
     * @param  null
     * @return $this
     */
    public function updateCart($update_params) {

        $facade = new ShopCartFacade( $this );
        $facade->updateCart($update_params);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * load the delivery areas 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function loadDeliveryAreas() {

        $facade = new ShopDeliveryFacade( $this );
        $facade->loadDeliveryAreas();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryAreaId() {

        $facade = new ShopDeliveryFacade( $this );
        $facade->setDeliveryAreaId();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  integer
     * @return ShopDeliveryFacade
     */
    public function setDeliveryChanged($delivery_area_id = null) {

        $facade = new ShopDeliveryFacade( $this );
        $facade->setDeliveryChanged($delivery_area_id);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setDeliveryChangedAjax - set a new delivery area and provide array to the view 
     *
     * @param  \App\Models\Delivery\Delivery
     * @param  \App\Models\Cart\Cart
     * @return array
     */
    public function setDeliveryChangedAjax($areaobj, $cart) {

        $facade = new ShopDeliveryFacade( $this );
        $arraycost = $facade->setDeliveryChangedAjax($areaobj, $cart);
        $this->mediator = $facade->getShopper();        
        return $arraycost;
    }

    /**
     * setQuantityChangedAjax - set a new quantity and provide array to the view 
     *
     * @param  \App\Models\Delivery\Delivery
     * @param  \App\Models\Cart\Cart
     * @return array
     */
    public function setQuantityChangedAjax($areaobj, $cart) {

        $facade = new ShopCartFacade( $this );
        $arraycost = $facade->setQuantityChangedAjax($areaobj, $cart);
        $this->mediator = $facade->getShopper();        
        return $arraycost;
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  null
     * @return null
     */
    public function removeItem($item_id) {

        $facade = new ShopCartFacade( $this );
        $facade->removeItem($item_id);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  null
     * @return null
     */
    public function updateItem($item_params) {

        $facade = new ShopCartFacade( $this );
        $facade->updateItem($item_params);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * setOrder - set the order in the shopper object
     *
     * @param  null
     * @return null
     */
    public function setLastOrder() {

        $facade = new ShopOrdersFacade( $this );
        $facade->setLastOrder();
        $this->mediator = $facade->getShopper();
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

        $facade = new ShopOrdersFacade( $this );
        $facade->setPaymentCode();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * buildOrder - build the order and set last id in the shopper object
     *
     * @param  null
     * @return null
     */
    public function buildOrder($order_params) {

        $facade = new ShopOrdersFacade( $this );
        $facade->buildOrder($order_params);
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * finalizeOrder - complete and update the order in the shopper object
     *
     * @param  null
     * @return null
     */
    public function finalizeOrder() {

        $facade = new ShopOrdersFacade( $this );
        $facade->finalizeOrder();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * updateCoupon - update the coupon 
     *
     * @param  null
     * @return null
     */
    public function updateCoupon() {

        $facade = new ShopOrdersFacade( $this );
        $facade->updateCoupon();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * savePurchase - save the purchase 
     *
     * @param  null
     * @return null
     */
    public function savePurchase() {

        $facade = new ShopOrdersFacade( $this );
        $facade->savePurchase();
        $this->mediator = $facade->getShopper();
        return $this;
    }

    /**
     * releaseCart - unset the cart in the shopper object
     *
     * @param  null
     * @return null
     */
    public function resetShopper() {

        $facade = new ShopFacade( $this );
        $facade->resetShopper();
        $this->mediator = $facade->getShopper();
        return $this;
    }

}
