<?php

namespace App\Models\Repositories;
use App\Models\Category as BaseCategory;


class CategoryRepository extends BaseCategory
{
    
    public static function findAll(){
       return parent::orderBy('id', 'ASC')->get();
    }
    
    public  static function findCategoryBySlug( $slug ){            
        return parent::whereSlug( $slug )->first();
    }
    
    public  static function findCategoryById( $id ){            
        return parent::whereId( $id )->first();
    }
      
}
