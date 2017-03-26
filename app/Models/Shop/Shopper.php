<?php

namespace App\Models\Shop;

use App\Models\Shop\ShopperInterface;

// this class retrun static method for useful tasks provided in the template

class Shopper implements ShopperInterface {

    private $category;
    private $categories;
    private $discount;
    private $delivery_cost;
    private $products;
    private $product;
    private $cart;
    private $coupon_code;
    private $email;
    private $delivery_areas;
    private $delivery_areas_complete;
    private $delivery_area_id;
    private $delivery_area;
    private $last_order;
    private $payment_code;
    private $last_insert_order_id;
    private $coupon_type;
    private $subscriber;
    private $order;
    
    /**
     * setOrder() 
     *
     * @param  \App\Models\Orders\Orders
     * @return null
     */
    public function setOrder($order) {
        $this->order = $order;
    }
    
    /**
     * getOrder() 
     *
     * @param  null
     * @return \App\Models\Orders\Orders
     */
    public function getOrder() {
        return $this->order;
    }
    
    
    /**
     * setSubscriber() 
     *
     * @param  \App\Models\Subscriber\Subscriber
     * @return null
     */
    public function setSubscriber($subscriber) {
        $this->subscriber = $subscriber;
    }

    
    /**
     * getSubscriber() 
     *
     * @param  null
     * @return \App\Models\Subscriber\Subscriber
     */
    public function getSubscriber() {
        return $this->subscriber;
    }
    
    
    /**
     * setCouponType() 
     *
     * @param String
     * @return null
     */
    public function setCouponType($coupon_type) {
        $this->coupon_type = $coupon_type;
    }

    
    /**
     * getCouponType() 
     *
     * @param  null
     * @return String
     */
    public function getCouponType() {
        return $this->coupon_type;
    }
    
    /**
     * setLastInsertOrderId() 
     *
     * @param  integer
     * @return null
     */
    public function setLastInsertOrderId($last_insert_order_id) {
        $this->last_insert_order_id = $last_insert_order_id;
    }

    
    /**
     * getLastInsertOrderId() 
     *
     * @param  null
     * @return integer
     */
    public function getLastInsertOrderId() {
        return $this->last_insert_order_id;
    }
    
    
    /**
     * setPaymentCode() 
     *
     * @param  String
     * @return null
     */
    public function setPaymentCode($payment_code) {
        $this->payment_code = $payment_code;
    }

    
    /**
     * getPaymentCode() 
     *
     * @param  null
     * @return String
     */
    public function getPaymentCode() {
        return $this->payment_code;
    }
    
    
    /**
     * setLastOrder() 
     *
     * @param  \App\Models\Orders\Orders
     * @return null
     */
    public function setLastOrder($last_order) {
        $this->last_order = $last_order;
    }

    
    /**
     * getLastOrder() 
     *
     * @param  null
     * @return \App\Models\Orders\Orders
     */
    public function getLastOrder() {
        return $this->last_order;
    }
    
    
    /**
     * setDeliveryArea() 
     *
     * @param  \App\Models\Delivery\Delivery
     * @return null
     */
    public function setDeliveryArea($delivery_area) {
        $this->delivery_area = $delivery_area;
    }

    
    /**
     * getDeliveryArea() 
     *
     * @param  null
     * @return \App\Models\Delivery\Delivery
     */
    public function getDeliveryArea() {
        return $this->delivery_area;
    }
    
    
    /**
     * setDeliveryAreaId() 
     *
     * @param  integer
     * @return null
     */
    public function setDeliveryAreaId($delivery_area_id) {
        $this->delivery_area_id = $delivery_area_id;
    }

    
    /**
     * getDeliveryAreaId() 
     *
     * @param  null
     * @return integer
     */
    public function getDeliveryAreaId() {
        return $this->delivery_area_id;
    }
    
    
    /**
     * setDeliveryAreas() 
     *
     * @param  Collection
     * @return null
     */
    public function setDeliveryAreas($delivery_areas) {
        $this->delivery_areas = $delivery_areas;
    }

    
    /**
     * getDeliveryAreas() 
     *
     * @param  null
     * @return Collection
     */
    public function getDeliveryAreas() {
        return $this->delivery_areas;
    }    
    
    
    /**
     * setDeliveryAreasComplete() 
     *
     * @param  Collection
     * @return null
     */
    public function setDeliveryAreasComplete($delivery_areas_complete) {
        $this->delivery_areas_complete = $delivery_areas_complete;
    }

    
    /**
     * getDeliveryAreasComplete() 
     *
     * @param  null
     * @return Collection     */
    public function getDeliveryAreasComplete() {
        return $this->delivery_areas_complete;
    }

    
    /**
     * setEmail() 
     *
     * @param  String
     * @return null
     */
    public function setEmail($email) {
        $this->email = $email;
    }

