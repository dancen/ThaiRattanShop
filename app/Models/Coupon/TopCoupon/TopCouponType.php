<?php

namespace App\Models\Coupon\TopCoupon;
use App\Models\Coupon\CouponTypeInterface;

// this class store the collection of items in the shopping cart

final class TopCouponType implements CouponTypeInterface
{
    
    public function getName(){                      
        return "App\\Models\\Coupon\\TopCoupon\\TopCoupon";
    }
      
}
