<?php

namespace App\Validators;

use Illuminate\Support\Facades\DB;

class CouponValidator extends \Illuminate\Validation\Validator {

    function validateCoupon($attribute, $value, $parameters, $validator) {
        $validator->setCustomMessages(array( "validation.coupon" => "asvsjkhj" ));
        return CouponValidator::isValidCoupon($attribute, $value, $parameters);
    }

    static function isValidCoupon($attribute, $value, $parameters) {

        $isvalid = false;
        
        // query the table with all the conditions
        $subscriber = DB::table('subscribers')->select('email')
                ->where('coupon', $value)->first();
        
        
        if(isset($subscriber->email)){
            
            $isvalid = true;
         }
                         
        return $isvalid;
    }
    
    

}
