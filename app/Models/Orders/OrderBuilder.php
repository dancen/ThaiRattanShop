<?php

namespace App\Models\Orders;
use App\Models\Orders\Orders;
// this class store the collection of items in the shopping cart

class OrderBuilder
{
    private $order;
    private $fields = array();
    
    public function __construct( Orders $order ) {
        $this->order = $order;
    }
    
    public function populate( $field_name , $value ) {
        array_push($this->fields, array( "name" => $field_name , "value" => $value ));
    }
    
    public function build(){
        foreach($this->fields as $field){
            $this->order->$field['name'] = $field['value']; 
        }
    }
    
    public function save(){
         $this->order->save();
         return $this->order;
    }
    
           
    
}
