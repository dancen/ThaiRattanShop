<?php

namespace App\Models\Validator;
use Illuminate\Http\Request;

/*
 * abstract class Validator is the main class all validators
 * must inerith from ( Abstract Factory Pattern )
 * 
 * author: daniele.centamore@gmail.com
 */

abstract class Validator 
{
    
    protected $request;  
    
    public function __construct( Request $request ){
        $this->request = $request;
    }
    
        
      
}
