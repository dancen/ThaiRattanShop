<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller {

    
    public function __construct() {
       
    }

    
    
    
     //
    private function adduser( $name , $email , $dominio , $pwd ) {
        
        $user = new \App\User();
        $user->name = $name;
        $user->password = \Hash::make($pwd);
        $user->email = $email.'@'.$dominio;
        $user->created_at = new \Datetime('now');
        $user->updated_at = new \Datetime('now');
        $user->save();
        
         // return the template
        return Redirect::action('OrdersController@manager');
    }
    
     //
    private function deleteuser( $id ) {
        
        $user = \App\User::find($id);        
        $user->delete();
        
         // return the template
        return Redirect::action('OrdersController@manager');
    }

}
