@extends('layout')

@section('content')
<?php $discount = $shopper->getDiscount(); ?>

<!-- about section -->
<section id="thai-rattan-must-have" class="about section">           


    <div class="container">



        <h1 class="h2 space-bottom-half">{{ $shopper->getCategory()->name }}</h1>
        <p>{{ $shopper->getCategory()->description }}</p>


        <hr/>
        <br><br>        
        <div class="row">

            @if($shopper->getCategory()->name != "Sofas")   

            @foreach($shopper->getProducts() as $product)


            <div class="col-md-3">
                <a href="{{ route("show-product",[ "slug" => $product->slug ]) }}"><img src="{{ asset('../../thairattan2') }}/assets/products/{{ $product->medium_image }}" class="img-responsive" alt=""></a>
                <p class="gen-cat-text">
                    {{ $product->subcategory }}<br>                
                    <a href="{{ route("show-product",[ "slug" => $product->slug ]) }}">{{ $product->name }}</a><br><br>
                <div class="row">
                    <div class="col-lg-6 catalogue-price-discount" style="font-size:16px;">&#3647; {{ $product->price }}</div>
                    <div class="col-lg-6 catalogue-price" style="font-size:16px;">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($product->price,$discount)) }}</div>
                </div>                                       

                <a href="../subscribe.html">Special price 30% Off. Subscribe Now!</a>

                </p>
            </div>      


            @endforeach 
            

            @else


            @foreach($shopper->getProducts() as $product)


            <div class="col-md-3">
                <a href="{{ route("show-product",[ "slug" => $product->slug ]) }}"><img src="{{ asset('../../thairattan2') }}/assets/products/{{ $product->medium_image }}" class="img-responsive" alt=""></a>                
                <p class="gen-cat-text">
                    {{ $product->subcategory }}<br>                
                    <a href="{{ route("show-product",[ "slug" => $product->slug ]) }}">{{ $product->name }}</a><br>
                    <img src="{{ asset('../../thairattan2') }}/assets/products/{{ $product->small_image }}" style="max-height:80px;" alt="">
                <div class="row">
                    <div class="col-lg-6 catalogue-price-discount" style="font-size:16px;">&#3647; {{ $product->price }}</div>
                    <div class="col-lg-6 catalogue-price" style="font-size:16px;">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($product->price,$discount)) }}</div>
                </div>                                       

                <a href="../subscribe.html">Special price 30% Off. Subscribe Now!</a>

                </p>
            </div>      


            @endforeach 



            @endif

        </div> 

        <hr/>

        <div class="row">
            
             <!--  include categories /-->
            @include('common/categories')
            
        </div>


    </div><!-- .shop-item -->

</section><!-- .container -->



@stop

