<?php

namespace App\Exceptions;

class DeliveryAreasNotFoundException extends \Exception {

    public function handle() {
     //error message
      $message = "The Delivery Areas cannot be loaded.";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
