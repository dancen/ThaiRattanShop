<?php

namespace App\Models\Delivery;

use App\Models\Delivery\DeliveryAreaCalculator;
use App\Models\Delivery\DeliveryAreaInterface;

// Delivery area calculator class

class FreeDeliveryAreaCalculator extends DeliveryAreaCalculator implements DeliveryAreaInterface  {

  
    public function __construct() {}
    
    // method for future external calculator service
    public function setServiceType(){}

    public function calculateDeliveryCost() {

        $tariff = 0;
        return $tariff;
    }

}
