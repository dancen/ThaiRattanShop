<?php

namespace App\Listeners;

use App\Events\NotifyOrder;

class NotifyOrderListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NotifyOrder  $event
     * @return void
     */
    public function handle(NotifyOrder $event)
    {
                       
         /*
          |--------------------------------------------------------------------------
          | NOTIFY NEW ORDER
          |--------------------------------------------------------------------------
          |
          | NotifyOrderFacade notifies by email the new order to customer and to merchant
          |
         */
        
        // the class NotifyOrderFacade execute notifies to
        // the customer and merchant emails
        $notifyorder = new \App\Models\Notifier\NotifyOrderFacade(  $event->request , $event->data["shopper"] );
        $notifyorder->notify();
        
        
    }
}