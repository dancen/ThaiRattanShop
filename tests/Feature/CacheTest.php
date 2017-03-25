<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;

class CacheTest extends TestCase {

   public function setUp()
    {
        parent::setUp();
       
    }
    
    public function testSetMemento(){
    
        $memento = new \App\Models\Memento\Memento();
        $memento->set( "name" , "Daniele" );
        $result = $memento->get( "name" );
        $this->assertTrue( $result == "Daniele" );
        
    }
    
    public function testGetMemento(){
    
        $memento = new \App\Models\Memento\Memento();
        $result = $memento->get( "name" );
        $this->assertTrue( $result == "Daniele" );
        
    }
    
    public function testDeleteMemento(){
    
        $memento = new \App\Models\Memento\Memento();
        $memento->delete( "name" );
        $this->assertTrue( $memento->get( "name" ) == null );
        
    }
    
    public function testClearMemento(){
    
        $memento = new \App\Models\Memento\Memento();
        $memento->set( "name" , "Daniele" );
        $memento->clear();
        $this->assertFalse( $memento->get( "name" ) != null );
        
    }
    

}
