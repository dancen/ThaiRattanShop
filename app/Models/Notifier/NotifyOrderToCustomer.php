<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace App\Models\Notifier;
use App\Models\Notifier\Notifier;
use App\Models\Notifier\NotifyOrderInterface;

/**
 * Description of NotifyOrderToCustomer
 *
 * @author dan
 */
class NotifyOrderToCustomer extends Notifier implements NotifyOrderInterface {

    private $address;
    private $to;
    private $subject;
    private $headers;
    private $message;
    private $order;
    private $language;
    private $helper;
    private $discount;
    private $cart;
    private $delivery_area;
    private $delivery_cost;
    private $coupon;

    public function setLanguage( $language ) {
        $this->language = $language;
    }

    public function __construct( $address = null ) {
        $this->address = $address;
    }

    public function setTo($to) {
        $this->to = $to;
    }
    
    public function getTo() {
        return $this->to;
    }

    public function setSubject( $subject ) {
        $this->subject = $subject;
    }
    
    public function getSubject() {
        return $this->subject;
    }
    
    public function getMessage() {
        return $this->message;
    }
    
    public function getHeaders() {
        return $this->headers;
    }

    public function setOrder( $order ) {
        $this->order = $order;
    }
    
    public function setHelper( $helper ) {
        $this->helper = $helper;
    }
    
    public function setDiscount( $discount ) {
        $this->discount = $discount;
    }
    
    public function setCart( $cart ) {
        $this->cart = $cart;
    }
    
    public function setDeliveryArea( $delivery_area ) {
        $this->delivery_area = $delivery_area;
    }
    
    public function setDeliveryCost( $delivery_cost ) {
        $this->delivery_cost = $delivery_cost;
    }
    
    public function setCoupon( $coupon ) {
        $this->coupon = $coupon;
    }

    public function buildHeader() {

        $headers = "From: Thai Rattan <info@thairattan.com> \r\n";
        $headers .= "Reply-To: " . strip_tags('info@thairattan.com') . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        $this->headers = $headers;
    }

    public function buildBody( $helper ) {

        $message = "<html><body><br>";
        $message .= "<div style='font-family: Arial;font-size:14px;padding-top:20px;padding-left:20px;max-width:800px;'>";
        $message .= "<span style='font-size:18px;font-weight:bold;margin-top:30px;'>Thank You ".$this->order->first_name."!</span><br><br>";
        $message .= "Your order number is: <b>" . $this->coupon . "-" . $this->order->id . "</b>. Order placed with Coupon code: <b>" . $this->coupon . "</b> - " . $this->discount . "%<br>";
        $message .= "We received your order and we will contact you as soon as possible to confirm products and colors chosen.";

        // build the address section
        $address = $this->buildAddress();
        $message .= $address;

        // build the cart section
        $cartbody = $this->buildCart( $helper );
        $message .= $cartbody;

        // build the total amount section
        $total = $this->buildTotal( $helper );
        $message .= $total;

        $message .= "<p>We received your order and we will contact you as soon as possible<br> in order to confirm products and colors chosen and for payment info.</p><br>";
        $message .= "<table style='border:none;'>";
        $message .= "<tr>";
        $message .= "<td style='border-right:3px solid #8B6914;padding:20px;padding-left:0px;'>";
        $message .= "<img style='width:300px;' src='http://www.thairattan.com/assets/logo_black2.png'>";
        $message .= "</td>";
        $message .= "<td style='vertical-align: top;padding:20px;color:#555;'>";
        $message .= "<b>Thai Rattan Team</b><br>";
        $message .= "+66 098 797 4129<br>";
        $message .= "Line Id: thairattan-th    ";
        $message .= "<hr style='color:#8B6914;'/><br>";
        $message .= "<b>Visit by appointment only</b><br>";
        $message .= "VENICE DI IRIS Shopping Plaza<br>1/242 Watcharaphon Road<br>Khwaeng Tha Raeng, Khet Bang Khen<br>Bangkok 10220<br>THAILAND<br><br>";
        $message .= "<a href='http://www.thairattan.com' style='color:#8B6914;font-weight:bold;' target='_blank'>http://www.thairattan.com</a><br>";
        $message .= "</td>";
        $message .= "</tr>";
        $message .= "</table>";
        $message .= "</div>";
        $message .= "</body></html>";
        $this->message .= wordwrap($message,70);
    }   

