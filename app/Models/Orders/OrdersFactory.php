<?php

namespace App\Models\Orders;
use App\Models\Orders\Orders;
// this class store the collection of items in the shopping cart

class OrdersFactory 
{
  
     public static function createOrder(){
        return new Orders();
    }
    
    
}
