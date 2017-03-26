<?php

namespace App\Models\Cart;

use App\Models\Cart\Cartable;
use App\Models\Cart\CartInterface;

// this class store the collection of items in the shopping cart

class Cart implements CartInterface {

    private $collection = array();

    /**
     * addItem() 
     *
     * @param  Cartable $product
     * @return null
     */
    public function addItem(Cartable $product) {


        // create a ID for the item in the collection
        $id = count($this->collection);

        // set the cart index
        $product->setCartIndex($id);

        // add the item in the cart
        array_push($this->collection, $product);
    }

    /**
     * removeItem() 
     *
     * @param  String $id
     * @return null
     */
    public function removeItem($id) {

        //remove the item from the cart
        unset($this->collection[$id]);
    }

    /**
     * updateItem() 
     *
     * @param  String $id
     * @param  String $qty
     * @return null
     */
    public function updateItem($id, $qty) {

        //update the item from the cart
        $this->collection[$id]->setQuantity($qty);
    }

    /**
     * getNumOfItems() 
     *
     * @param  null
     * @return Integer 
     */
    public function getNumOfItems() {

        $numofitems = 0;
        //return the total number of items in the cart
        foreach ($this->collection as $item) {
            $numofitems += $item->getQuantity();
        }
        return $numofitems;
    }

    /**
     * getAmount() 
     *
     * @param  null
     * @return Integer 
     */
    public function getAmount() {

        $amount = 0;
        //return the total number of items in the cart
        foreach ($this->collection as $item) {

            $amount += ( $item->price * $item->getQuantity());
        }

        return $amount;
    }

    /**
     * getCollection() 
     *
     * @param  null
     * @return array 
     */
    public function getCollection() {

        // return all of the items in  the cart
        return array_reverse($this->collection);
    }

    /**
     * isEmpty() 
     *
     * @param  null
     * @return boolean
     */
    public function isEmpty() {

        // check if the collection is empty
        if (count($this->collection) > 0) {
            return false;
        } else {
            return true;
        }
    }

    /**
     * getTotalVolume() 
     *
     * @param  null
     * @return Integer 
     */
    public function getTotalVolume() {

        $totalvolume = 0;

        //calculate the volume from the cart
        foreach ($this->collection as $item) {

            $width = $this->getNormalizedDimension($item->getWidth()) / 100;
            $depth = $this->getNormalizedDimension($item->getDepth()) / 100;
            $height = $this->getNormalizedDimension($item->getHeight()) / 100;

            $volume = (($width * $depth * $height) * $item->getQuantity());
            $totalvolume += $volume;
        }

        return $totalvolume;
    }

    /**
     * getNormalizedDimension() 
     *
     * @param  String $dim
     * @return String 
     */
    private function getNormalizedDimension($dim) {
        return substr($dim, 0, 3);
    }

}
