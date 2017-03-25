<?php

namespace App\Models\Validator;
use Illuminate\Http\Request;

// checkout validator strategy pattern

class CheckoutValidatorStrategy 
{
    
    private $request;
    
    public function __construct( Request $request ){
        $this->request = $request;
    }
    
    public function getFactory(){
        
         // create a instance of the validator type based on checkout
        if ($this->request->get("checkout_type") == "First") {
            
            // first checkout the user need to enter all data
            $checkout_type = new \App\Models\Validator\Checkout\FirstCheckoutValidatorType;
            
        } else {
            
            // next checkout the user has all data already entered
            $checkout_type = new \App\Models\Validator\Checkout\DefaultCheckoutValidatorType;
        }        
        
        // create a validator based on the validatorType provided
        $factory = new \App\Models\Validator\ValidatorFactory( $checkout_type , $this->request );
        return $factory;
        
        
    }
    
        
      
}
