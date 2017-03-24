<?php

namespace App\Models\Cart;

// this is the interface products must implement 
// in order to be managed by the cart object

interface Cartable 
{
    
    public function getQuantity();
    
    public function setQuantity( $quantity );
    
           
}
