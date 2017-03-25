<?php

namespace App\Models\Coupon\TopCoupon;
use App\Models\Coupon\Coupon;
use App\Models\Coupon\CouponInterface;
use \App\Models\Discount\DiscountInterface;
use \App\Models\Discount\DiscountFactory;

// coupon class

class TopCoupon extends Coupon implements CouponInterface
{
    private $discountype;
    
    public function setDiscountType(  DiscountInterface $discountype ) {
        $this->discountype = $discountype;
    }
                
    public function getName(){
        return self::COUPON_TOP_NAME;
    }
    
    public function getDiscount(){
        $this->discountype->setCalculatorModel( DiscountFactory::createTopModel() );
        return $this->discountype->getDiscount();
    }
      
}
