<?php

namespace App\Models\Validator\Product;
use App\Models\Validator\Product\ProductValidator;
use App\Models\Validator\Product\ProductValidatorInterface;
use Illuminate\Support\Facades\Validator;

// validator class

class FabricValidator extends ProductValidator implements ProductValidatorInterface
{
        
      public function getMessages(){
         
       return $messages = [
            'couponcode.required' => 'The coupon code is required!',
            'couponcode.coupon' => 'The coupon code entered is not valid or expired!',
            'qty.required' => 'The Quantity field is required!',
            'fc.required' => 'The Fabric Color field is required!',
        ];
         
     }
     
      public function validate(){
       
        // execute validation
        return  Validator::make($this->request->all(), [
                    'couponcode' => 'required|min:6|max:8|coupon',
                    'qty' => 'required',
                    'fc' => 'required',
                        ], $this->getMessages());
    
     
      }
      
}
