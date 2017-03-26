<?php

namespace App\Models\Repositories;
use App\Models\Purchase as BasePurchase;


class PurchaseRepository extends BasePurchase
{
    
    public  static function findPurchaseByOrderId( $id ){            
        return parent::whereOrderId( $id )->get();
    }
    
      
}
