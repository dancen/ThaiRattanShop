<?php

namespace Tests\Feature;

use Tests\TestCase;
use Mockery;
use App\Models\Product\Product;
use App\Models\Category\Category;
use App\Models\Orders\Orders;
use App\Models\Subscriber\Subscriber;
use App\Models\Delivery\Delivery;

class RepositoriesTest extends TestCase {

   
    
    public function setUp()
    {
        parent::setUp();
        
        $this->product = Mockery::mock(Product::class);
        $this->category = Mockery::mock(Category::class);
        $this->orders = Mockery::mock(Orders::class);
        $this->subscriber = Mockery::mock(Subscriber::class);
        $this->delivery = Mockery::mock(Delivery::class);
    }
    

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testName() {
        
        $this->assertDatabaseHas('categories', ['name' => 'Chairs']);
    }

    public function testId() {
        
        $this->assertDatabaseMissing('categories', ['id' => 10]);
    }

    public function testFindProductsByCategoryId() {

        $this->product->shouldReceive('findProductsByCategoryId')->with('2');
        $this->assertNotNull( $this->product );
        
    }
    
    
    public function testFindProductBySlug() {

        $this->product->shouldReceive('findProductBySlug')->with('rattan-armchair-mrw-pol-01');
        $this->assertNotNull( $this->product );
        
    }
    
    public function testFindOrFail() { 

        $this->category->shouldReceive('findOrFail')->with('2');
        $this->assertNotNull( $this->category );
        
    }
    
    public function testFindAll() {        
       
        $this->category->shouldReceive('findAll');
        $this->assertNotNull( $this->category );
        
    }
    
    public function testFindLastOrderbyEmail() {
        
        $this->orders->shouldReceive('findLastOrderbyEmail')->with('daniele.centamore@gmail.com');
        $this->assertNotNull( $this->orders );
        
    }
    
    public function testFindOrderById() {
        
        $this->orders->shouldReceive('findById')->with('1');
        $this->assertNotNull( $this->orders );
        
    }
    
    public function testFindSubscriberByEmail() {
        
        $this->subscriber->shouldReceive('findSubscriberByEmail')->with('daniele.centamore@gmail.com');
        $this->assertNotNull( $this->subscriber );
        
    }
    
    public function testFindSubscriberByCoupon() {
        
        $this->subscriber->shouldReceive('findSubscriberByCoupon')->with('123456');
        $this->assertNotNull( $this->subscriber );
        
    }
    
    
    public function testFindDeliveryByArea() {
        
        $this->delivery->shouldReceive('findDeliveryByArea')->with('Bangkok');
        $this->assertNotNull( $this->delivery );
        
    }
    
    
    public function testDeliveryAreaLoad() {
        
        $this->delivery->shouldReceive('findAll');
        $this->assertNotNull( $this->delivery );
        
    }
    
    

}
