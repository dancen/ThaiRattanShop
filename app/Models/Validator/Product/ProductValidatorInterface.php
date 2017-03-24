<?php

namespace App\Models\Validator\Product;

// this class store the collection of items in the shopping cart

interface ProductValidatorInterface 
{
    
     public function getMessages();
     
     public function validate();
    
            
      
}
