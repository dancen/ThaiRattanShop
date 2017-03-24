<?php

namespace App\Models\Validator\Product;
use App\Models\Validator\ValidatorTypeInterface;

// this class store the collection of items in the shopping cart

final class RattanValidatorType implements ValidatorTypeInterface
{
    
    public function getName(){                      
        
        return \App\Models\Validator\Product\RattanValidator::class;
    }
          
}
