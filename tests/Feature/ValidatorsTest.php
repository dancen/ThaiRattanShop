<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;


class ValidatorsTest extends TestCase {

   public function setUp()
    {
        parent::setUp();
       
    }
    
    public function testProductValidation(){
        
        $product = new \App\Models\Product\Product;
        $product->has_rattan = true;
        $product->has_fabric = true;
        $strategy = new \App\Models\Validator\ProductValidatorStrategy( $product , new \Illuminate\Http\Request );
        $validatorFactory = $strategy->getFactory();
        $productvalidator = $validatorFactory->createValidator();
        $validator = $productvalidator->validate();
        $this->assertTrue( $validator->fails() == true );
        
    }
    
    
    public function testCheckoutValidation(){
        
        $strategy = new \App\Models\Validator\CheckoutValidatorStrategy( new \Illuminate\Http\Request );
        $validatorFactory = $strategy->getFactory();
        $productvalidator = $validatorFactory->createValidator();
        $validator = $productvalidator->validate();
        $this->assertTrue( $validator->fails() == true );
        
    }
    
    
    
    

}
