<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Redirect;

class CheckoutValidationFailException extends \Exception {

    public function handle( $validator , $request ) {
     
      
       // if validator has errors redirect to the previous page
        return Redirect::action('ShopController@checkout', array('order' => $request->get("order"), 'checkout_type' => $request->get("checkout_type")))
                            ->withErrors($validator)
                            ->withInput();
      
      
  }
}
