<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Notifier;

use App\Models\Helper;
use Mail;

/**
 * Description of NotifierManager
 *
 * @author dan
 */
class NotifierManager {

    private $notifiers = array();
    private $helper;

    //put your code here

    public function __construct(Helper $helper) {
        $this->helper = $helper;
    }

    public function addNotifier(NotifyOrderInterface $notifier) {
        array_push($this->notifiers, $notifier);
    }

    public function notify() {
        foreach ($this->notifiers as $notifier) {
            $notifier->buildHeader();
            $notifier->buildBody($this->helper);
                        
            mail($notifier->getTo(), $notifier->getSubject(), $notifier->getMessage(), $notifier->getHeaders());
        }
        
        
    }

}
