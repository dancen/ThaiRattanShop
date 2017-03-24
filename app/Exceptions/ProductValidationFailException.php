<?php

namespace App\Exceptions;
use Illuminate\Support\Facades\Redirect;

class ProductValidationFailException extends \Exception {

    public function handle( $validator , $request ) {
     
      
       // if validator has errors redirect to the previous page
            return Redirect::action('ShopController@showProduct', array('product' => $request->get("product"), 'product_type' => $request->get("product_type")))
                            ->withErrors($validator)
                            ->withInput();
      
      
  }
}
