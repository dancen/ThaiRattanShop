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

        $facade_delivery = new ShopDeliveryFacade($facade->getShopper());
        $facade_delivery->initDeliveryCost();
        $facade_delivery->loadDeliveryAreas();

        // return the shopper
        return $facade_delivery;
    }

    // return the shopper
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

        return $facade->getProductCategories();
    }

    /**
     * setProductCategories() - get all categories of product
     *
     * @param  null
     * @return $this
     */
    public function setProductCategories() {

        $facade = new ShopProductFacade($this->shopper);

        return $facade->setProductCategories();
    }

    /**
     * setDiscount() - set discount in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDiscount() {

        $facade = new ShopFacade($this->shopper);

        return $facade->initDiscount();
    }

    /**
     * initDeliveryCost() - set the initial delivery cost in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDeliveryCost() {

        $facade = new ShopDeliveryFacade($this->shopper);

        return $facade->initDeliveryCost();
    }

    /**
     * setCategory() - get category by slug
     *
     * @param  null
     * @return $this
     */
    public function setCategory($slug) {

        $facade = new ShopProductFacade($this->shopper);

        return $facade->setCategory($slug);
    }

    /**
     * setProducts() - get products by category id 
     *
     * @param  null
     * @return $this
     */
    public function setProducts() {

        $facade = new ShopProductFacade($this->shopper);

        return $facade->setProducts();
    }

    /**
     * setProduct() - get product by slug
     *
     * @param  null
     * @return $this
     */
    public function setProduct($slug) {

        $facade = new ShopProductFacade($this->shopper);

        return $facade->setProduct($slug);
    }

    /**
     * populateProduct() - set product properties
     *
     * @param  null
     * @return $this
     */
    public function populateProduct($product_params) {

        $facade = new ShopProductFacade($this->shopper);

        return $facade->populateProduct($product_params);
    }

    /**
     * updateCart() - update Cart adding a product
     *
     * @param  null
     * @return $this
     */
    public function updateCart($update_params) {

        $facade = new ShopCartFacade($this->shopper);

        return $facade->updateCart($update_params);
    }

    /**
     * load the delivery areas 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function loadDeliveryAreas() {

        $facade = new ShopDeliveryFacade($this->shopper);

        return $facade->loadDeliveryAreas();
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryAreaId() {

        $facade = new ShopDeliveryFacade($this->shopper);

        return $facade->setDeliveryAreaId();
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryChanged($delivery_area_id = null) {

        $facade = new ShopDeliveryFacade($this->shopper);

        return $facade->setDeliveryChanged($delivery_area_id);
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

        return $facade->setDeliveryChangedAjax($areaobj, $cart);
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

        return $facade->setQuantityChangedAjax($areaobj, $cart);
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  null
     * @return null
     */
    public function removeItem($item_id) {

        $facade = new ShopCartFacade($this->shopper);

        return $facade->removeItem($item_id);
    }

    /**
     * removeCart - remove the Item from Cart and update the shopper object
     *
     * @param  null
     * @return null
     */
    public function updateItem($item_params) {

        $facade = new ShopCartFacade($this->shopper);

        return $facade->updateItem($item_params);
    }

    /**
     * setOrder - set the order in the shopper object
     *
     * @param  null
     * @return null
     */
    public function setLastOrder() {

        $facade = new ShopOrdersFacade($this->shopper);

        return $facade->setLastOrder();
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

        return $facade->setPaymentCode();
    }

    /**
     * buildOrder - build the order and set last id in the shopper object
     *
     * @param  null
     * @return null
     */
    public function buildOrder($order_params) {

        $facade = new ShopOrdersFacade($this->shopper);

        return $facade->buildOrder($order_params);
    }

    /**
     * finalizeOrder - complete and update the order in the shopper object
     *
     * @param  null
     * @return null
     */
    public function finalizeOrder() {

        $facade = new ShopOrdersFacade($this->shopper);

        return $facade->finalizeOrder();
    }

    /**
     * updateCoupon - update the coupon 
     *
     * @param  null
     * @return null
     */
    public function updateCoupon() {

        $facade = new ShopOrdersFacade($this->shopper);

        return $facade->updateCoupon();
    }

    /**
     * savePurchase - save the purchase 
     *
     * @param  null
     * @return null
     */
    public function savePurchase() {

        $facade = new ShopOrdersFacade($this->shopper);

        return $facade->savePurchase();
    }

    /**
     * releaseCart - unset the cart in the shopper object
     *
     * @param  null
     * @return null
     */
    public function resetShopper() {

        $facade = new ShopFacade($this->shopper);

        return $facade->resetShopper();
    }

}
