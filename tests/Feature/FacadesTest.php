<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Shop\ShopFacade;
use App\Models\Shop\Shopper;
use App\Models\Category\Category;
use App\Models\Product\Product;
use App\Models\Subscriber\Subscriber;
use App\Models\Cart\Cart;

class FacadesTest extends TestCase {

    public function setUp() {
        
        parent::setUp();
                
    }

    /**
     * testInitDiscount
     *
     * @return void
     */
    public function testInitDiscount() {

        $shop = new ShopFacade( new Shopper );
        $shopper = $shop->initDiscount()->getShopper();        
        $this->assertTrue( $shopper->getDiscount() > 0 );
    }
    
     /**
     * testInitDeliveryCost
     *
     * @return void
     */
    public function testInitDeliveryCost() {

        $shop = new ShopFacade( new Shopper );
        $shopper = $shop->initDeliveryCost()->getShopper();        
        $this->assertTrue( $shopper->getDeliveryCost() == 0 );
    }
    
     /**
     * testSetProductCategories
     *
     * @return void
     */
    public function testSetProductCategories() {

        $shop = new ShopFacade( new Shopper );
        $shopper = $shop->setProductCategories()->getShopper();        
        $this->assertTrue( count($shopper->getCategories()) > 3 );
    }
    
     /**
     * testSetCategory
     *
     * @return void
     */
    public function testSetCategory() {

        $shop = new ShopFacade( new Shopper );
        $shopper = $shop->setCategory('thai-rattan-armchairs')->getShopper();        
        $this->assertTrue( $shopper->getCategory()->id == 3 );
    }
    
    /**
     * testSetProducts
     *
     * @return void
     */
    public function testSetProducts() {

        $repo = new Category();
        $category = $repo->findCategoryById(3);
        $shopper = new Shopper;
        $shopper->setCategory($category);
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->setProducts()->getShopper();        
        $this->assertTrue( count($shopper->getProducts()) > 3 );
    }
    
    /**
     * testSetProduct
     *
     * @return void
     */
    public function testSetProduct() {

        $shopper = new Shopper;
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->setProduct( 'rattan-armchair-mrw-polna-03' )->getShopper();        
        $this->assertNotNull( $shopper->getProduct() );
    }
    
     /**
     * testPopulateProduct
     *
     * @return void
     */
    public function testPopulateProduct() {

        $repo = new Product();
        $product = $repo->findById(3);
        $shopper = new Shopper;
        $shopper->setProduct($product);        
        
        $product_params = array(
                        "qty" => 5,
                        "rc" => 'grey-light',
                        "fc" => 'white',
                );        
        
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->populateProduct( $product_params )->getShopper();        
        $this->assertTrue( $shopper->getProduct()->getQuantity() > 2 );
    }
    
    
     /**
     * testUpdateCart
     *
     * @return void
     */
    public function testUpdateCart() {
               
        $repo_p = new Product();
        $product = $repo_p->findById(3);
        
        $repo_s = new Subscriber();
        $subscriber = $repo_s->findSubscriberByCoupon('123456');
        
        
        $shopper = new Shopper;
        $shopper->setCart( null );
        $shopper->setProduct($product);
        $shopper->setSubscriber($subscriber);
        
        $params = array(
                        "couponcode" => '123456',
                );        
        
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->updateCart( $params )->getShopper();        
        $this->assertTrue( $shopper->getDiscount() > 10 );
    }
    
    
     /**
     * testLoadDeliveryAreas
     *
     * @return void
     */
    public function testLoadDeliveryAreas() {
                       
        $shopper = new Shopper;        
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->loadDeliveryAreas()->getShopper();        
        $this->assertTrue( count($shopper->getDeliveryAreas()) > 70 );
    }
    
    
     /**
     * testSetDeliveryAreaId
     *
     * @return void
     */
    public function testSetDeliveryAreaId() {
                       
        $shopper = new Shopper; 
        $shopper->setEmail('daniele.centamore@gmail.com');
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->setDeliveryAreaId()->getShopper();        
        $this->assertTrue( $shopper->getDeliveryAreaId() != 0 );
    }
    
     /**
     * testSetDeliveryChanged
     *
     * @return void
     */
    public function testSetDeliveryChanged() {
                       
        $shopper = new Shopper; 
        $shopper->setDeliveryAreaId(6);
        $shopper->setCart( new Cart() );
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->setDeliveryChanged()->getShopper();        
        $this->assertTrue( $shopper->getDeliveryCost() > 0 );
    }
    
    
      /**
     * testRemoveItem
     *
     * @return void
     */
    public function testRemoveItem() {
                       
        $shopper = new Shopper; 
        $shopper->setCart( new Cart() );
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->removeItem( 1 )->getShopper();        
        $this->assertTrue( count($shopper->getCart()->getCollection()) == 0 );
    }
    
      /**
     * testUpdateItem
     *
     * @return void
     */
    public function testUpdateItem() {
                       
        $repo_p = new Product();
        $product = $repo_p->findById(3);
        
        $repo_s = new Subscriber();
        $subscriber = $repo_s->findSubscriberByCoupon('123456');        
        
        $shopper = new Shopper;
        $shopper->setCart( null );
        $shopper->setProduct($product);
        $shopper->setSubscriber($subscriber);
        
        $params = array(
                        "couponcode" => '123456',
                );        
        
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->updateCart( $params )->getShopper(); 
        
        
        $shopper2 = new Shopper; 
        $shopper2->setCart( $shopper->getCart() );
        
         $item_params = array(
                        "item_id" => 0,
                        "qty" => 4,
                        );
        
        $shop2 = new ShopFacade( $shopper2 );        
        $shopper3 = $shop2->updateItem( $item_params )->getShopper();        
        $this->assertTrue( count($shopper3->getCart()->getCollection()) > 0 );
    }
    
    
    
      /**
     * testSetLastOrder
     *
     * @return void
     */
    public function testSetLastOrder() {
                       
        $shopper = new Shopper;
        $shopper->setEmail('daniele.centamore@gmail.com');
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->setLastOrder()->getShopper();        
        $this->assertNotNull( $shopper->getLastOrder() );
    }
    
    
      /**
     * testSetPaymentCode
     *
     * @return void
     */
    public function testSetPaymentCode() {
                       
        $shopper = new Shopper;
        $shopper->setEmail('daniele.centamore@gmail.com');
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->setPaymentCode()->getShopper();        
        $this->assertNotNull( $shopper->getPaymentCode() );
    }
    
    
      /**
     * testUpdateCoupon
     *
     * @return void
     */
    public function testUpdateCoupon() {
                       
        $repo_s = new Subscriber();
        $subscriber = $repo_s->findSubscriberByCoupon('123456');  
        
        $shopper = new Shopper;
        $shopper->setSubscriber($subscriber);
        $shop = new ShopFacade( $shopper );        
        $shopper = $shop->updateCoupon()->getShopper();        
        $this->assertTrue( $shopper->getCouponType() == "REGULAR" );
    }

}
