<?php

namespace App\Events;

use App\Models\Orders;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

abstract class OrderEvent
{
    use SerializesModels;
    
   public $order;
   public $request;
   public $data;

    /**
     * Create a new event instance.
     *
     * @param  Orders  $order
     * @return void
     */
    public function __construct(Orders $order, Request $request, $data = null)
    {
        $this->order = $order;
        $this->request = $request;
        $this->data = $data;
    }
      
}