    private function buildCart( $helper ) {

        $message = "<br><br><h1>Order Details</h1><br>";

        foreach ( $this->cart->getCollection() as $item) {

            $message .= "<table style='border:none;width:100%;max-width:800px;'>";
            $message .= "<tr>";
            $message .= "<td>";
            $message .= "<h3>" . $item->name . "</h3>      ";
            $message .= "</td>";
            $message .= "</tr> ";
            $message .= "<tr><td style='max-width:800px;padding-bottom:20px;'>";
            $message .= "<br><span class='pull-left'> " . $item->description . " </span></br></br>";
            $message .= "</td>";
            $message .= "</tr>";
            $message .= "<tr><td><table style='border:none;max-width:800px;'>";
            $message .= "<tr><td style='min-width:200px;'>";
            $message .= "<span class='pull-left'> <img src='http://www.thairattan.com/assets/products/" . $item->small_image . "' style='margin:0px;padding:0px;max-height:100px;' alt=''> </span><br>";
            $message .= " <b>W.</b> " . $item->width . "<br>";
            $message .= "  <b>D.</b> " . $item->depth . "<br>";
            $message .= " <b>H.</b> " . $item->height . "<br><br>";
            $message .= " </td>";
            $message .= " <td style='min-width:200px;'>";
            $message .= "   Regular Price:<br>";
            $message .= " <div style='text-align:left;font-size:18px;text-decoration:line-through'>&#3647; " . $helper::formatCurrency( $item->price ) . "</div><br>";
            $message .= "  Subscriber Price:<br>";
            $message .= " <div style='text-align:left;font-size:20px;text-decoration:none'>&#3647; " . $helper::formatCurrency( $helper::calculateDiscount( $item->price, $this->discount )) . "</div><br>";
            $message .= " Quantity: " . $item->getQuantity() . "";
            $message .= "</td>";
            $message .= "<td style='min-width:200px;'>";
            if ($item->has_rattan == 1) {
                $message .= "<b>rattan color:</b><br><br> " . $item->getRattanColor() . "<br>";
                $message .= "<img src='http://www.thairattan.com/assets/" . $item->getRattanColor() . ".jpg' style='margin:5px;width:100px;height:60px;'><br>";
            }
            $message .= "</td><!--.row -->";
            $message .= "<td style='min-width:200px;'>";
            if ($item->has_fabric == 1) {
                $message .= "<b>Fabric color:</b><br><br>" . $helper::normalizeFabricName( $item->getFabricColor() ) . "<br>";
                $message .= "<img src='http://www.thairattan.com/assets/fabrics/fabric-cotton-" . $item->getFabricColor() . ".jpg' style='margin:5px;width:100px;height:60px;' alt='Item'><br>";
            }
            $message .= "</td>";
            $message .= "</tr></table>";
            $message .= " <br><hr style='max-width:800px;border-color:#ccc;'/>";
            $message .= "</td>";
            $message .= "</tr></table>";
            $message .= " <br><br></td></tr>";
            $message .= " </table>";
        }

       return $message;
    }

    private function buildTotal( $helper ) {
        $message = "<h1>Total Cart</h1>";
        $message .= "<p style='text-align:left;font-size:18px;text-decoration:none'>Cart Total: &#3647; " . $helper::formatCurrency( $helper::calculateDiscount( $this->cart->getAmount(), $this->discount) ) . "<br>";
        $message .= "Delivery Area: <b>" . $this->delivery_area . "</b><br>";
        $message .= "Shipping cost: &#3647; " . $helper::formatCurrency( $this->delivery_cost ) . "</p>";
        $message .= "<h1>Grand total</h1>";
        $message .= "<div style='text-align:left;font-size:20px;text-decoration:none;' id='cart-total'>&#3647; " . $helper::formatCurrency( $helper::sum( $helper::calculateDiscount( $this->cart->getAmount(), $this->discount), $this->delivery_cost)) . "</div>";
        return $message;
    }

    private function buildAddress() {
        $message = "<br><br><h2>Delivery Info</h2>";
        $message .= "<span style='text-align:left;font-size:14px;text-decoration:none'>";
        $message .= "First Name: <b>" . $this->order->first_name . "</b><br>";
        $message .= "Last Name: <b>" . $this->order->last_name . "</b><br>";
        $message .= "Email: <b>" . $this->order->email . "</b><br>";
        $message .= "Phone: <b>" . $this->order->phone . "</b><br>";
        $message .= "Address: <b>" . $this->order->address . "</b><br>";
        $message .= "City: <b>" . $this->order->city . "</b><br>";
        $message .= "Country: <b>" . $this->order->country . "</b><br>";
        $message .= "Postal Code: <b>" . $this->order->zip . "</b><br>";
        $message .= "Delivery Area: <b>" . $this->order->delivery_area . "</b><br>";
        $message .= "</span>";
        $message .= "<h2>Instruction</h2>";
        $message .= $this->order->instruction . "<br>";
        return $message;
    }
    
   
}

