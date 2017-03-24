<?php

namespace App\Models\Coupon\RegularCoupon;
use App\Models\Coupon\CouponTypeInterface;

// this class store the collection of items in the shopping cart

final class RegularCouponType implements CouponTypeInterface
{
    
    public function getName(){                      
        return "App\\Models\\Coupon\\RegularCoupon\\RegularCoupon";
    }
      
}
