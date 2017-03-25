<?php

namespace App\Models\Coupon;
use App\Models\Subscriber\SubscriberInterface;
use App\Models\Coupon\CouponInterface;

// Coupon implements strategy pattern

class CouponStrategy implements CouponInterface
{
    
    private $subscriber;
    
    public function __construct(SubscriberInterface $subscriber ){
        $this->subscriber = $subscriber;
    }
    
    public function getCouponFactory(){
                    
        
        if( $this->subscriber->getCouponType() == self::COUPON_TOP_NAME ){
            
            // product logic
            $coupon_type = new \App\Models\Coupon\TopCoupon\TopCouponType;
            
        } else if( $this->subscriber->getCouponType() == self::COUPON_REG_NAME ){
            
            // product logic            
            $coupon_type = new \App\Models\Coupon\RegularCoupon\RegularCouponType;
            
        } else {
            
            // product logic
            $coupon_type = new \App\Models\Coupon\NoCoupon\NoCouponType;
        }     
        
         // create a validator based on the validatorType provided
        $factory = new \App\Models\Coupon\CouponFactory( $coupon_type );
        return $factory;
        
    }
    
    public function getName(){}
    
    public function getDiscount(){}
    
      
}
