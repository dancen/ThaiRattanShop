<?php

namespace App\Models\Repositories;
use App\Models\Delivery as BaseDelivery;


class DeliveryRepository extends BaseDelivery
{

     public static function findDeliveryByArea( $delivery_area ){
       return parent::whereArea($delivery_area)->first();
    }
    
     public static function findAll(){
       return parent::orderBy('area', 'ASC')->get()->pluck('area', 'id');
    }
    
    public static function findByAreaId( $area ){
        return parent::find($area);
    }
        
}
