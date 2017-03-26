@extends('layout')

@section('content')
<?php $discount = $shopper->getDiscount(); ?>
<?php $product = $shopper->getProduct(); ?>
<?php $coupon = $shopper->getCouponCode(); ?> 


<!-- about section -->
<section id="thai-rattan-must-have" class="about section">           


    <div class="container">
        
        
       


        <img src="{{ asset('../../thairattan2') }}/assets/products/{{ $product->big_image }}" class="img-responsive" alt="Natura Rattan {{ $product->big_image }}">


        <div class="row">

            <div class="col-sm-6 text-left" style="padding-left:30px;">  

                <br>
                
                 @if($product->has_rattan == 1)

                <h3>Rattan colors</h3>
                <p>8 rattan colors acrilyc varnish. Natural ( not painted )</p>
                <br>



                <table class="finish-table" border="0">
                    <tr>
                        <td>
                            <span style="margin-left:5px;">White Old</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '1';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/white-old.jpg" alt="Rattan color finishing White Old"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Grey Light</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '2';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/grey-light.jpg" alt="Rattan color finishing Grey Light"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Natural</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '3';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/natural.jpg" alt="Rattan color finishing Natural"></a>
                        </td>
                    </tr><tr>
                        <td>
                            <span style="margin-left:5px;">Honey</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '4';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/honey.jpg" alt="Rattan color finishing Honey"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">black washed</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '5';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/black-washed.jpg" alt="Rattan color finishing Black Washed"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Caramel</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '6';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/caramel.jpg" alt="Rattan color finishing Caramel"></a>
                        </td>

                    </tr><tr>
                        <td>
                            <span style="margin-left:5px;">Brown Old</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '7';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/brown-old.jpg" alt="Rattan color finishing Brown Old"></a><br>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Grey Old</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '8';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/grey-old.jpg" alt="Rattan color finishing Grey Old"></a><br>

                        </td>
                        <td>
                            <span style="margin-left:5px;">Black</span>
                            <a href="javascript:void(0);" onclick="getElementById('rattan-color').selectedIndex = '9';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/black.jpg" alt="Rattan color finishing Black"></a><br>

                        </td>

                    </tr>
                </table>

                <br>

                Not sure about colors? <a href="{{ route("color-tester") }}" target="_blank">Try our color tester!</a>

                @endif
                @if($product->has_fabric == 1)
                
                <br><br><br>

                <h3>Fabric colors</h3>
                <p>Best quality sponge ( high density ), best comfort. 100% cotton or waterproof on request. ( waterproof available on few colors ) </p>
                <br>


                <table class="finish-table">
                    <tr>

                        <td>                                  
                            <span style="margin-left:5px;">White</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '1';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-01-white.jpg" alt="Cushions color finishing White for Rattan furnitures"></a>
                        </td>

                        <td>
                            <span style="margin-left:5px;">Ecru</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '2';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-04-ecru.jpg" alt="Cushions color finishing Ecru for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Grey Light</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '3';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-05-grey-light.jpg" alt="Cushions color finishing Grey Light for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Walnut Old</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '4';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-07-walnut-old.jpg" alt="Cushions color finishing Walnut Old for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Walnut Dark</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '5';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-10-walnut-dark.jpg" alt="Cushions color finishing Walnut Dark for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Yellow Light</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '6';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-11-yellow-light.jpg" alt="Cushions color finishing Yellow Light for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Yellow Sun</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '7';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-12-yellow-sun.jpg" alt="Cushions color finishing Yellow Sun for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Green Light</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '8';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-14-green-light.jpg" alt="Cushions color finishing Green Light for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Orange Light</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '9';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-16-orange-light.jpg" alt="Cushions color finishing Orange Light for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Amaranth</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '10';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-19-amaranth.jpg" alt="Cushions color finishing Amaranth for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Blue Light</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '11';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-21-blue-light.jpg" alt="Cushions color finishing Blue Light for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Blue Dark</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '12';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-22-blue-dark.jpg" alt="Cushions color finishing Blue Dark for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Grey</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '13';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-23-grey.jpg" alt="Cushions color finishing Grey for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Black</span>
                            <a href="javascript:void(0);" onclick="getElementById('fabric-color').selectedIndex = '14';">
                                <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-24-black.jpg" alt="Cushions color finishing Black for Rattan furnitures"></a>
                        </td>

                    </tr>

                </table>

                <br><br>

                Not sure about colors? <a href="{{ route("color-tester") }}" target="_blank">Try our color tester!</a>

                @endif

            </div>

            <div class="col-sm-6 text-left">

                <h1 class="h2 space-bottom-half">{{ $product->name }}</h1>
                <p>
                    {{ $product->description }}                        
                </p>

                <div class="row">
                    <div class="col-sm-12 text-left">
                        <span class="pull-left"> <img src="{{ asset('../../thairattan2') }}/assets/products/{{ $product->small_image }}" style="max-height:100px;" alt=""> </span>
                    </div>
                </div>

                <p>
                    <b>W.</b> {{ $product->width }} <br>
                    <b>D.</b> {{ $product->depth }}<br>
                    <b>H.</b> {{ $product->height }}<br>
                </p>

                <hr/>
                Regular Price:
                <div class="catalogue-price-discount" style="text-align:left;">&#3647; {{ Helper::formatCurrency($product->price) }}</div>

                Subscriber Price:
                <div class="catalogue-price" style="text-align:left;">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($product->price,$discount)) }}</div>

                <br>

                {{ Form::open(array('url' => '/cart','novalidate'=>'true')) }}

                <div class="labelbuy">Enter your coupon code!</b><br>


                    
                    @if (!$coupon)

                    <a href="#getcoupon">( I don't have a coupon code )</a>

                    @endif


                </div>







                {{ Form::hidden('lang','en') }}

                {{ Form::hidden('product', $product->slug ) }}

                {{ Form::text('couponcode', $coupon ,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;max-width:280px;',
                                                    'id' => 'couponcode',
                                                    'placeholder' => $coupon
                                              ))
                }}
                {!! $errors->first('couponcode', '<p class="error-block">:message</p>') !!}
                {!! $errors->first('coupon', '<p class="error-block">:message</p>') !!}

                 @if($product->has_rattan == 1)
                

                {{ Form::label('rc', 'Select your Rattan color', array('class' => 'labelbuy')) }}
                {{ Form::select('rc',
                                        array(
                                              '' => '',
                                              'white-old' => 'White Old',
                                              'grey-light' => 'Grey Light',
                                              'natural' => 'Natural',
                                              'honey' => 'Honey',
                                              'black-washed' => 'Black Washed',
                                              'caramel' => 'Caramel',
                                              'brown-old' => 'Brown Old',
                                              'grey-old' => 'Grey Old',
                                              'black' => 'Black'
                                              ),
                                              '',
                                              array(
                                                    'id' => 'rattan-color',
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;max-width:280px;'
                                              )
                                        )
                }}
                {!! $errors->first('rc', '<p class="error-block">:message</p>') !!}

                 @endif

                 @if($product->has_fabric == 1)


                {{ Form::label('fc', 'Select your Fabric color', array('class' => 'labelbuy')) }}
                {{ Form::select('fc', 
                                        array(
                                              '' => '',
                                              'cv-01-01-white' => 'White',
                                              'cv-01-04-ecru' => 'Ecru',
                                              'cv-01-05-grey-light' => 'Grey Light',
                                              'cv-01-07-walnut-old' => 'Walnut Old',
                                              'cv-01-10-walnut-dark' => 'Walnut Dark',
                                              'cv-01-11-yellow-light' => 'Yellow Light',
                                              'cv-01-12-yellow-sun' => 'Yellow Sun',
                                              'cv-01-14-green-light' => 'Green Light',
                                              'cv-01-16-orange-light' => 'Orange Light',
                                              'cv-01-19-amaranth' => 'Amaranth',
                                              'cv-01-21-blue-light' => 'Blue Light',
                                              'cv-01-22-blue-dark' => 'Blue Dark',
                                              'cv-01-23-grey' => 'Grey',
                                              'cv-01-24-black' => 'Black',
                                              ),
                                              '',
                                              array(
                                                    'id' => 'fabric-color',
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;max-width:280px;'
                                              )
                                        )
                }}
                {!! $errors->first('fc', '<p class="error-block">:message</p>') !!}


                @endif

                {{ Form::label('qty', 'Quantity', array('class' => 'labelbuy')) }}
                {{ Form::select('qty', 
                                        array(
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
                                              '1',
                                              array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;max-width:280px;'
                                              )
                                        )
                }}
                {!! $errors->first('qty', '<p class="error-block">:message</p>') !!}


                {{ Form::submit('+ Add to shopping cart', array('class' => 'btn btn-lg btn-info')) }}

                <br><br>
                <p>

                    {{ $product->additional }}
                </p><br>

                {{ Form::close() }}


            </div>

            <div class="col-sm-12 text-left">          

                <br><br><hr/>

            </div>

            <div class="col-sm-12 text-left">

                <div class="row">

                    <div class="col-md-4 text-left">



                        <h4>Need support? Call</h4>
                        <p class="text-sm">
                            +66 098 797 4129<br>
                            Line Id: thairattan-th<br>
                        </p>

                    </div>
                    <div class="col-md-4 text-left">



                        <a name="getcoupon"></a><h4>Special price. Get a 30% Off Coupon Now!</h4>
                        <p class="text-sm">You will receive the coupon via email. 30% discount for the first order
                            and 20% discount as a subscriber for all subsequent orders.</p>
                        <a class="btn btn-lg btn-info" href="{{ asset('../../thairattan2') }}/en/subscribe.html">Get your Coupon Now!</a><br><br>

                    </div>
                    <div class="col-md-4 text-left">



                        <h4>Payment</h4>
                        <p class="text-sm">
                            We accept payments via bank transfer. We provide payment details after placing your order. <br>

                        </p>

                    </div>
                </div> 
            </div> 
            
              <!--  include categories /-->
            @include('common/categories')
            
        </div>

        </div> 
    </div><!-- .shop-item -->
</div><!-- .col-lg-3.col-sm-6 -->

</section><!-- .container -->


@stop

