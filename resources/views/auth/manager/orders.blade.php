@extends('layouts.app')

@section('content')


<!-- about section -->
<section id="thai-rattan-login" class="about section">    

    <div class="container">

        <h1 class="h2 space-bottom-half">Order Manager</h1>
        <br><br><br>

        <div class="row">
            <div class="col-sm-12">
               
                @foreach( $orders as $order )

                <div>
                    <div class="row" style="margin-bottom: 30px;">
                        <div class="col-sm-12 text-left">
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-12 text-left" style="font-size:20px;color:#009998;">
                                    <b>Order Id:</b> {{ $order->id }}<br><br>
                                </div>
                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-4 text-left">
                                    <b>Email:</b><br> {{ $order->email }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Delivery Area:</b><br> {{ $order->delivery_area }}<br><br>
                                </div>                                
                                <div class="col-sm-2 text-left">
                                    <b>First Name:</b><br> {{ $order->first_name }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Last Name:</b><br> {{ $order->last_name }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Phone:</b><br> {{ $order->phone }}<br><br>
                                </div>                                
                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">                                
                                <div class="col-sm-2 text-left">
                                    <b>Address:</b><br> {{ $order->address }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Country:</b><br> {{ $order->country }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>City:</b><br> {{ $order->city }}<br><br>
                                </div>                            
                                <div class="col-sm-2 text-left">
                                    <b>Province:</b><br> {{ $order->province }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Potal Code:</b><br> {{ $order->zip }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Payment Code:</b><br> {{ $order->payment_code }}<br><br>
                                </div>
                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-2 text-left">
                                    <b>Delivery Cost:</b><br>&#3647; {{ Helper::formatCurrency(  $order->shipping_cost ) }}<br><br>
                                </div>
                                <div class="col-sm-2 text-left">
                                    <b>Total Amount:</b><br>&#3647; {{ Helper::formatCurrency(  $order->total_amount ) }}<br><br>
                                </div>
                                <div class="col-sm-4 text-left">
                                    <b>Date:</b><br>  {{ \Carbon\Carbon::instance($order->created_at)->formatLocalized('%A %d %B %Y')   }}<br><br>
                                </div>
                                <div class="col-sm-4 text-left">
                                    <b>Estimate Delivery Date:</b><br> {{ \Carbon\Carbon::instance($order->created_at)->addDays('20')->formatLocalized('%A %d %B %Y')   }}<br><br>
                                </div>
                            </div>
                            <div class="row" style="border-bottom:1px solid #ccc;margin-bottom: 20px;">
                                <div class="col-sm-12 text-left">
                                    <b>Instruction:</b><br> {{ $order->Instruction }} Al centro della puntata, un reportage esclusivo dal fronte iracheno Il conduttore-inviato Corrado Formigli questa settimana è andato sul fronte iracheno a Mosul, per raccontare la tragedia umanitaria, e ha realizzato un reportage esclusivo e inedito della guerra contro il Califfato Nero. In studio con Formigli, Alessandro Di Battista (M5S), il Ministro della Giustizia Andrea Orlando (PD), Federico Rampini de La <br><br>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                @endforeach  

            </div><!-- .row -->



        </div><!-- .row -->

    </div><!-- .row -->
</section><!-- .container -->




@endsection
