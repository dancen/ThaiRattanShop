<?php

namespace App\Models\Validator;
use Illuminate\Http\Request;
use App\Models\Validator\ValidatorTypeInterface;

// Dynamic factory

class ValidatorFactory 
{
    
    private $validator_type; 
    private $request;
    
    public function __construct( ValidatorTypeInterface $validator_type, Request $request ){
        $this->validator_type = $validator_type;
        $this->request = $request;
    }
    
    public function createValidator(){
        $class = $this->validator_type->getName();
        return new $class( $this->request );
    }
    
        
      
}
