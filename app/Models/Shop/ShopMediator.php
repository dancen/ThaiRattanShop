<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;
use App\Models\Shop\ShopFacade;
use App\Models\Shop\ShopProductFacade;
use App\Models\Shop\ShopCartFacade;
use App\Models\Shop\ShopDeliveryFacade;
use App\Models\Shop\ShopOrdersFacade;

// this class retrun static method for useful tasks provided in the template

class ShopMediator {

    private $shopper;

    public function __construct(Shopper $shopper) {

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

        $facade = new ShopFacade($this->shopper);
        $facade->initDiscount();
        $this->shopper = $facade->getShopper();
       
        $facade_delivery = new ShopDeliveryFacade( $this->shopper );
        $facade_delivery->initDeliveryCost();
        $facade_delivery->loadDeliveryAreas();
        $this->shopper = $facade_delivery->getShopper();

        // return the shopper
        return $this;
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
     * getProductCategories() - set all categories of product in shopper object
     *
     * @param  null
     * @return Collection
     */
    public function getProductCategories() {

        $facade = new ShopProductFacade($this->shopper);
        $facade->getProductCategories();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setProductCategories() - get all categories of product
     *
     * @param  null
     * @return $this
     */
    public function setProductCategories() {

        $facade = new ShopProductFacade($this->shopper);
        $facade->setProductCategories();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setDiscount() - set discount in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDiscount() {

        $facade = new ShopFacade($this->shopper);
        $facade->initDiscount();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * initDeliveryCost() - set the initial delivery cost in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDeliveryCost() {

        $facade = new ShopDeliveryFacade($this->shopper);
        $facade->initDeliveryCost();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setCategory() - get category by slug
     *
     * @param  null
     * @return $this
     */
    public function setCategory($slug) {

        $facade = new ShopProductFacade($this->shopper);
        $facade->setCategory($slug);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setProducts() - get products by category id 
     *
     * @param  null
     * @return $this
     */
    public function setProducts() {

        $facade = new ShopProductFacade($this->shopper);
        $facade->setProducts();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setProduct() - get product by slug
     *
     * @param  null
     * @return $this
     */
    public function setProduct($slug) {

        $facade = new ShopProductFacade($this->shopper);
        $facade->setProduct($slug);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * populateProduct() - set product properties
     *
     * @param  null
     * @return $this
     */
    public function populateProduct($product_params) {

        $facade = new ShopProductFacade($this->shopper);
        $facade->populateProduct($product_params);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * updateCart() - update Cart adding a product
     *
     * @param  null
     * @return $this
     */
    public function updateCart($update_params) {

        $facade = new ShopCartFacade($this->shopper);
        $facade->updateCart($update_params);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * load the delivery areas 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function loadDeliveryAreas() {

        $facade = new ShopDeliveryFacade($this->shopper);
        $facade->loadDeliveryAreas();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryAreaId() {

        $facade = new ShopDeliveryFacade($this->shopper);
        $facade->setDeliveryAreaId();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  integer
     * @return ShopDeliveryFacade
     */
    public function setDeliveryChanged($delivery_area_id = null) {

        $facade = new ShopDeliveryFacade($this->shopper);
        $facade->setDeliveryChanged($delivery_area_id);
        $this->shopper = $facade->getShopper();
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

        $facade = new ShopDeliveryFacade($this->shopper);
        $arraycost = $facade->setDeliveryChangedAjax($areaobj, $cart);
        $this->shopper = $facade->getShopper();        
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

        $facade = new ShopCartFacade($this->shopper);
        $arraycost = $facade->setQuantityChangedAjax($areaobj, $cart);
        $this->shopper = $facade->getShopper();        
        return $arraycost;
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  null
     * @return null
     */
    public function removeItem($item_id) {

        $facade = new ShopCartFacade($this->shopper);
        $facade->removeItem($item_id);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  null
     * @return null
     */
    public function updateItem($item_params) {

        $facade = new ShopCartFacade($this->shopper);
        $facade->updateItem($item_params);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * setOrder - set the order in the shopper object
     *
     * @param  null
     * @return null
     */
    public function setLastOrder() {

        $facade = new ShopOrdersFacade($this->shopper);
        $facade->setLastOrder();
        $this->shopper = $facade->getShopper();
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

        $facade = new ShopOrdersFacade($this->shopper);
        $facade->setPaymentCode();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * buildOrder - build the order and set last id in the shopper object
     *
     * @param  null
     * @return null
     */
    public function buildOrder($order_params) {

        $facade = new ShopOrdersFacade($this->shopper);
        $facade->buildOrder($order_params);
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * finalizeOrder - complete and update the order in the shopper object
     *
     * @param  null
     * @return null
     */
    public function finalizeOrder() {

        $facade = new ShopOrdersFacade($this->shopper);
        $facade->finalizeOrder();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * updateCoupon - update the coupon 
     *
     * @param  null
     * @return null
     */
    public function updateCoupon() {

        $facade = new ShopOrdersFacade($this->shopper);
        $facade->updateCoupon();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * savePurchase - save the purchase 
     *
     * @param  null
     * @return null
     */
    public function savePurchase() {

        $facade = new ShopOrdersFacade($this->shopper);
        $facade->savePurchase();
        $this->shopper = $facade->getShopper();
        return $this;
    }

    /**
     * releaseCart - unset the cart in the shopper object
     *
     * @param  null
     * @return null
     */
    public function resetShopper() {

        $facade = new ShopFacade($this->shopper);
        $facade->resetShopper();
        $this->shopper = $facade->getShopper();
        return $this;
    }

}