    /**
     * getEmail() 
     *
     * @param  null
     * @return String
     */
    public function getEmail() {
        return $this->email;
    }

    /**
     * setCouponCode() 
     *
     * @param  String
     * @return null
     */
    public function setCouponCode($coupon_code) {
        $this->coupon_code = $coupon_code;
    }

    /**
     * getCouponCode() 
     *
     * @param  null
     * @return String
     */
    public function getCouponCode() {
        return $this->coupon_code;
    }

    
    /**
     * setCart() 
     *
     * @param  \App\Models\Cart\Cart
     * @return null
     */
    public function setCart($cart) {
        $this->cart = $cart;
    }

    
    /**
     * getCart() 
     *
     * @param  null
     * @return \App\Models\Cart\Cart
     */
    public function getCart() {
        return $this->cart;
    }

    
    /**
     * setProduct() 
     *
     * @param  \App\Models\Cart\Cart
     * @return null
     */
    public function setProduct($product) {
        $this->product = $product;
    }

    
    /**
     * getProduct() 
     *
     * @param  null
     * @return \App\Models\Cart\Cart
     */
    public function getProduct() {
        return $this->product;
    }

    
    /**
     * setProducts() 
     *
     * @param  Collection
     * @return null
     */
    public function setProducts($products) {
        $this->products = $products;
    }

    
    /**
     * getProducts() 
     *
     * @param  null
     * @return Collection
     */
    public function getProducts() {
        return $this->products;
    }

    
    /**
     * setCategory() 
     *
     * @param  \App\Models\Category\Category
     * @return null
     */
    public function setCategory($category) {
        $this->category = $category;
    }

    
    /**
     * getCategory() 
     *
     * @param  null
     * @return \App\Models\Category\Category
     */
    public function getCategory() {
        return $this->category;
    }

    
    /**
     * setCategories() 
     *
     * @param  Collection
     * @return null
     */
    public function setCategories($categories) {
        $this->categories = $categories;
    }

    
    /**
     * getCategories() 
     *
     * @param  null
     * @return Collection
     */
    public function getCategories() {
        return $this->categories;
    }

    
    /**
     * setDiscount() 
     *
     * @param  integer
     * @return null
     */
    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    
    /**
     * getDiscount() 
     *
     * @param  null
     * @return integer
     */
    public function getDiscount() {
        return $this->discount;
    }

    
    /**
     * setDeliveryCost() 
     *
     * @param  integer
     * @return null
     */
    public function setDeliveryCost($delivery_cost) {
        $this->delivery_cost = $delivery_cost;
    }

    
    /**
     * getDeliveryCost() 
     *
     * @param  null
     * @return integer
     */
    public function getDeliveryCost() {
        return $this->delivery_cost;
    }
    
    
    /**
     * setUser() 
     *
     * @param  Illuminate\Foundation\Auth\User
     * @return null
     */
    public function setUser($user) {
        return null;
    }

    
    /**
     * getUser() 
     *
     * @param  null
     * @return Illuminate\Foundation\Auth\User
     */
    public function getUser() {
        return null;
    }

}
