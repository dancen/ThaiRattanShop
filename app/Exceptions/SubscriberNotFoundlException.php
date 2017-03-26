<?php

namespace App\Exceptions;

class SubscriberNotFoundlException extends \Exception {

     public function handle() {
     //error message
      $message = "Error in your session! Subscriber Not Found. Please contact Thai Rattan!";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
