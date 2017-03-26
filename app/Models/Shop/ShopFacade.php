<?php

namespace App\Models\Shop;

use App\Models\Shop\Shopper;

// this class retrun static method for useful tasks provided in the template

class ShopFacade {

    private $shopper;

    public function __construct( Shopper $shopper ) {

        $this->shopper = $shopper;
    }

    

    public function getShopper() {
        return $this->shopper;
    }

   

    /**
     * setDiscount() - set discount in shopper object
     *
     * @param  null
     * @return $this
     */
    public function initDiscount() {

        if (!$this->shopper->getDiscount()) {

            // set the discount based on No coupon
            $factory = new \App\Models\Coupon\CouponFactory(new \App\Models\Coupon\NoCoupon\NoCouponType);

            // get a coupon object
            $coupon = $factory->createCoupon();

            // set the discount type
            $coupon->setDiscountType(new \App\Models\Discount\ProductDiscount());

            // get the discount
            $discount = $coupon->getDiscount();
            $this->shopper->setDiscount($discount);
        }

        // return the shopper
        return $this;
    }

   

    /**
     * resetShopper - unset the cart in the shopper object
     *
     * @param  null
     * @return null
     */
    public function resetShopper() {

        // unset the cart
        $shopper = new Shopper();
        $shopper->setCouponCode($this->shopper->getCouponCode());
        $shopper->setDeliveryAreas($this->shopper->getDeliveryAreas());
        $shopper->setDeliveryAreasComplete($this->shopper->getDeliveryAreasComplete());
        $shopper->setDeliveryArea($this->shopper->getDeliveryArea());
        $shopper->setCategories($this->shopper->getCategories());

        // unset the shopper
        $this->shopper = null;

        // assign the shopper
        $this->shopper = $shopper;

        // return the shopper
        return $this;
    }

}
