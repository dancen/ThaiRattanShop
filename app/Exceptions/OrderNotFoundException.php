<?php

namespace App\Exceptions;

class OrderNotFoundException extends \Exception {

     public function handle() {
     //error message
      $message = "Error in your session! The Order data cannot be updated. Please contact Thai Rattan!";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
