<?php

namespace App\Models\Validator\Product;
use App\Models\Validator\ValidatorTypeInterface;

// validator type class

final class RattanFabricValidatorType implements ValidatorTypeInterface
{
    
    public function getName(){   
        
        return \App\Models\Validator\Product\RattanFabricValidator::class;
    }
          
}
