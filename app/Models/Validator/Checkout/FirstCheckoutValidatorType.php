<?php

namespace App\Models\Validator\Checkout;
use App\Models\Validator\ValidatorTypeInterface;

// this class store the collection of items in the shopping cart

final class FirstCheckoutValidatorType implements ValidatorTypeInterface
{
    
    public function getName(){                      
       
        return \App\Models\Validator\Checkout\FirstCheckoutValidator::class;
    }
      
}
