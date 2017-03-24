<?php

namespace App\Exceptions;

class SubscriberNotFoundlException extends \Exception {

     public function handle() {
     //error message
      $message = "Error in your session! The Subscriber data cannot be updated. Please contact Thai Rattan!";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
