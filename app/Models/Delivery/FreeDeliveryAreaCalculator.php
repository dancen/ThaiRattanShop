<?php

namespace App\Models\Delivery;

use App\Models\Delivery\DeliveryAreaCalculator;
use App\Models\Delivery\DeliveryAreaInterface;

// this class store the collection of items in the shopping cart

class FreeDeliveryAreaCalculator extends DeliveryAreaCalculator implements DeliveryAreaInterface  {

  
    public function __construct() {}
    
    // method for future external calculator service
    public function setServiceType(){}

    public function calculateDeliveryCost() {

        $tariff = 0;
        return $tariff;
    }

}
