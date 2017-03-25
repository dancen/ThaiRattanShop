<?php

namespace App\Models\Delivery;

use App\Models\Delivery\DeliveryAreaCalculator;
use App\Models\Delivery\DeliveryAreaInterface;
use App\Models\Cart\CartInterface;
use App\Models\Delivery\Delivery;

// Delivery area calculator class

class StandardDeliveryAreaCalculator extends DeliveryAreaCalculator implements DeliveryAreaInterface  {

    private $cart;
    private $area;
    private $service;

    public function __construct( Delivery $delivery, CartInterface $cart ) {
        $this->area = $delivery;
        $this->cart = $cart;
    }

    // method for future external calculator service
    public function setServiceType(){}

    public function calculateDeliveryCost() {


        $tariff = 0;

        // check if delivery place is different from bangkok area
        if ($this->area->distance > 0) {


            //calculate the tafiff base as 10 baht for km
            $tariff = $this->area->distance * 10;

            // retrieve the total amount of the cart
            // if the $tariff base cost is < of 10% of the total 
            // amount discounted 30% re-calculate the tariff base
            $totalcartamount = ($this->cart->getAmount() * 0.7) * 0.1;

            if ($tariff < $totalcartamount) {
                $tariff = $totalcartamount;
            }

            // retrieve the total volume of the cart
            // if the total volume is more than 
            $calculate_volume = $this->cart->getTotalVolume();

            if ($calculate_volume > 10) {
                $tariff * 1.5;
            }

            // set a minimum cost for the shipment
            if ($tariff < 2000) {
                $tariff = 2000;
            }
            
         // if delivery place is bangkok area but the volume exceeds 10mc
        } else {
            
            // retrieve the total volume of the cart
            // if the total volume is more than 
            $calculate_volume = $this->cart->getTotalVolume();
                        

            if ($calculate_volume > 10) {
                
                //calculate the tafiff base as 10 baht for km or 3000 baht
                $tariffbase = ceil($calculate_volume / 2);
                $tariff = $tariffbase * 1000;
            }            
            
        }

        return $tariff;
    }

}
