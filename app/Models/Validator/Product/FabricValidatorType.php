<?php

namespace App\Models\Validator\Product;
use App\Models\Validator\ValidatorTypeInterface;

// validator type class

final class FabricValidatorType implements ValidatorTypeInterface
{
    
   public function getName(){
                      
        return App\Models\Validator\Product\FabricValidator::class;
    }
          
}
