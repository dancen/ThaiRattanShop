<?php

namespace App\Models\Memento;

// interface must be implemented for Memento classes

interface MementoInterface 
{
    
    public function get( $key );
    
    public function set( $key , $value );
    
    public function delete( $key );
    
    public function clear();
   
      
}
