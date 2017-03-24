<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Notifier;

/**
 * Description of Notifier
 *
 * @author dan
 */
abstract class Notifier {
    //put your code here
    
    abstract public function setTo( $to );

    abstract function setSubject( $subject );

    abstract public function buildHeader();

    abstract function buildBody( $helper );
    
}
