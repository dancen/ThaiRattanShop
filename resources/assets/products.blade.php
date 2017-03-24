@extends('layout')

@section('content')
<?php $discount = Session::get('discount'); ?>




<!-- about section -->
<section id="thai-rattan-must-have" class="about section">           


    <div class="container">



        <h1 class="h2 space-bottom-half">{{ $category->name }}</h1>
        <p>{{ $category->description }}</p>


        <hr/>
        <br><br>        
        <div class="row">

            @if($category->name != "Sofas")   


            @foreach($products as $product)


            <div class="col-md-3">
                <a href="{{ route("show-product",["product"=> $product->slug ]) }}"><img src="{{ asset('../..') }}/assets/products/{{ $product->medium_image }}" class="img-responsive" alt=""></a>
                <p class="gen-cat-text">
                    {{ $product->subcategory }}<br>                   
                    <a href="{{ route("show-product",["product"=> $product->slug ]) }}">{{ $product->name }}</a><br><br>
                <div class="row">
                    <div class="col-lg-6 catalogue-price-discount" style="font-size:16px;">&#3647; {{ $product->price }}</div>
                    <div class="col-lg-6 catalogue-price" style="font-size:16px;">&#3647; {{ Helper::formatCurrency(Helper::calculateDiscount($product->price,$discount)) }}</div>
                </div>                                       

                <a href="{{ asset('../..') }}/en/subscribe.html">Special price 30% Off. Subscribe Now!</a>

                </p>
            </div>   

            @endforeach 


            @else


            @foreach($products as $product)

            <div class="col-md-3">
                <a href="{{ route("show-product",["product"=> $product->slug ]) }}"><img src="{{ asset('../..') }}/assets/products/{{ $product->medium_image }}" class="img-responsive" alt=""></a>                
                <p class="gen-cat-text">
                    {{ $product->subcategory }}<br>                
                    <a href="{{ route("show-product",["product"=> $product->slug ]) }}">{{ $product->name }}</a><br>
                    <img src="{{ asset('../..') }}/assets/products/{{ $product->small_image }}" style="max-height:80px;" alt="">
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
            <div class="col-md-12">
                <div class="row shop-submenu">
                    <ul  class="nav navbar-nav navbar-center" >

                        @foreach($categories as $category)

                        <li>
                            <a href="{{ route("show-products",["category"=>$category->slug]) }}">
                                <img src="{{ asset('../..') }}/assets/products/{{ $category->image }}">
                                <i>{{ $category->name }}</i>
                            </a>
                        </li>

                        @endforeach      


                    </ul>

                </div>
            </div>
        </div>


    </div><!-- .shop-item -->

</section><!-- .container -->



@stop

