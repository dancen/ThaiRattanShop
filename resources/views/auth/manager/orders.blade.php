@extends('layouts.app')

@section('content')


<!-- about section -->
<section id="thai-rattan-login" class="about section">    

    <div class="container">

        <h1 class="h2 space-bottom-half">Order Manager</h1>
        <br><br><br>

        <div class="row">
            <div class="col-sm-12">

                @foreach( $orders as $order )

                <div>
                    <div class="row" style="margin-bottom: 80px;">
                        <div class="col-sm-12 text-left">



                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-3 text-left" style="font-size:30px;color:#009998;">
                                    <b>Order Id:</b> {{ $order->id }}<br><br>
                                </div>
                                <div class="col-sm-9 text-left" style="font-size:30px;color:#009998;">
                                    <p style="font-size:16px;">Every piece is unique and we can make any change in dimensions in order to suit your needs. Any change must be requested before the order takes the state (PRODUCTION). Changes in production can not be carried out. 
                                        We produce on order and we deliver normally in 20 days. The shipping service is free in Bangkok area. If you want to ask for more informations related to the order please <a href="#contact-us">contact us</a>.<br><br>
                                    </p>
                                </div>
                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-2 text-left">
                                    <b>Order Status:</b><br> 

                                    @if ( $order->payment_code != "" )   

                                    <span style="color:#009998;">PRODUCTION</span><br><br>

                                    @else

                                    <span style="color:#009998;"> WAITING FOR PAYMENT</span><br><br>

                                    @endif
                                </div>
                                <div class="col-sm-4 text-left">
                                    <b>Email:</b><br> {{ $order->email }}<br><br>
                                </div>

                                <div class="col-sm-2 text-left">
                                    <b>First Name:</b><br> {{ $order->first_name }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Last Name:</b><br> {{ $order->last_name }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Phone:</b><br> {{ $order->phone }}<br><br>
                                </div>                                
                            </div>
                            <div class="row">
                                <div class="col-sm-12 text-left">

                                    @foreach( Helper::findPurchaseByOrderId($order->id) as $purchase )
                                    <?php $product = unserialize($purchase->product); ?>
                                    <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                        <div class="col-sm-4">
                                            <center> <img src='{{ asset('../../thairattan2') }}/assets/products/{{ $product->small_image }}' style='margin:0px;padding:0px;max-height:100px;' alt=''> </center><br>
                                        </div>                                
                                        <div class="col-sm-2 text-left">
                                            <h3>{{ $product->name }}</h3>
                                            <b>W.</b> {{ $product->width }}<br>
                                            <b>D.</b> {{ $product->depth }}<br>
                                            <b>H.</b> {{ $product->height }}<br>
                                            <h5>Quantity: <span style="color:#009998;font-size:20px;"> {{ $purchase->quantity }}</span></h5>
                                        </div>
                                        <div class="col-sm-2 text-left">
                                            Regular Price:<br>
                                            <div class="catalogue-price-discount" style="text-align:left;">&#3647; {{ Helper::formatCurrency($product->price) }}</div>                                

                                            Subscriber Price:<br>
                                            <div class="catalogue-price" style="text-align:left;" id="cart-subtotal">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($product->price, $purchase->discount )) }}</div>

                                        </div>
                                        <div class="col-sm-2 text-left">

                                            @if($product->has_rattan == 1)   

                                            <b>rattan color:</b><br><br> {{ $purchase->rattan_color }}<br>
                                            <img src="{{ asset('../../thairattan2') }}/assets/{{ $purchase->rattan_color }}.jpg" style="margin:5px;width:80px;height:50px;"><br>

                                            @endif

                                        </div>
                                        <div class="col-sm-2 text-left">

                                            @if($product->has_fabric == 1) 

                                            <b>Fabric color:</b><br><br> {{  Helper::normalizeFabricName( $purchase->fabric_color ) }}<br>
                                            <img src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-{{ $purchase->fabric_color }}.jpg" style="margin:5px;width:80px;height:50px;"><br>

                                            @endif

                                        </div>
                                    </div>

                                    @endforeach  
                                </div>
                            </div>
                            <br>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">                                
                                <div class="col-sm-2 text-left">
                                    <b>Address:</b><br> {{ $order->address }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Country:</b><br> {{ $order->country }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>City:</b><br> {{ $order->city }}<br><br>
                                </div>                            
                                <div class="col-sm-2 text-left">
                                    <b>Province:</b><br> {{ $order->province }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Potal Code:</b><br> {{ $order->zip }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Delivery Area:</b><br> {{ $order->delivery_area }}<br><br>
                                </div>                                
                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-2 text-left">
                                    <b>Coupon:</b><br> {{ $purchase->coupon }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Delivery Cost:</b><br>&#3647; {{ Helper::formatCurrency(  $order->shipping_cost ) }}<br><br>
                                </div>                          
                                <div class="col-sm-4 text-left">
                                    <b>Created:</b><br>  {{ \Carbon\Carbon::instance($order->created_at)->formatLocalized('%A %d %B %Y')   }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Total Amount:</b>
                                    <div class="catalogue-price" style="text-align:left;" id="cart-subtotal">&#3647; {{ Helper::formatCurrency(  $order->total_amount ) }}</div>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Payment Code:</b><br> {{ $order->payment_code }}<br><br>
                                </div> 

                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-12 text-left">
                                    <b>Instruction:</b><br> {{ $order->Instruction }} Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. <br><br>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                @endforeach  

            </div><!-- .row -->



        </div><!-- .row -->

    </div><!-- .row -->
</section><!-- .container -->




@endsection
