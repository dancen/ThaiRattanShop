<?php

namespace App\Models\Discount;
use App\Models\Discount\DiscountModelInterface;
use App\Models\Discount\Discount;

class DiscountStandardModel extends Discount implements DiscountModelInterface
{
    
   public function calculate(){
       return 30;
   }
   
      
}
