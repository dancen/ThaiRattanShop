<?php

namespace App\Exceptions;

class OrdersNotFoundException extends \Exception {

     public function handle() {
     //error message
      $message = "Error! Orders Not Found. Please contact Thai Rattan!";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
