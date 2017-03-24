@extends('layout')

@section('content')

<?php $delivery_area = $shopper->getDeliveryArea(); ?>
<?php $delivery_cost = $shopper->getDeliveryCost(); ?>
<?php $email = $shopper->getEmail(); ?>
<?php $discount = $shopper->getDiscount(); ?>
<?php $coupon = $shopper->getCouponCode(); ?>
<?php $cart = $shopper->getCart(); ?>
<?php $order = $shopper->getLastOrder(); ?>

<!-- about section -->
<section id="thai-rattan-shopping-cart" class="about section">
    <div class="container">        

       
        <h1 class="h2 space-bottom-half">Checkout</h1>
        <p> You have <span class="items-number">{{ $cart->getNumOfItems() }}</span> items in your shopping cart.</p>
        <br><br>        

        <hr style="border-bottom:1px solid #ccc;"/>

        <div class="row">
            <div class="col-sm-12 text-left">

                <br><br>

                {{ Form::open(array('url' => '/cart-pay', 'method'=>'POST', 'novalidate'=>'true', 'class'=>'container padding-top-3x padding-bottom-2x')) }}
                <!-- Container -->
                
                {{ Form::hidden('checkout_type', "DEFAULT" ) }}
                {{ Form::hidden('co_province', $delivery_area ) }}
                {{ Form::hidden('shipping_cost', $delivery_cost ) }}
                {{ Form::hidden('total_amount', Helper::calculateDiscount($cart->getAmount(),$discount) ) }}
               
                <a name="checkout"></a>
                
                <div class="row padding-top">

                    <!-- Checkout Form -->
                    <div class="col-sm-8 padding-bottom">
                        <div class="row">
                            <div class="col-sm-6">
                                {{ Form::label('First Name') }}
                                {{ Form::text('co_f_name',$order->first_name,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_f_name',
                                                    'placeholder' => 'First name',
                                                    'type' => 'text'
                                              ))
                                }}
                                {!! $errors->first('co_f_name', '<p class="error-block">The First Name field is required</p>') !!}

                                {{ Form::label('Email') }}
                                {{ Form::text('co_email',$email,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_email',
                                                    'placeholder' => 'Email',
                                                    'disabled' => true,
                                                    'type' => 'email'
                                              ))
                                }}
                                {!! $errors->first('co_email', '<p class="error-block">The Email field is required</p>') !!}

                            </div>
                            <div class="col-sm-6">

                                {{ Form::label('Last Name') }}
                                {{ Form::text('co_l_name',$order->last_name,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_l_name',
                                                    'placeholder' => 'Last name',
                                                    'type' => 'text'
                                              ))
                                }}
                                {!! $errors->first('co_l_name', '<p class="error-block">The Last Name field is required</p>') !!}

                                {{ Form::label('Phone') }}
                                {{ Form::text('co_phone',$order->phone,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_phone',
                                                    'placeholder' => 'Phone',
                                                    'type' => 'tel'
                                              ))
                                }}
                                {!! $errors->first('co_phone', '<p class="error-block">The Phone field is required</p>') !!}


                            </div>                                        
                        </div><!-- .row -->

                        {{ Form::label('Address') }}
                        {{ Form::text('co_address1',$order->address,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_address1',
                                                    'placeholder' => 'Address',
                                                    'type' => 'text'
                                              ))
                        }}
                        {!! $errors->first('co_address1', '<p class="error-block">The Address field is required</p>') !!}

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-element form-select">

                                   
                                </div>
                                <div class="form-element form-select">
                                   
                                    {{ Form::label('City') }}
                                    {{ Form::text('co_city',$order->city,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_phone',
                                                    'placeholder' => 'City',
                                                    'type' => 'text'
                                              ))
                                    }}
                                    {!! $errors->first('co_city', '<p class="error-block">The City field is required</p>') !!}

                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-element form-select">

                                   


                                </div>

                                {{ Form::label('Postal code') }}
                                {{ Form::text('co_zip',$order->zip,
                                        array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_zip',
                                                    'placeholder' => 'ZIP code',
                                                    'type' => 'text'
                                              ))
                                }}
                                {!! $errors->first('co_zip', '<p class="error-block">The ZIP code field is required</p>') !!}
                            </div>
                        </div><!-- .row -->
                        <p class="text-sm text-gray"> <b>Special Instruction:</b> ( in case you have specific needs about dimensions, or about the delivery location, please let us know. we will call you for confirmation of specs. )</p>

                        {{ Form::label('Instruction') }}
                        {{ Form::textarea('co_instruction',$order->instruction, array(
                                                    'class' => 'form-control input-lg',
                                                    'style' => 'border: 1px solid #ccc;',
                                                    'id' => 'co_instruction',
                                                    'placeholder' => 'Instruction',
                                                    'rows' => '6',
                                                    'type' => 'text'
                                              ))
                        }}


                    </div><!-- .col-sm-8 -->

                    <!-- Sidebar -->
                    <div class="col-md-4">
                        <aside>

                            <h3>Grand total:</h3>
                            <p>Cart Total: &#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($cart->getAmount(),$discount)) }}</p>
                            <p>Delivery Area: <b>{{ $delivery_area }}</b><br> 
                            <p>Shipping cost: &#3647; {{ Helper::formatCurrency($delivery_cost) }}</p>
                            <div class="catalogue-price" style="text-align:left;" id="cart-total">&#3647; {{ Helper::formatCurrency( Helper::sum( Helper::calculateDiscount($cart->getAmount(),$discount) , $delivery_cost ) ) }}</div>

                            <br>
                            <p class="text-sm text-gray">* Note: This amount includes costs for shipping to address you provided.</p>

                            <a href="./cart-show" class="btn btn-default btn-lg btn-block">Back to Shopping Cart</a><br>


                            {{ Form::submit('Order Now!', array('class' => 'btn btn-info btn-lg btn-block')) }}

                            <br> As soon as your order will be received we will contact you for confirmation, checking of chosen products and payment details.
                            
                            
<!--                            <br> We support one of the following on-line payment methods. You can also pay off-line via bank transfer. <br>
                            <img src="{{ asset('../..') }}/assets/cards.png" style="max-width:280px;" alt="Cards">-->
                        </aside>
                    </div><!-- .col-md-3.col-sm-4 -->
                </div><!-- .row -->

                {{ Form::close() }}

            </div><!-- .row -->
           
            <!--  include categories /-->
            @include('common/categories')
            
            
        </div><!-- .row -->


      


    </div><!-- .row -->
</section><!-- .container -->


@stop

