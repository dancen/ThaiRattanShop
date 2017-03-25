<?php

namespace App\Models\Validator\Checkout;

use App\Models\Validator\Checkout\CheckoutValidator;
use App\Models\Validator\Checkout\CheckoutValidatorInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;

// checkout class

class FirstCheckoutValidator extends CheckoutValidator implements CheckoutValidatorInterface {

    public function getMessages() {

        return $messages = [
            'co_f_name.required' => 'The First Name is required!',
            'co_l_name.required' => 'The Last Name code entered is not valid or expired!',
            'co_address1.required' => 'The Address field is required!',
            'co_city.required' => 'The City field is required!',
            'co_zip.required' => 'The Zip Code field is required!',
            'co_phone.required' => 'The Phone field is required!',
        ];
    }

    public function validate() {

        // execute validation
        $validator = Validator::make($this->request->all(), [
                    'co_f_name' => 'required',
                    'co_l_name' => 'required',
                    'co_address1' => 'required',
                    'co_city' => 'required',
                    'co_zip' => 'required',
                    'co_phone' => 'required',
                        ], $this->getMessages());
        
                
          // check the validation
        if ($validator->fails()) {
            return Redirect::action('ShopController@checkout', array('checkout_type' => $this->request->get("checkout_type")))
                            ->withErrors($validator)
                            ->withInput();
        } 
    }

}
