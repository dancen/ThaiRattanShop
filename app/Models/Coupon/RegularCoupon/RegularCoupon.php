<?php

namespace App\Models\Coupon\RegularCoupon;
use App\Models\Coupon\Coupon;
use App\Models\Coupon\CouponInterface;
use \App\Models\Discount\DiscountInterface;
use \App\Models\Discount\DiscountFactory;

// coupon class

class RegularCoupon extends Coupon implements CouponInterface
{
                  
    private $discountype;
    
    public function setDiscountType(  DiscountInterface $discountype ) {
        $this->discountype = $discountype;
    }
                
    public function getName(){
        return self::COUPON_REG_NAME;
    }
    
    public function getDiscount(){  
        $this->discountype->setCalculatorModel( DiscountFactory::createRegularModel() );
        return $this->discountype->getDiscount();
    }
      
}
