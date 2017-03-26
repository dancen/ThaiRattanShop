<?php

namespace App\Models\Manager;

// class extened from repository

class OrdersManager 
{
    
    private $subscriber;
    
    public function __construct( $subscriber ){
        
        $this->subscriber = $subscriber;
    }
    
    public function getOrders(){
       
        return \App\Models\Orders\Orders::findByEmail( $this->subscriber->email );
    }  
    
    public function getOrderById( $id ){
       
        return \App\Models\Orders\Orders::getOrderById($id);
    } 
    
    public function getLastOrder(){
       
        return \App\Models\Orders\Orders::getLastOrder();
    }
   
  
}
