<?php

namespace App\Models\Product;

// this class store the collection of items in the shopping cart

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
