<?php

namespace App\Models\Coupon\NoCoupon;
use App\Models\Coupon\CouponTypeInterface;

// Coupon type

final class NoCouponType implements CouponTypeInterface
{
    
    public function getName(){                      
        return \App\Models\Coupon\NoCoupon\NoCoupon::class;
    }
      
}
