<?php

namespace App\Models\Shop;

// interface shopper must implement

interface ShopperInterface
{
        
    public function setOrder($order);
    
    public function getOrder();
    
    public function getUser();
    
    public function setUser($user);
    
    public function setCart($cart);

    public function getCart();
    
    public function setProduct($product);

    public function getProduct();
    
    public function setCategory($category);

    public function getCategory();
      
}
