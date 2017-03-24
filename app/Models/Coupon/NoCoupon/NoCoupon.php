<?php

namespace App\Models\Coupon\NoCoupon;
use App\Models\Coupon\Coupon;
use App\Models\Coupon\CouponInterface;
use \App\Models\Discount\DiscountInterface;
use \App\Models\Discount\DiscountFactory;

// this class store the collection of items in the shopping cart

class NoCoupon extends Coupon implements CouponInterface
{
   private $discountype;
    
    public function setDiscountType(  DiscountInterface $discountype ) {
        $this->discountype = $discountype;
    }
                
    public function getName(){
        return self::COUPON_REG_NAME;
    }
    
    public function getDiscount(){  
        $this->discountype->setCalculatorModel( DiscountFactory::createStandardModel() );
        return $this->discountype->getDiscount();
    }
      
}
