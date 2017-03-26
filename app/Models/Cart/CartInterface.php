<?php

namespace App\Models\Cart;

// interface Cart classes must implements

interface CartInterface 
{    
     
    public function addItem(Cartable $product);
    
    public function removeItem($id);
    
    public function updateItem($id, $qty);    
    
    public function getNumOfItems();

    public function getAmount();
    
    public function getCollection();
    
    public function isEmpty();

    public function getTotalVolume();
           
}
