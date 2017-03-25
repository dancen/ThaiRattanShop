<?php

namespace App\Models\Validator\Checkout;
use App\Models\Validator\ValidatorTypeInterface;

// validator type class

final class DefaultCheckoutValidatorType implements ValidatorTypeInterface
{
    
     public function getName(){                      
        
        return \App\Models\Validator\Checkout\DefaultCheckoutValidator::class;
    }
        
      
}
