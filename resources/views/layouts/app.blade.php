<!DOCTYPE html>
<html class="fa-events-icons-ready" lang="{{ config('app.locale') }}">
    <head>
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <meta charset="utf-8">
        <meta name="robots" content="index, follow">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta property="og:title" content="Shopping Cart, Thai Rattan furniture, indoors, outdoors, best quality, affordable price, natural rattan, best comfort, rattan wood and cotton" />
        <meta property="og:description" content="Shopping Cart, Thai Rattan collection: sofas, armchairs, tables and chairs. Design, elegance , natural rattan and painted rattan." />
        <meta name="description" content="Shopping Cart, Thai Rattan collection: sofas, armchairs, tables and chairs. Design, elegance , natural rattan and painted rattan." />
        <title>Shopping Cart | Thai Rattan</title>

        <link rel="shortcut icon" type="image/x-icon" href="./favicon.png">

        <link href="{{ asset('../../thairattan2') }}/assets/bootstrap.css" rel="stylesheet">        
        <link href="{{ asset('../../thairattan2') }}/assets/bootstrap-theme.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('../../thairattan2') }}/assets/font-awesome.css">
        <link href="{{ asset('../../thairattan2') }}/assets/owl.css" rel="stylesheet">
        <link href="{{ asset('../../thairattan2') }}/assets/owl_002.css" rel="stylesheet">
        <link href="{{ asset('../../thairattan2') }}/assets/magnific-popup.css" rel="stylesheet">
        <link href="{{ asset('../../thairattan2') }}/assets/products/style.css" rel="stylesheet">
        <link href="{{ asset('../../thairattan2') }}/assets/bootstrap-select.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="{{ asset('../../thairattan2') }}/assets/55b73bf748.css" media="all" rel="stylesheet">

        <!-- Scripts -->
        <script>
            window.Laravel = {!! json_encode([
                    'csrfToken' => csrf_token(),
            ]) !!}
            ;
        </script>


    </head>

    <!-- Body -->
    <!-- Adding/Removing class ".page-preloading" is enabling/disabling background smooth page transition effect and spinner. Make sure you also added/removed link to page-preloading.js script in the <head> of the document. -->


    <body>


        <div id="app">


            <!-- Navigation -->
            <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-vira">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header page-scroll">
                        <a class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <i class="fa fa-bars"></i>
                        </a>
                        <a href="{{ asset('../../thairattan2') }}/{{ config('app.locale') }}/index.html"><img class="logo" src="{{ asset('../../thairattan2') }}/assets/logo_black2_small.png"></a>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav navbar-right" style="line-height: 60px; margin-top: 10px;">



                            <li>
                                <a href="{{ route("index") }}" class="dropdown-toggle navbar-text-title" role="button" aria-haspopup="true" aria-expanded="false">E-SHOP</a>
                            </li>

                            <li>
                                <a href="{{ route("color-tester") }}" class="dropdown-toggle navbar-text-title" role="button" aria-haspopup="true" aria-expanded="false">Color Tester</a>
                            </li>

                            <li>
                                <a href="#thai-rattan-contact" class="dropdown-toggle navbar-text-title" role="button" aria-haspopup="true" aria-expanded="false">Contact</a>
                            </li>

                            <li>
                                <a href="{{ route("login") }}" class="dropdown-toggle navbar-text-title" role="button" aria-haspopup="true" aria-expanded="false">Staff-Only</a>
                            </li>

                            <li class="menu-item-img">
                                <a href="./cart-show"><span class="fa fa-shopping-cart" style="font-size:18px;margin-left:10px;" aria-hidden="true"></span>

                                    @if (Session::has('cart'))



                                    <?php $cart = Session::get('cart'); ?>

                                    @if ($cart->getCollection() > 0)

                                    <span class="items-number">{{ $cart->getNumOfItems() }}</span>

                                    @else 

                                    <span class="items-number">0</span>

                                    @endif

                                    @else

                                    <span class="items-number">0</span>

                                    @endif

                                </a></li>                        



                            @if (Auth::guest())

                            @else
                            <li class="dropdown">                               
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                {{ Auth::user()->name }} : Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>

                            </li>
                            @endif


                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.container-fluid -->
            </nav>



            @yield('content')



            <!--  include contact section /-->
            @include('common/contact')

            <!--  include footer /-->
            @include('common/footer')   

        </div>

        <!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
        <script src="{{ asset('../../thairattan2') }}/assets/jquery-3.js"></script>
        <script src="{{ asset('../../thairattan2') }}/assets/bootstrap.js"></script>
        <script src="{{ asset('../../thairattan2') }}/assets/owl.js"></script>
        <script src="{{ asset('../../thairattan2') }}/assets/55b73bf748.js"></script>
        <script src="{{ asset('../../thairattan2') }}/assets/jquery.js"></script>
        <script src="{{ asset('../../thairattan2') }}/assets/script.js"></script>
        <script src="{{ asset('../../thairattan2') }}/assets/message.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>


    </body><!-- <body> --></html>

