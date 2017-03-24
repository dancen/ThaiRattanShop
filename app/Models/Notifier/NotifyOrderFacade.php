<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Notifier;
use Illuminate\Http\Request;
use App\Models\Shop\Shopper;

/**
 * Description of NotifierManager
 *
 * @author dan
 */
class NotifyOrderFacade {

    private $shopper;
    private $request;

    //put your code here

    public function __construct( Request $request , Shopper $shopper ) {
        $this->shopper = $shopper;
        $this->request = $request;
    }
   
    public function notify() {        
        
        // create a NotifyOrderToCustomer object
        
        $customernotifier = new \App\Models\Notifier\NotifyOrderToCustomer();
        $customernotifier->setSubject('Thank you for a new Order!');
        $customernotifier->setOrder( $this->shopper->getOrder() );
        $customernotifier->setTo( $this->shopper->getEmail() );
        $customernotifier->setHelper( new \App\Models\Helper );
        $customernotifier->setCart( $this->shopper->getCart() );
        $customernotifier->setDiscount( $this->shopper->getDiscount() );
        $customernotifier->setCoupon(  $this->shopper->getCouponCode() );
        $customernotifier->setDeliveryArea( $this->shopper->getDeliveryArea() );
        $customernotifier->setDeliveryCost( $this->shopper->getDeliveryCost() );
        
        // create a NotifyOrderToMerchant object
        
        $merchantnotifier = new \App\Models\Notifier\NotifyOrderToMerchant();
        $merchantnotifier->setSubject('Thank you for a new Order!');
        $merchantnotifier->setOrder( $this->shopper->getOrder() );
        $merchantnotifier->setTo( "orders@thairattan.com" );
        $merchantnotifier->setHelper( new \App\Models\Helper );
        $merchantnotifier->setCart( $this->shopper->getCart() );
        $merchantnotifier->setDiscount( $this->shopper->getDiscount() );
        $merchantnotifier->setCoupon( $this->shopper->getCouponCode() );
        $merchantnotifier->setDeliveryArea( $this->shopper->getDeliveryArea() );
        $merchantnotifier->setDeliveryCost( $this->shopper->getDeliveryCost() );        
        
        // create a NotifierManager object
        
        $helper = new \App\Models\Helper();
        $notifiermanager = new \App\Models\Notifier\NotifierManager( $helper );
        $notifiermanager->addNotifier( $customernotifier );
        $notifiermanager->addNotifier( $merchantnotifier );
        $notifiermanager->notify();
        
        
    }

}
