<?php

namespace App\Models\Repositories;
use App\Models\Subscriber as BaseSubscriber;
use App\Models\Subscriber\SubscriberInterface;


class SubscriberRepository extends BaseSubscriber implements  SubscriberInterface
{
    
    public static function findSubscriberByCoupon( $coupon ){
       return parent::whereCoupon($coupon)->first();
    }
    
    public static function findSubscriberByEmail( $email ){
       return parent::whereEmail($email)->first();
    }    
    
    
     public function getCouponType(){}
      
}
