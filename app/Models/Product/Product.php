<?php

namespace App\Models\Product;
use App\Models\Repositories\ProductRepository as BaseProduct;
use App\Models\Product\ProductInterface;
use App\Models\Cart\Cartable;

// product class 

class Product extends BaseProduct implements ProductInterface, Cartable
{
    
    private $cartindex;
    private $quantity;
    private $rattan_color;
    private $fabric_color;
    
    public function setCartIndex($cartindex){
        $this->cartindex = $cartindex;
    }
    
    public function getCartIndex(){
        return $this->cartindex;
    }
    
    
    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }
    
    public function getQuantity(){
        return $this->quantity;
    }
    
    public function setRattanColor($rattan_color){
        $this->rattan_color = $rattan_color;
    }
    
    public function getRattanColor(){
        return $this->rattan_color;
    }
    
    public function setFabricColor($fabric_color){
        $this->fabric_color = $fabric_color;
    }
    
    public function getFabricColor(){
        return $this->fabric_color;
    }
    
    public function getWidth(){
        return $this->width;
    }
    
    public function getHeight(){
        return $this->height;
    }
    
    public function getDepth(){
        return $this->depth;
    }
    
         
}
