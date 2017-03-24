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

                <li class="hidden-xs">
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

                        @if (isset($shopper))

                            @if ($shopper->getCart() != null)

                               <?php $cart = $shopper->getCart(); ?>

                                @if ($cart->getCollection() > 0)

                                    <span class="items-number">{{ $cart->getNumOfItems() }}</span>

                                @else 

                                    <span class="items-number">0</span>

                                @endif

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