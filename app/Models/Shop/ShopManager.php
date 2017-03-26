<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;
use App\Models\Shop\ShopFacade;
use App\Models\Memento\MementoInterface;

// this class retrun static method for useful tasks provided in the template

class ShopManager
{
    
    private $memento;
    
    public function __construct( MementoInterface $memento ) {
        
        // class Memento store in shared memory
        // the Shopper object using Caching driver 
        // configured in config/cache.php
        $this->memento = $memento;
    }
     
     
    /**
     * loadShop return a instance of ShopFacade
     *
     * @param  null
     * @return  ShopFacade
     */
    public function loadShop() {
                
        $shopper = $this->memento->get( 'Shopper' );        
        
        // if the shopper not in memory
        // we create and initialize a new shop
        if (!$shopper) {
            return null;
        } else {
            return new ShopMediator( $shopper );
        }        
        
    }
    
    
    /**
     * createShop return a instance of ShopFacade
     *
     * @param  null
     * @return  ShopFacade
     */
    public function createShop(){
        
        $facade = new ShopMediator( new Shopper() );
        $facade->init();
        $shopper = $facade->getShopper();
        $this->memento->set( "Shopper", $shopper );
        return $facade;
    }
    
    
     /**
     * updateShopper() - set the initial delivery cost in shopper object
     *
     * @param  Request $request
     * @return Shopper
     */
    // update the shopper object in session
    public function updateShopper( $shopper ) {
        
       $this->memento->set( "Shopper", $shopper );
    }

    // deleting the shopper in cache
    public function quit() {
        
        $this->memento->delete( "Shopper" );
    }
    
  
}
