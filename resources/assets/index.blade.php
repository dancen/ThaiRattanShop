@extends('layout')

@section('content')

<section id="shopsubmenu" class="about section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-lg-offset-0">
                <div class="shop-submenu text-center">
                    <ul class="nav navbar-nav" style="text-align: center;width:100%;" >
                        
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
    </div>
</section>


<img src="{{ asset('../..') }}/assets/portico-thai-rattan-home.jpg" class="img-responsive" alt="Buy at Thai Rattan"></a>




@stop

