<!DOCTYPE html>
<html class="fa-events-icons-ready" lang="{{ config('app.locale') }}">
    <head>
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

        <link href="{{ asset('../..') }}/assets/bootstrap.css" rel="stylesheet">        
        <link href="{{ asset('../..') }}/assets/bootstrap-theme.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="{{ asset('../..') }}/assets/font-awesome.css">
        <link href="{{ asset('../..') }}/assets/owl.css" rel="stylesheet">
        <link href="{{ asset('../..') }}/assets/owl_002.css" rel="stylesheet">
        <link href="{{ asset('../..') }}/assets/magnific-popup.css" rel="stylesheet">
        <link href="{{ asset('../..') }}/assets/products/style.css" rel="stylesheet">
        <link href="{{ asset('../..') }}/assets/bootstrap-select.css" rel="stylesheet">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <link href="{{ asset('../..') }}/assets/55b73bf748.css" media="all" rel="stylesheet">
    </head>

    <!-- Body -->
    <!-- Adding/Removing class ".page-preloading" is enabling/disabling background smooth page transition effect and spinner. Make sure you also added/removed link to page-preloading.js script in the <head> of the document. -->
    <body>

        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                    (i[r].q = i[r].q || []).push(arguments)
                }, i[r].l = 1  new Date();
                a = s.createElement(o),
                        m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

            ga('create', 'UA-89546748-1', 'auto');
            ga('send', 'pageview');

        </script>

        <!-- Navigation -->
        <nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-vira">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header page-scroll">
                    <a class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <i class="fa fa-bars"></i>
                    </a>
                    <a href="{{ asset('../..') }}/{{ config('app.locale') }}/index.html"><img class="logo" src="{{ asset('../..') }}/assets/logo_black2_small.png"></a>

                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav navbar-right" style="line-height: 60px; margin-top: 10px;">


                        <li>
                            <a href="{{ route("index") }}" class="dropdown-toggle navbar-text-title" role="button" aria-haspopup="true" aria-expanded="false">E-Shop</a>
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
                            <a href="{{ route("cart-show") }}"><span class="fa fa-shopping-cart" style="font-size:18px;margin-left:10px;" aria-hidden="true"></span>

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
                        

<!--                        <li class="menu-item-img">
                            <span class="language">
                                <a class="page-scroll" href="./"><img class="langflag" src="{{ asset('../..') }}/assets/thai-flag.jpg"></a>
                                <img style="opacity: 0.5;" class="langflag" src="{{ asset('../..') }}/assets/uk-flag.jpg">
                            </span> 
                        </li>-->
                        
                       




                    </ul>
                </div>
                <!-- /.navbar-collapse -->
            </div>
            <!-- /.container-fluid -->
        </nav>



        @yield('content')




        <section id="thai-rattan-contact" class="contact section">
            <div class="container">
                <h2 class="title">Drop us a line</h2>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="vira-card">
                            <div class="vira-card-header">
                                <span class="fa fa-map-o" aria-hidden="true"></span>
                            </div>
                            <div class="vira-card-content">
                                <h3>Address</h3>
                                <p>
                                    <b>Visit by appointment only</b><br>
                                    VENICE DI IRIS Shopping Plaza<br>1/242  Watcharaphon Road<br> Khwaeng Tha Raeng, Khet Bang Khen <br> Bangkok 10220 <br> THAILAND<br><br><a href="../thai-rattan-find-us-on-map/index.html">Find us on Map</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="vira-card" style="max-height: 300px;">
                            <div class="vira-card-header">
                                <span class="fa fa-phone" aria-hidden="true"></span> <img src="{{ asset('../..') }}/assets/line-grey.png" style="width:50px;">
                            </div>
                            <div class="vira-card-content">
                                <h3>Phone / Line</h3>
                                <p>                                    
                                    +66 098 797 4129<br>Line Id: thairattan-th<br> </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="vira-card">
                            <div class="vira-card-header">
                                <span class="fa fa-paper-plane" aria-hidden="true"></span>
                            </div>
                            <div class="vira-card-content">
                                <h3>Email</h3>
                                <p>
                                    <b>General Enquiry</b><br> <a href="mailto:info@thairattan.com">info@thairattan.com</a><br><a href="mailto:team@thairattan.com">team@thairattan.com</a><br><br><b>Order Enquiry</b><br> <a href="mailto:orders@thairattan.com">orders@thairattan.com</a><br><br><b>Wholesale Enquiry</b><br> <a href="mailto:sales@thairattan.com">sales@thairattan.com</a><br><br>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="vira-card">

                            <div class="vira-card-content">
                                <div class="vira-card-header">
                                    <span class="fa fa-comment" aria-hidden="true"></span>
                                </div>
                                <h3>Message</h3>

                                <div class="row text-left" style="padding-left:20px;padding-right:20px;">
                                    <div class="col-lg-12">
                                        <form id="contactForm" method="post"><input type="hidden" name="lang" id="lang" value="en"> 
                                            <input type="text" name="email" id="email" class="form-control input-lg" style="border: 1px solid #ccc;" placeholder="Enter your email ...">
                                            <textarea  name="message" id="message" class="form-control input-lg" style="border: 1px solid #ccc;" placeholder="Write a message ..."></textarea>                                            
                                            <button data-dismiss="modal" class="btn btn-lg btn-info" onclick="sendMessage('../..');" type="button"> Send </button>
                                        </form>
                                        <br>
                                        <div id="response-message"></div> 
                                    </div><!-- /.col-lg-6 -->
                                </div><!-- /.row -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>




        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <p class="cite">  <img style="height:130px;" src="{{ asset('../..') }}/assets/logo_white3.png"> <br> Handcrafted with <span class="fa fa-heart"></span> and Passion.<br>© Thai Rattan - 2016<br><br><a href="https://www.facebook.com/thairattan" target="_blank"><i class="fa fa-facebook-square" style="font-size: 30px;"></i></a><br></p>
                    </div>
                </div>
            </div>
        </footer>


        <!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
        <script src="{{ asset('../..') }}/assets/jquery-3.js"></script>
        <script src="{{ asset('../..') }}/assets/bootstrap.js"></script>
        <script src="{{ asset('../..') }}/assets/owl.js"></script>
        <script src="{{ asset('../..') }}/assets/55b73bf748.js"></script>
        <script src="{{ asset('../..') }}/assets/jquery.js"></script>
        <script src="{{ asset('../..') }}/assets/script.js"></script>
        <script src="{{ asset('../..') }}/assets/message.js"></script>


    </body><!-- <body> --></html>