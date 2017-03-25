<?php

namespace App\Models\Validator\Product;

// interface product validator must implement

interface ProductValidatorInterface 
{
    
     public function getMessages();
     
     public function validate();
    
            
      
}
