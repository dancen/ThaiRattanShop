<?php

namespace App\Models\Memento;

// this class store the collection of items in the shopping cart

interface MementoInterface 
{
    
    public function get( $key );
    
    public function set( $key , $value );
    
    public function delete( $key );
    
    public function clear();
   
      
}
