<?php

namespace App\Exceptions;

class CategoryNotFoundException extends \Exception {

    public function handle() {
     //error message
      $message = "The Category you are looking for is not available.";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
