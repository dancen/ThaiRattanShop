<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Notifier;

/**
 * Description of NotifyOrderInterface
 *
 * @author dan
 */
interface NotifyOrderInterface {   

    public function setLanguage( $language );

    public function setTo($to);

    public function setSubject( $subject );

    public function setOrder( $order );
    
    public function setHelper( $helper );
    
    public function setDiscount( $discount );
    
    public function setCart( $cart );
    
    public function setDeliveryArea( $delivery_area );
    
    public function setDeliveryCost( $delivery_cost );
    
    public function setCoupon( $coupon );

    public function buildHeader();

    public function buildBody( $helper );

}
