<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;

// this class manage shop tasks related to products

class ShopProductFacade {

    private $shopper;

    public function __construct( Shopper $shopper ) {

        $this->shopper = $shopper;
    }
    
    public function getShopper() {
        return $this->shopper;
    }

   
    /**
     * getProductCategories() - set all categories of product in shopper object
     *
     * @param  null
     * @return Collection
     */
    public function getProductCategories() {
        return $this->shopper->getCategories();
    }

    /**
     * setProductCategories() - get all categories of product
     *
     * @param  null
     * @return $this
     */
    public function setProductCategories() {


        /**
         * findAll() method retrieve all categories
         *
         * @param  null
         * @return Collection
         */
        $categories = \App\Models\Category\Category::findAll();

        /**
         * store category list in shopper object
         * to avoid repetitives db calls
         *
         * @param  \Illuminate\Http\Request  $request
         * @param   \App\Models\Category\Category  $categories
         * @return null
         */
        $this->shopper->setCategories($categories);

        // return the shopper
        return $this;
    }

    

   

    /**
     * setCategory() - get category by slug
     *
     * @param  null
     * @return $this
     */
    public function setCategory($slug) {

        // retrive category by slug
        $category = \App\Models\Category\Category::findCategoryBySlug($slug);

        // check if the category is valid
        if ($category instanceof \App\Models\Category\Category) {

            // update the shopper
            $this->shopper->setCategory($category);
            // return the shopper
            return $this;
        } else {

            return null;
        }
    }

    /**
     * setProducts() - get products by category id 
     *
     * @param  null
     * @return $this
     */
    public function setProducts() {

        // get Category from shopper object
        $category = $this->shopper->getCategory();
        // retrieves products by category 
        $products = \App\Models\Product\Product::findProductsByCategoryId($category->id);

        // check if the category is valid
        if ($products != null) {

            // update the shopper
            $this->shopper->setProducts($products);
            // return the shopper
            return $this;
        } else {

            return null;
        }
    }

    /**
     * setProduct() - get product by slug
     *
     * @param  null
     * @return $this
     */
    public function setProduct($slug) {

        // retrieve the product from DB
        $product = \App\Models\Product\Product::findProductBySlug($slug);

        //check if
        if ($product != null) {
            $this->shopper->setProduct($product);
            // return the shopper
            return $this;
        } else {

            return null;
        }
    }

    /**
     * populateProduct() - set product properties
     *
     * @param  null
     * @return $this
     */
    public function populateProduct($product_params) {

        $product = $this->shopper->getProduct();

        $product->setQuantity($product_params["qty"]);
        $product->setRattanColor($product_params["rc"]);
        $product->setFabricColor($product_params["fc"]);

        $this->shopper->setProduct($product);

        // return the shopper
        return $this;
    }

   

}
