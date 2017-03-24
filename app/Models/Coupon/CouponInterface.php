<?php

namespace App\Models\Coupon;

// this class store the collection of items in the shopping cart

interface CouponInterface 
{
    
    CONST COUPON_TOP_NAME = "TOP";
    CONST COUPON_REG_NAME = "REGULAR";
    CONST COUPON_NO_NAME = "NO";
    
    public function getName();
    
    public function getDiscount();
      
}
