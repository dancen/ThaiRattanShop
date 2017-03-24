<?php

namespace App\Models\Repositories;
use App\Models\Product as BaseProduct;


class ProductRepository extends BaseProduct
{
    
    public $table = "products";
    
    public  static function findById( $id ){            
        return parent::find( $id )->first();
    }
    
    public  static function findProductsByCategoryId( $id ){            
        return parent::whereCategory( $id )->get();
    }
    
    public  static function findProductBySlug( $slug ){            
        return parent::whereSlug( $slug )->first();
    }
    
      
}
