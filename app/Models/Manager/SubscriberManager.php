<?php

namespace App\Models\Manager;


class SubscriberManager
{
    
    private $email;
    private $coupon;
    
    public function __construct( $email , $coupon ){
        $this->email = $email;
        $this->coupon = $coupon;
    }
    
    public function getSubscriber(){
        
        return \App\Models\Subscriber\Subscriber::findSubscriberByEmailAndCoupon( $this->email , $this->coupon );
    }    
      
}
