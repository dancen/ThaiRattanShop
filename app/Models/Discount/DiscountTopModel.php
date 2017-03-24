<?php

namespace App\Models\Discount;
use App\Models\Discount\DiscountModelInterface;

class DiscountTopModel extends Discount implements DiscountModelInterface
{
    
   public function calculate(){       
       return 30;
   }
   
      
}
