<?php

namespace App\Models\Validator\Checkout;

// interface validator class must implement

interface CheckoutValidatorInterface 
{
    
     public function getMessages();
     
     public function validate();
    
            
      
}
