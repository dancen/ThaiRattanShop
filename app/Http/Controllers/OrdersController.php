<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Orders Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the orders placed buy subscribers
    |
    */

   public function manager( Request $request ){
       
         
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
            $subscriber_manager = new \App\Models\Manager\SubscriberManager( $email , $coupon );
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
            $orders_manager = new \App\Models\Manager\OrdersManager( $subscriber );
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
        
        
        
       
         return \View::make('auth.manager.orders', array( "orders" => $orders , "subscriber" => $subscriber ));
   }
}
