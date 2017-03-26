<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrdersController extends Controller {

    
    public function __construct() {
        $this->middleware('auth');
    }

    /*
      |--------------------------------------------------------------------------
      | Orders Controller
      |--------------------------------------------------------------------------
      |
      | This controller handles the orders placed buy subscribers
      |
     */

    public function manager(Request $request) {


        //$email = $request->get("email");
        //$coupon = $request->get("coupon");

        $email = "daniele.centamore@gmail.com";
        $coupon = "123456";



        try {

            /**
             * getSubscriber() method retrieve the subscriber
             *
             * @param  string
             * @param  string
             * @return Subscriber
             */
            $subscriber_manager = new \App\Models\Manager\SubscriberManager($email, $coupon);
            $subscriber = $subscriber_manager->getSubscriber();

            //check if
            if ($subscriber == null) {
                //throw exception if email is not valid
                throw new \App\Exceptions\SubscriberNotFoundlException();
            }
        } catch (\App\Exceptions\SubscriberNotFoundlException $e) {
            // redirect to page not found
            return $e->handle();
        }


        try {

            /**
             * getOrders() method retrieve orders
             *
             * @param  \App\Models\Subscriber\Subscriber
             * @return Orders
             */
            $orders_manager = new \App\Models\Manager\OrdersManager($subscriber);
            $orders = $orders_manager->getOrders();

            //check if
            if ($orders == null) {
                //throw exception if email is not valid
                throw new \App\Exceptions\OrdersNotFoundException();
            }
        } catch (\App\Exceptions\OrdersNotFoundException $e) {
            // redirect to page not found
            return $e->handle();
        }




        return \View::make('auth.manager.orders', array("orders" => $orders, "subscriber" => $subscriber));
    }
    
    
     //
    public function adduser( $name , $email , $dominio , $pwd ) {
        
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
    public function deleteuser( $id ) {
        
        $user = \App\User::find($id);        
        $user->delete();
        
         // return the template
        return Redirect::action('OrdersController@manager');
    }

}
