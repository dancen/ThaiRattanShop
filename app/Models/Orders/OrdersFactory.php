<?php

namespace App\Models\Orders;
use App\Models\Orders\Orders;

// factory class

class OrdersFactory 
{
  
     public static function createOrder(){
        return new Orders();
    }
    
    
}
