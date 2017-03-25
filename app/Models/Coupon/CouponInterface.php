<?php

namespace App\Models\Coupon;

// Coupon interface all classes must implement

interface CouponInterface 
{
    
    CONST COUPON_TOP_NAME = "TOP";
    CONST COUPON_REG_NAME = "REGULAR";
    CONST COUPON_NO_NAME = "NO";
    
    public function getName();
    
    public function getDiscount();
      
}
