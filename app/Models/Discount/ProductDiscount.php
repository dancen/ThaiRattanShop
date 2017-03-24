<?php

namespace App\Models\Discount;
use App\Models\Discount\DiscountInterface;
use App\Models\Discount\DiscountModelInterface;
use App\Models\Discount\Discount;

class ProductDiscount extends Discount implements DiscountInterface
{
   private $discountmodel;
    
   public function setCalculatorModel( DiscountModelInterface $discountmodel){
       $this->discountmodel = $discountmodel;
   }
   
   public function getDiscount(){
       return $this->discountmodel->calculate();
   }
   
      
}
