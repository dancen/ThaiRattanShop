<?php

namespace App\Models\Delivery;

// this class store the collection of items in the shopping cart

interface DeliveryAreaInterface 
{   
    
     CONST DEFAULT_DELIVERY_AREA = 'Bangkok';
     
     public function setServiceType();
     
     public function calculateDeliveryCost();
  
}
