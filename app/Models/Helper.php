<?php

namespace App\Models;

// this class retrun static method for useful tasks provided in the template

class Helper {

    // contructor 
    public function __contruct() {
        // 
    }

    /**
     * normalize string
     *
     * @param  String  $name 
     * @return String
     */
    public static function normalizeFabricName($name) {
        return substr($name, 9);
    }

    
    /**
     * formatCurrency thai currency
     *
     * @param  Integer  $amount 
     * @return String
     */
    public static function formatCurrency($amount) {

        $format = $amount;

        switch ($amount) {
            case $amount < 999:
                $format = $amount . ",00";
                break;
            case $amount > 1000 && $amount < 9999:
                $format = substr($amount, 0, 1) . "," . substr($amount, 1);
                break;
            case $amount > 9999 && $amount < 99999:
                $format = substr($amount, 0, 2) . "," . substr($amount, 2);
                break;
            case $amount > 99999 && $amount < 999999:
                $format = substr($amount, 0, 3) . "," . substr($amount, 3);
                break;
            case $amount > 999999 && $amount < 9999999:
                $format = substr($amount, 0, 1) . "," . substr($amount, 0, 3) . "," . substr($amount, 5);
                break;
        }


        if ($amount < 999) {
            $format = $amount . ",00";
        }

        return $format;
    }

    /**
     * Calcultate discount
     *
     * @param  Integer  $amount 
     * @param  Integer  $discount 
     * @return Integer
     */
    public static function calculateDiscount($amount, $discount) {

        $discount = (100 - $discount) / 100;
        return round($amount * $discount);
    }
    
    
    /**
     * Calcultate sum
     *
     * @param  Integer  $amount1 
     * @param  Integer  $amount2 
     * @return Integer
     */

    public static function sum($amount1, $amount2) {

        return round($amount1 + $amount2);
    }

    
    /**
     * findCategoryNameById()
     *
     * @param  Integer  $id 
     * @return Category object
     */
    public static function findCategoryNameById($id) {
        $category = \App\Models\Category\Category::findCategoryById($id);
        return $category->name;
    }
    
    
    /**
     * findPurchaseByOrderId()
     *
     * @param  Integer  $id 
     * @return Category Collection
     */
    public static function findPurchaseByOrderId($id) {
        $purchases = \App\Models\Purchase\Purchase::findPurchaseByOrderId($id);
        return $purchases;
    }

}
