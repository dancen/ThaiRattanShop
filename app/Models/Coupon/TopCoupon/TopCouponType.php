<?php

namespace App\Models\Coupon\TopCoupon;
use App\Models\Coupon\CouponTypeInterface;

// coupon type class

final class TopCouponType implements CouponTypeInterface
{
    
    public function getName(){                      
        return \App\Models\Coupon\TopCoupon\TopCoupon::class;        
    }
      
}
