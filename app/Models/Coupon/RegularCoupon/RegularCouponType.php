<?php

namespace App\Models\Coupon\RegularCoupon;
use App\Models\Coupon\CouponTypeInterface;

// Coupon Type

final class RegularCouponType implements CouponTypeInterface
{
    
    public function getName(){                      
        return \App\Models\Coupon\RegularCoupon\RegularCoupon::class;
    }
      
}
