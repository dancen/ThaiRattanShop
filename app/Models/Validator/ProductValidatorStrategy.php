<?php

namespace App\Models\Validator;
use Illuminate\Http\Request;

// validator pattern strategy

class ProductValidatorStrategy 
{
    
    private $product; 
    private $request;
    
    public function __construct( $product, Request $request ){
        $this->product = $product;
        $this->request = $request;
    }
    
    public function getFactory(){
        
        if($this->product->has_rattan == true && $this->product->has_fabric == true ) {
            
            // product logic
            $product_type = new \App\Models\Validator\Product\RattanFabricValidatorType;
            
        } else if($this->product->has_rattan == true && $this->product->has_fabric == false ) {
            
            // product logic
            $product_type = new \App\Models\Validator\Product\RattanValidatorType;
            
        } else if($this->product->has_rattan == false && $this->product->has_fabric == true ) {
            
            // product logic
            $product_type = new \App\Models\Validator\Product\FabricValidatorType;
            
        }        
        
        // create a validator based on the validatorType provided
        $factory = new \App\Models\Validator\ValidatorFactory( $product_type , $this->request );
        return $factory;
        
        
    }
    
        
      
}
