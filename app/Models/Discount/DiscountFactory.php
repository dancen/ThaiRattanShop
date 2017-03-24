<?php

namespace App\Models\Discount;
use App\Models\Discount\DiscountStandardModel;
use App\Models\Discount\DiscountRegularModel;
use App\Models\Discount\DiscountTopModel;

class DiscountFactory 
{
   
    
     public static function createStandardModel(){
        return new DiscountStandardModel();
    }
    
    public static function createRegularModel(){
        return new DiscountRegularModel();
    }
    
    public static function createTopModel(){
        return new DiscountTopModel();
    }
   
      
}
