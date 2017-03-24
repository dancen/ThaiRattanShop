<?php

namespace App\Exceptions;

class CouponNotFoundException extends \Exception {

    public function handle() {
     //error message
      $message = "The coupon code is missing or not valid.";
      return \View::make('errors/notfound', array("message" => $message));
  }
}
