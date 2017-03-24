@extends('layout')

@section('content')

<?php $delivery_area = Session::get('delivery_area'); ?>
<?php $delivery_cost = Session::get('delivery_cost'); ?>
<?php $discount = Session::get('discount'); ?>
<?php $coupon = Session::get('coupon'); ?>
<?php $cart = Session::get('cart'); ?>
<?php $areas = Session::get('delivery_areas'); ?>


<!-- about section -->
<section id="thai-rattan-shopping-cart" class="about section">
    <div class="container">


        @if($cart != null && count($cart->getCollection()) > 0)



        <h1 class="h2 space-bottom-half">Shopping Cart</h1>
        <p> You have <span class="items-number">{{ $cart->getNumOfItems() }}</span> items in your shopping cart.</p>
        <br><br>

        <div class="row">
            <div class="col-sm-8" style="border-right:1px solid #ddd;padding-right:20px;">

                @foreach($cart->getCollection() as $item)

                <div class="item">

                    <div class="row">
                        <div class="col-sm-12 text-left">
                            <h3>{{ $item->name }}</h3>

                            {{ Form::open(array('url' => '/cart-remove','method'=>'POST', 'id' => 'form-cart-remove-'.$item->getCartIndex())) }}
                            <input type="hidden" name="item_id" id="item_id" value="{{ $item->getCartIndex() }}">
                            {{ $item->subcategory }} - <a href="javascript:void(0);" onclick="$('#form-cart-remove-<?php echo $item->getCartIndex(); ?>').submit();">Remove from cart</a>
                            {{ Form::close() }}



                            <a href="">
                                <img src="{{ asset('../..') }}/assets/products/{{ $item->big_image }}" class="img-responsive" alt="Item">
                            </a>
                        </div>
                    </div>
                    
                    <div class="row">   
                        <div class="col-sm-12 text-left">
                            <span class="pull-left"> {{ $item->description }} </span>
                        </div>
                    </div>
                    <br>
                    <div class="row"> 
                        <div class="col-sm-4 text-left">   

                            <div class="row" style="margin-bottom: 10px;">
                                <div class="col-sm-12 text-left">
                                    <span class="pull-left"> <img src="{{ asset('../..') }}/assets/products/{{ $item->small_image }}" style="margin:0px;padding:0px;max-height:80px;" alt=""> </span>
                                </div>

                            </div>                            

                            <b>W.</b> {{ $item->width }}<br>
                            <b>D.</b> {{ $item->depth }}<br>
                            <b>H.</b> {{ $item->height }}<br><br>



                        </div>


                        <div class="col-sm-4 text-left">
                            Regular Price:<br>
                            <div class="catalogue-price-discount" style="text-align:left;font-size:20px;">&#3647; {{ Helper::formatCurrency($item->price) }}</div>                                

                            Subscriber Price:<br>
                            <div class="catalogue-price" style="text-align:left;" id="cart-subtotal">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($item->price, $discount)) }}</div>


                            {{ Form::open(array('url' => '/cart-update','method'=>'POST', 'id' => 'form-cart-update-'.$item->getCartIndex())) }}
                            <input type="hidden" name="item_id" id="item_id" value="{{ $item->getCartIndex() }}">
                            <?php $js = "$('#form-cart-update-" . $item->getCartIndex() . "').submit();"; ?>
                            {{ Form::select('qty', 
                                        array(
                                              $item->getQuantity() => $item->getQuantity(),
                                              '1' => '1',
                                              '2' => '2',
                                              '3' => '3',
                                              '4' => '4',
                                              '5' => '5',
                                              '6' => '6',
                                              '7' => '7',
                                              '8' => '8',
                                              '9' => '9',
                                              '10' => '10',
                                              ),
                                              $item->getQuantity(),
                                              array(
                                                    'class' => 'form-control',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'onchange' => $js
                                              )
                                        )
                            }}
                            {{ Form::close() }}


                        </div>


                        <div class="col-sm-2 text-left">
                            
                            @if($item->has_rattan == 1)  

                            <b>rattan color:</b><br><br> {{ $item->getRattanColor() }}<br>
                            <img src="{{ asset('../..') }}/assets/{{ $item->getRattanColor() }}.jpg" style="margin:5px;width:100px;height:60px;"><br>

                             @endif
                             
                        </div><!-- .row -->

                        <div class="col-sm-2 text-left">
                            
                             @if($item->has_fabric == 1) 

                            <b>Fabric color:</b><br><br> {{  Helper::normalizeFabricName( $item->getFabricColor() ) }}<br>
                            <img src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-{{ $item->getFabricColor() }}.jpg" style="margin:5px;width:100px;height:60px;" alt="Item"><br>

                             @endif
                             
                        </div><!-- .row -->


                    </div>

                </div><!-- .row -->

                @endforeach               

            </div><!-- .row -->

            <div class="col-sm-4 text-left">

                <aside>
                    <h3 class="toolbar-title">Cart subtotal:</h3>
                    <p>Coupon code: {{ $coupon }}</p>                    
                    <div class="catalogue-price-discount" style="text-align:left;" id="cart-subtotal">&#3647; {{ Helper::formatCurrency($cart->getAmount()) }}</div>
                    <div class="catalogue-price" style="text-align:left;" id="cart-subtotal">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($cart->getAmount(),$discount)) }}</div>
                    <p class="text-sm text-gray">* Note: This amount does not include costs for shipping. You will be able to calculate shipping costs after selecting your delivery area.</p>
                    <br><br>

                    <h3 class="toolbar-title">Shipping:</h3>
                    <p>The shipping service is free in Bangkok area. We can ship in all thailand ( islands included ). 
                        Please, select the devivery area to calculate the shipping cost.<br><br>

                        {{ Form::open(array('url' => '/cart-delivery','method'=>'POST', 'id' => 'form-cart-calculate-shipping')) }}
                        <?php $cd = "$('#form-cart-calculate-shipping').submit();"; ?>
                        {{ Form::select('co_province',
                                        $areas,
                                        null,
                                              array(
                                                    'id' => 'co_province',
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'placeholder' => $delivery_area,
                                                    'onchange' => $cd
                                              )
                                        )
                        }}

                        {{ Form::close() }}


                    <h3>Grand total:</h3>
                    <p>Cart Total: &#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($cart->getAmount(),$discount)) }}</p>
                    <p>Delivery Area: <b>{{ $delivery_area }}</b> <br>
                    <p>Shipping cost: &#3647; {{ Helper::formatCurrency($delivery_cost) }}</p>
                    <div class="catalogue-price" style="text-align:left;" id="cart-total">&#3647; {{ Helper::formatCurrency( Helper::sum( Helper::calculateDiscount($cart->getAmount(), $discount) , $delivery_cost ) ) }}</div>

                    <a href="./index" class="btn btn-default btn-lg btn-block">Continue Shopping</a><br>

                    {{ Form::open(array('url' => '/cart-checkout','method'=>'GET')) }}

                    {{ Form::submit('Checkout', array('class' => 'btn btn-info btn-lg btn-block')) }}

                    {{ Form::close() }}

                </aside>

                <br><br>



            </div><!-- .row -->
        </div><!-- .row -->

    </div><!-- .row -->


    @else

    <br><br>

    <h1 class="h2 space-bottom-half">Shopping Cart</h1>
    <p>Your shopping cart is Empty!</p><br>
    <a class="btn-info btn-lg" href="{{ route("index") }}" style="max-width:280px;">Return to the shop</a><br>

    <img class="img-responsive" src="{{ asset('../..') }}/assets/empty-cart-rattan.png">



    @endif


    </div><!-- .row -->
</section><!-- .container -->


@stop

