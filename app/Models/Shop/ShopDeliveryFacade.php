<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;

// this class manage shop tasks related to delivery

class ShopDeliveryFacade {

    private $shopper;

    public function __construct( Shopper $shopper ) {

        $this->shopper = $shopper;
    }
    
    public function getShopper() {
        return $this->shopper;
    }

  
    /**
     * initDeliveryCost() - set the initial delivery cost in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDeliveryCost() {

        if (!$this->shopper->getDeliveryCost()) {

            // load the free Delivery to seesion
            $delivery = new \App\Models\Delivery\FreeDeliveryAreaCalculator();
            $this->shopper->setDeliveryCost($delivery->calculateDeliveryCost());
        }

        // return the shopper
        return $this;
    }

   

    /**
     * load the delivery areas 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function loadDeliveryAreas() {


        /*
          |--------------------------------------------------------------------------
          | DELIVERY AREAS
          |--------------------------------------------------------------------------
          |
          | delivery areas are stored in shared data and they populate the
          | html select element for calculating the delivery cost
          |
         */

        if (!$this->shopper->getDeliveryAreas()) {

            /**
             * if delivery areas that populate the html select element
             * is not present in shared data it will be retrieved from
             * database. 
             *
             * @return \App\Models\Product\Delivery $areas
             */
            
            $areas = \App\Models\Delivery\Delivery::findAll();
            
            /**
             * if delivery areas that populate the html select element
             * is not present in shared data it will be retrieved from
             * database. 
             *
             * @return \App\Models\Product\Delivery $areas
             */
           
            $allfields = \App\Models\Delivery\Delivery::findComplete();

            // store delivery areas in shopper object form html select
            $this->shopper->setDeliveryAreas($areas);
            
            // store all fields delivery areas in shopper object for delivery cost calculation
            $this->shopper->setDeliveryAreasComplete($allfields);
        }

        // return the shopper
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryAreaId() {


        $email = $this->shopper->getEmail();
        $delivery_area = $this->shopper->getDeliveryArea();
        $free_delivery = \App\Models\Delivery\FreeDeliveryAreaCalculator::DEFAULT_DELIVERY_AREA;

        // the user may have placed already a order
        // in this case we load the last delivery area
        // specified. this for delivery cost calculation
        // before creating the cart
        $order = \App\Models\Orders\Orders::findLastOrderbyEmail($email);


        if ($order) {

            // execute logic
            // the delivery area is not empty

            if (( $order->delivery_area != null ) &&
                    // the delivery area is different from the default value
                    ( $order->delivery_area != $free_delivery ) &&
                    // the delivery area is not stored in session
                    ( $delivery_area == null )) {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($order->delivery_area);
            } else {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($delivery_area);
            }
        } else {

            // in case the user are placing the first order we check the session
            // in case the session is empty we set the default delivery area

            if ($delivery_area == null) {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($free_delivery);
            } else {

                // retrieve the delivery area row
                $area = \App\Models\Delivery\Delivery::findDeliveryByArea($delivery_area);
            }
        }

        // set the delivery area id
        $this->shopper->setDeliveryAreaId($area->id);

        // return the shopper
        return $this;
    }

    /**
     * setDeliveryAreaId - set the id to the shopper object
     *
     * @param  \Illuminate\Http\Request  $request
     * @return null
     */
    public function setDeliveryChanged($delivery_area_id = null) {

        $delivery_area_id != null ?
                        $area_id = $delivery_area_id :
                        $area_id = $this->shopper->getDeliveryAreaId();

        $cart = $this->shopper->getCart();

        // retrieving the area by id
        $area = \App\Models\Delivery\Delivery::findByAreaId($area_id);

        // calculate delivery cost and store in session
        $calculator = new \App\Models\Delivery\StandardDeliveryAreaCalculator($area, $cart);

        // calculate the delivery cost
        $delivery_cost = $calculator->calculateDeliveryCost();

        // update the delivery area and cost in shopper object
        $this->shopper->setDeliveryArea($area->area);
        $this->shopper->setDeliveryCost($delivery_cost);

        // return the shopper
        return $this;
    }
    
    
    
    /**
     * setDeliveryChangedAjax - set a new delivery area and provide array to the view 
     *
     * @param  \App\Models\Delivery\Delivery
     * @param  \App\Models\Cart\Cart
     * @return array
     */
    public function setDeliveryChangedAjax( $areaobj, $cart ) {

        // calculate delivery cost and store in session
        $calculator = new \App\Models\Delivery\StandardDeliveryAreaCalculator($areaobj, $cart);

        // calculate the delivery cost
        $delivery_cost = $calculator->calculateDeliveryCost();
        
        $this->shopper->setDeliveryArea($areaobj->area);
        $this->shopper->setDeliveryCost($delivery_cost);
        
        $cart_total_formatted = \App\Models\Helper::formatCurrency( \App\Models\Helper::calculateDiscount( $cart->getAmount(), $this->shopper->getDiscount() ));
        $delivery_cost_formatted = \App\Models\Helper::formatCurrency( $this->shopper->getDeliveryCost() );
        $grand_total_formatted = \App\Models\Helper::formatCurrency( \App\Models\Helper::sum( \App\Models\Helper::calculateDiscount( $cart->getAmount(), $this->shopper->getDiscount() ) , $this->shopper->getDeliveryCost() ) );
        
        
        // create the response array
        $arraycost = array("delivery_area" => $this->shopper->getDeliveryArea(),
                           "delivery_cost" => $delivery_cost_formatted,
                           "cart_total" => $cart_total_formatted,
                           "grand_total" => $grand_total_formatted );

        // return the array
        return $arraycost;
    }
    
   

}
