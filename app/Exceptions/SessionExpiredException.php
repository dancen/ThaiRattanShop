<?php

namespace App\Exceptions;

class SessionExpiredException extends \Exception {

    public function handle() {
        //error message
        $message = "The session has expired!";
        return \View::make('errors/expired', array("message" => $message));
    }

}
