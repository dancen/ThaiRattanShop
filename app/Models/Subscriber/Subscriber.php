<?php

namespace App\Models\Subscriber;
use  App\Models\Repositories\SubscriberRepository as BaseSubscriber;
use App\Models\Subscriber\SubscriberInterface;

class Subscriber extends BaseSubscriber implements  SubscriberInterface
{
    
    public function getCouponType(){
        return $this->coupon_type;
    }    
      
}
