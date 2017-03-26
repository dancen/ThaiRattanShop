@extends('layout')

@section('content')



<!-- about section -->
<section id="thai-rattan-must-have" class="about section">           


    <div class="container">

        <div class="row">
            <div class="col-sm-12">
                
                <br><br>
                <h1 class="h2 space-bottom-half">Sorry!</h1>
                
                <br> 
                <p>{{ $message }}</p><br>
                <a class="btn-info btn-lg" href="{{ route("index") }}" style="max-width:280px;">Return to the shop</a><br>
                            
              
                <img class="img-responsive" src="{{ asset('../../thairattan2') }}/assets/tester/pol-natural-s.png">

            </div><!-- .row -->

        </div><!-- .row -->

    </div><!-- .row -->
</section><!-- .container -->


@stop

