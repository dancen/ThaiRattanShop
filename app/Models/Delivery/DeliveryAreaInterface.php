<?php

namespace App\Models\Delivery;

// interface all Delivery classes must be implemented

interface DeliveryAreaInterface 
{   
    
     CONST DEFAULT_DELIVERY_AREA = 'Bangkok';
     
     public function setServiceType();
     
     public function calculateDeliveryCost();
  
}
