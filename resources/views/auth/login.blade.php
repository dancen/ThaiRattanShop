@extends('layouts.app')

@section('content')



<!-- about section -->
<section id="thai-rattan-login" class="about section">           


    <div class="container">

        <div class="row">
            <div class="col-sm-12">

                                               
                <img src="{{ asset('../../thairattan2') }}/assets/logo_black2.png" style="max-width:280px;" alt="logo">
                
                <h1 class="h2 space-bottom-half">Please, Staff Only!</h1>

                <br>
                
                <a href="">Order Manager</a>

                <form class="form-horizontal" class="container padding-top-3x padding-bottom-2x" role="form" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="col-md-4 control-label"></label>

                        <div class="col-md-4">
                            <input id="email" type="email" class="form-control input-lg" name="email" placeholder="Enter your E-Mail Address" value="{{ old('email') }}" required autofocus style="border: 1px solid #ccc;">

                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label"></label>

                        <div class="col-md-4">
                            <input id="password" type="password" class="form-control input-lg" placeholder="Enter your password" name="password" required style="border: 1px solid #ccc;">

                            @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="col-md-4 col-md-offset-4">
                            <button type="submit" class="btn btn-info btn-lg btn-block">
                                Login
                            </button>                               
                        </div>



                </form>

                <br><br><br>



            </div><!-- .row -->

        </div><!-- .row -->

    </div><!-- .row -->
</section><!-- .container -->




@endsection
