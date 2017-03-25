<?php

namespace App\Models\Validator\Checkout;
use App\Models\Validator\ValidatorTypeInterface;

// validator type class

final class FirstCheckoutValidatorType implements ValidatorTypeInterface
{
    
    public function getName(){                      
       
        return \App\Models\Validator\Checkout\FirstCheckoutValidator::class;
    }
      
}
