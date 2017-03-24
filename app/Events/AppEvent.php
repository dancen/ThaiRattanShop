<?php

namespace App\Events;

use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;

abstract class AppEvent 
{
    use SerializesModels;
    
   public $request;
   public $data;

    /**
     * Create a new event instance.
     *
     * @param  Request $request
     * @return void
     */
    public function __construct( Request $request, $data = null)
    {
        $this->request = $request;
        $this->data = $data;
    }
      
}
