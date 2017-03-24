<?php

namespace App\Exceptions;

class CategoriesNotFoundException extends \Exception {

    public function handle() {
     //error message
      $message = "The Category List is not available.";
      return \View::make('errors/notfound' , array( "message" => $message));
  }
}
