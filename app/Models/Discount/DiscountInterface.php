<?php

namespace App\Models\Discount;
use App\Models\Discount\DiscountModelInterface;

// this class store the collection of items in the shopping cart

interface DiscountInterface 
{
      
    public function setCalculatorModel( DiscountModelInterface $discountmodel );
    
      
}
