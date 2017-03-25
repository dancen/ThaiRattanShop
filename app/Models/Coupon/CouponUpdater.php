<?php

namespace App\Models\Coupon;
use App\Models\Subscriber\SubscriberInterface;


// Facade class to update the Coupon

class CouponUpdater 
{
    
    private $subscriber;
    
    public function __construct( SubscriberInterface $subscriber ){
        $this->subscriber = $subscriber;
    }
    
    public function upgradeCoupon(){       
            
        $factory =  new \App\Models\Coupon\CouponFactory( new \App\Models\Coupon\TopCoupon\TopCouponType );
        $coupon = $factory->createCoupon();
        
        $this->subscriber->used = 0;        
        $this->subscriber->coupon_type = $coupon->getName();
        $this->subscriber->updated_at = new \DateTime("now");  
        return $coupon->getName();
       
        
    }
    
    public function downgradeCoupon(){       
            
        $factory =  new \App\Models\Coupon\CouponFactory( new \App\Models\Coupon\RegularCoupon\RegularCouponType );
        $coupon = $factory->createCoupon();
        
        $this->subscriber->used = 1;
        $this->subscriber->coupon_type = $coupon->getName();
        $this->subscriber->updated_at = new \DateTime("now");  
        return $coupon->getName();
        
    }
    
    public function consumeCoupon(){       
            
        $factory =  new \App\Models\Coupon\CouponFactory( new \App\Models\Coupon\RegularCoupon\NoCouponType );
        $coupon = $factory->createCoupon();
        
        $this->subscriber->used = 1;
        $this->subscriber->coupon_type = $coupon->getName();
        $this->subscriber->updated_at = new \DateTime("now");  
        return $coupon->getName();
        
    }
    
   
    
      
}
