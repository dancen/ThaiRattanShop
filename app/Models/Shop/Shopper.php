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
    private $delivery_area_id;
    private $delivery_area;
    private $last_order;
    private $payment_code;
    private $last_insert_order_id;
    private $coupon_type;
    private $subscriber;
    private $order;
    
    public function setOrder($order) {
        $this->order = $order;
    }

    public function getOrder() {
        return $this->order;
    }
    
    public function setSubscriber($subscriber) {
        $this->subscriber = $subscriber;
    }

    public function getSubscriber() {
        return $this->subscriber;
    }
    
    public function setCouponType($coupon_type) {
        $this->coupon_type = $coupon_type;
    }

    public function getCouponType() {
        return $this->coupon_type;
    }
    
    public function setLastInsertOrderId($last_insert_order_id) {
        $this->last_insert_order_id = $last_insert_order_id;
    }

    public function getLastInsertOrderId() {
        return $this->last_insert_order_id;
    }
    
    public function setPaymentCode($payment_code) {
        $this->payment_code = $payment_code;
    }

    public function getPaymentCode() {
        return $this->payment_code;
    }
    
    public function setLastOrder($last_order) {
        $this->last_order = $last_order;
    }

    public function getLastOrder() {
        return $this->last_order;
    }
    
    public function setDeliveryArea($delivery_area) {
        $this->delivery_area = $delivery_area;
    }

    public function getDeliveryArea() {
        return $this->delivery_area;
    }
    
    public function setDeliveryAreaId($delivery_area_id) {
        $this->delivery_area_id = $delivery_area_id;
    }

    public function getDeliveryAreaId() {
        return $this->delivery_area_id;
    }
    
    public function setDeliveryAreas($delivery_areas) {
        $this->delivery_areas = $delivery_areas;
    }

    public function getDeliveryAreas() {
        return $this->delivery_areas;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setCouponCode($coupon_code) {
        $this->coupon_code = $coupon_code;
    }

    public function getCouponCode() {
        return $this->coupon_code;
    }

    public function setCart($cart) {
        $this->cart = $cart;
    }

    public function getCart() {
        return $this->cart;
    }

    public function setProduct($product) {
        $this->product = $product;
    }

    public function getProduct() {
        return $this->product;
    }

    public function setProducts($products) {
        $this->products = $products;
    }

    public function getProducts() {
        return $this->products;
    }

    public function setCategory($category) {
        $this->category = $category;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setCategories($categories) {
        $this->categories = $categories;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function setDiscount($discount) {
        $this->discount = $discount;
    }

    public function getDiscount() {
        return $this->discount;
    }

    public function setDeliveryCost($delivery_cost) {
        $this->delivery_cost = $delivery_cost;
    }

    public function getDeliveryCost() {
        return $this->delivery_cost;
    }
    
    public function setUser($user) {
        return null;
    }

    public function getUser() {
        return null;
    }

}
