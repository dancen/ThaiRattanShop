<?php

namespace App\Models\Product;

// interface all product class must implement

interface ProductInterface 
{
    public function setCartIndex($cartindex);
    
    public function getCartIndex();
    
    public function setQuantity($quantity);
    
    public function getQuantity();
    
    public function setRattanColor($rattan_color);
    
    public function getRattanColor();
    
    public function setFabricColor($fabric_color);
    
    public function getFabricColor();
    
    public function getWidth();
    
    public function getHeight();
    
    public function getDepth();
     
      
}
