<?php

namespace App\Models\Repositories;
use App\Models\Orders as BaseOrders;


class OrdersRepository extends BaseOrders
{
    
    public static function findLastOrderbyEmail($email){
        return parent::whereEmail($email)
                ->orderBy("id", "DESC")
                ->first();
    }
    
    public static function findById( $id ){
        return parent::whereId($id)->first();
    }
    
      
}
