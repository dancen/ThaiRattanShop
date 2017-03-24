<?php

namespace App\Exceptions;

class CartEmptyException extends \Exception {

    public function handle() {
        //error message
        $message = "Your shopping cart is empty!";
        return \View::make('errors/cartempty', array("message" => $message));
    }

}
