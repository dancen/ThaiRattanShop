<?php

namespace App\Models;

// this class retrun static method for useful tasks provided in the template

class Helper 
{
  
    public function __contruct(){}
    
    public static function normalizeFabricName($name){
      return substr($name,9);        
    }
    
    public static function formatCurrency( $amount ){
        
        $format = $amount; 
       
        switch ($amount){   
            case $amount < 999:
                $format = $amount.",00";
            break;
            case $amount > 1000 && $amount < 9999:
                $format = substr($amount,0,1).",".substr($amount,1);
            break;
            case $amount > 9999 && $amount < 99999:
                $format = substr($amount,0,2).",".substr($amount,2);
            break;
            case $amount > 99999 && $amount < 999999:
                $format = substr($amount,0,3).",".substr($amount,3);
            break;
            case $amount > 999999 && $amount < 9999999:
                 $format = substr($amount,0,1).",".substr($amount,0,3).",".substr($amount,5);
            break;
            
        }       
        
        // very strange, switch does not process 0 as a input
        // so I have to check out of the switch statement
        if($amount < 999){ $format = $amount.",00";}         
        
        return $format;        
    }
    
    
    public static function calculateDiscount( $amount , $discount ){              
             
        $discount = (100 - $discount) / 100;
        return round($amount * $discount);
    }
    
//    public static function calculateShipping( $amount, $distancecoeff = null, $numberofitem = null, $totalvolume = null ){
//        
//        return $amount * 0.15;
//    }
    
    public static function sum( $amount1 , $amount2 ){
        
        return round($amount1 + $amount2);
    }
    
    public static function findCategoryNameById($id){
      $category = \App\Models\Category\Category::findCategoryById($id); 
      return $category->name;
      
    }
   
      
}
