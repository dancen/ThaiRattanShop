<?php

namespace App\Models\Validator\Checkout;

// this class store the collection of items in the shopping cart

interface CheckoutValidatorInterface 
{
    
     public function getMessages();
     
     public function validate();
    
            
      
}
