<?php

namespace App\Models\Validator\Product;
use App\Models\Validator\Product\ProductValidator;
use App\Models\Validator\Product\ProductValidatorInterface;
use Illuminate\Support\Facades\Validator;

// this class store the collection of items in the shopping cart

class RattanValidator extends ProductValidator implements ProductValidatorInterface
{
    
     public function getMessages(){
         
       return $messages = [
            'couponcode.required' => 'The coupon code is required!',
            'couponcode.coupon' => 'The coupon code entered is not valid or expired!',
            'qty.required' => 'The Quantity field is required!',
            'rc.required' => 'The Rattan Color field is required!',
        ];
         
     }
     
      public function validate(){
       
        // execute validation
        return Validator::make($this->request->all(), [
                    'couponcode' => 'required|min:6|max:8|coupon',
                    'qty' => 'required',
                    'rc' => 'required',
                        ], $this->getMessages());
        
        
      
          
     }
      
}
