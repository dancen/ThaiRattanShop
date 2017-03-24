<?php

namespace App\Models\Coupon;
use App\Models\Coupon\CouponTypeInterface;

// this class store the collection of items in the shopping cart

class CouponFactory 
{
    
    private $coupon_type; 
    
    public function __construct( CouponTypeInterface $coupon_type ){
        $this->coupon_type = $coupon_type;
    }
    
    public function createCoupon(){
        $class = $this->coupon_type->getName();
        return new $class();
    }
      
}
