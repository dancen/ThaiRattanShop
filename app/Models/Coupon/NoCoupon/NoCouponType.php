<?php

namespace App\Models\Coupon\NoCoupon;
use App\Models\Coupon\CouponTypeInterface;

// this class store the collection of items in the shopping cart

final class NoCouponType implements CouponTypeInterface
{
    
    public function getName(){                      
        return "App\\Models\\Coupon\\NoCoupon\\NoCoupon";
    }
      
}
