<?php

namespace App\Models\Discount;
use App\Models\Discount\DiscountModelInterface;

// interface all discount classes must implement

interface DiscountInterface 
{
      
    public function setCalculatorModel( DiscountModelInterface $discountmodel );
    
      
}
