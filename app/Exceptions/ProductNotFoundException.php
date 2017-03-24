<?php

namespace App\Exceptions;

class ProductNotFoundException extends \Exception {

    public function handle() {
     //error message
      $message = "The Product you are looking for is not available.";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
