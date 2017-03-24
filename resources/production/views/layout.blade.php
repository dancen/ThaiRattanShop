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
        <link href="{{ asset('../..') }}/assets/pace.css" media="all" rel="stylesheet">
      
    </head>

    <!-- Body -->
     <body>

       <!--  include google analitics /-->
       @include('common/analytics')
       
       <!--  include bootstrap navbar /-->
       @include('common/navbar')
       
       <!--  include content templates /-->
       @yield('content')
       
       <!--  include contact section /-->
       @include('common/contact')
        
       <!--  include footer /-->
       @include('common/footer')       


        <!-- JavaScript (jQuery) libraries, plugins and custom scripts -->
        <script src="{{ asset('../..') }}/assets/jquery-3.js"></script>
        <script src="{{ asset('../..') }}/assets/bootstrap.js"></script>
        <script src="{{ asset('../..') }}/assets/owl.js"></script>
        <script src="{{ asset('../..') }}/assets/55b73bf748.js"></script>
        <script src="{{ asset('../..') }}/assets/jquery.js"></script>
        <script src="{{ asset('../..') }}/assets/script.js"></script>
        <script src="{{ asset('../..') }}/assets/message.js"></script>
        <script src="{{ asset('../..') }}/assets/pace.min.js"></script>

        

    </body>    <!-- <body> -->
</html>