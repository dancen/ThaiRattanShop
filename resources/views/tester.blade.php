@extends('layout')

@section('content')



<!-- about section -->
<section id="rattan-colors" class="about section">
    <div class="container">


        <div class="row">




            <div class="col-sm-12">
                <br>
                <h1 class="h2 space-bottom-half">Express your uniqueness</h1>

                <p>
                    <b>Natural Rattan</b> has in itself a special charm. Even without being painted, it suit to any environment both indoors and outdoors. We offer several rattan colors with a relaxing and pleasant tint that you can choose for any room of the house.

                    <b>White Old, Grey Light, Honey, Caramel, Brown Old, Grey Old and Black </b> are tints that mimics a color used in time. Colors suitable for any room in the house and can be combined with any other color based on your personal taste. 


                </p>


            </div> 
        </div> 


        <div class="row">

            <div class="col-sm-8 text-left" style="padding-left:30px;"> 


                <br><br>

                <h1 class="h2 space-bottom-half">Color Tester</h1>
                <p>
                    Click on the rattan and fabric thumbnails and you see the result below.<br>
                </p>

                <br><br>
                <table style="width:100%;" border="0">
                    <tr>
                        <td style="width:50%;">
                            <p>
                                Current rattan color: <span id="rattan-name" style="font-weight: bold;">white-old</span><br>
                                <img id="current-rattan" class="pull-left" style="margin-top:5px;margin-bottom:5px;width:250px;height:150px;" src="{{ asset('../../thairattan2') }}/assets/white-old.jpg" alt="Rattan color finishing White Old">
                            </p>
                        </td>
                         <td style="width:50%;">
                            <p>
                                Current fabric color: <span id="fabric-name" style="font-weight: bold;">white</span><br>
                                <img id="current-fabric" class="pull-left" style="margin-top:5px;margin-bottom:5px;width:250px;height:150px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-01-white.jpg" alt="Cushions color finishing Yellow Light for Rattan furnitures">
                            </p>
                        </td>
                    </tr>
                </table>      



                <div><br><br>
                    <img class="pull-left" id="pol-tester" src="{{ asset('../../thairattan2') }}/assets/tester/pol-white-old-s.png" style="width:600px;"><br>
                    <img class="pull-left" id="cus-tester" src="{{ asset('../../thairattan2') }}/assets/tester/cush-white-s.png" style="width:600px;position:relative;top:-510px;">
                    
                </div>

                        

            </div>
            
            <div id="loading"> 
                     <img class="pull-left" src="{{ asset('../../thairattan2') }}/assets/loading.gif" alt="loading">
            </div>
            
            <div class="col-sm-4 text-left" style="padding-left:30px;">  

                <br><br><br>
                
                

                <h3>Rattan colors</h3>
                <p>8 rattan colors acrilyc varnish. Natural ( not painted )</p>
                <br>
               
                <table class="finish-table" border="0">
                    <tr>
                        <td>
                            <span style="margin-left:5px;">White Old</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img01').src );$('#rattan-name').text('White Old');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/white-old.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/white-old.jpg" alt="Rattan color finishing White Old"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Grey Light</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img02').src );$('#rattan-name').text('Grey Light');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/grey-light.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/grey-light.jpg" alt="Rattan color finishing Grey Light"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Natural</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img03').src );$('#rattan-name').text('Natural (not painted)');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/natural.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/natural.jpg" alt="Rattan color finishing Natural"></a>
                        </td>
                    </tr><tr>
                        <td>
                            <span style="margin-left:5px;">Honey</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img04').src );$('#rattan-name').text('Honey');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/honey.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/honey.jpg" alt="Rattan color finishing Honey"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">black washed</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img05').src );$('#rattan-name').text('Black Washed');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/black-washed.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/black-washed.jpg" alt="Rattan color finishing Black Washed"></a>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Caramel</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img06').src );$('#rattan-name').text('Caramel');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/caramel.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/caramel.jpg" alt="Rattan color finishing Caramel"></a>
                        </td>

                    </tr><tr>
                        <td>
                            <span style="margin-left:5px;">Brown Old</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img07').src );$('#rattan-name').text('Brown Old');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/brown-old.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/brown-old.jpg" alt="Rattan color finishing Brown Old"></a><br>
                        </td>
                        <td>
                            <span style="margin-left:5px;">Grey Old</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img08').src );$('#rattan-name').text('Grey Old');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/grey-old.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/grey-old.jpg" alt="Rattan color finishing Grey Old"></a><br>

                        </td>
                        <td>
                            <span style="margin-left:5px;">Black</span>
                            <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src', document.getElementById('r-img09').src );$('#rattan-name').text('Black');$('#current-rattan').attr('src','{{ asset('../../thairattan2') }}/assets/black.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/black.jpg" alt="Rattan color finishing Black"></a><br>

                        </td>

                    </tr>
                </table>

                <br>

                <h3>Fabric colors</h3>

                <p>Best quality sponge ( high density ), best comfort. 100% cotton or waterproof on request. ( waterproof available on few colors ) </p>


                <br>


                <table class="finish-table">
                    <tr>

                        <td>                                  
                            <span style="margin-left:5px;">White</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img01').src );$('#fabric-name').text('White');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-01-white.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-01-white.jpg" alt="Cushions color finishing White for Rattan furnitures"></a>
                        </td>

                        <td>
                            <span style="margin-left:5px;">Ecru</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img02').src );$('#fabric-name').text('Ecru');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-04-ecru.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-04-ecru.jpg" alt="Cushions color finishing Ecru for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Grey Light</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img03').src );$('#fabric-name').text('Grey Light');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-05-grey-light.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-05-grey-light.jpg" alt="Cushions color finishing Grey Light for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Walnut Old</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img04').src );$('#fabric-name').text('Walnut Old');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-07-walnut-old.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-07-walnut-old.jpg" alt="Cushions color finishing Walnut Old for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Walnut Dark</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img05').src );$('#fabric-name').text('Walnut Dark');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-10-walnut-dark.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-10-walnut-dark.jpg" alt="Cushions color finishing Walnut Dark for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Yellow Light</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img06').src );$('#fabric-name').text('Yellow Light');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-11-yellow-light.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-11-yellow-light.jpg" alt="Cushions color finishing Yellow Light for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Yellow Sun</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img07').src );$('#fabric-name').text('Yellow Sun');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-12-yellow-sun.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-12-yellow-sun.jpg" alt="Cushions color finishing Yellow Sun for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Green Light</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img08').src );$('#fabric-name').text('Green Light');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-14-green-light.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-14-green-light.jpg" alt="Cushions color finishing Green Light for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Orange Light</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img09').src );$('#fabric-name').text('Orange Light');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-16-orange-light.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-16-orange-light.jpg" alt="Cushions color finishing Orange Light for Rattan furnitures"></a>
                        </td>

                    </tr><tr>

                        <td>
                            <span style="margin-left:5px;">Amaranth</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img10').src );$('#fabric-name').text('Amaranth');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-19-amaranth.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-19-amaranth.jpg" alt="Cushions color finishing Amaranth for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Blue Light</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img11').src );$('#fabric-name').text('Blue Light');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-21-blue-light.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-21-blue-light.jpg" alt="Cushions color finishing Blue Light for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Blue Dark</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img12').src );$('#fabric-name').text('Blue Dark');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-22-blue-dark.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-22-blue-dark.jpg" alt="Cushions color finishing Blue Dark for Rattan furnitures"></a>
                        </td>

                    </tr>
                    <tr>

                        <td>
                            <span style="margin-left:5px;">Grey</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img13').src );$('#fabric-name').text('Grey');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-23-grey.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-23-grey.jpg" alt="Cushions color finishing Grey for Rattan furnitures"></a>
                        </td>



                        <td>
                            <span style="margin-left:5px;">Black</span>
                            <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src', document.getElementById('f-img14').src );$('#fabric-name').text('Black');$('#current-fabric').attr('src','{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-24-black.jpg');">
                                <img class="finish-img-tester" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../../thairattan2') }}/assets/fabrics/fabric-cotton-cv-01-24-black.jpg" alt="Cushions color finishing Black for Rattan furnitures"></a>
                        </td>

                        <td></td>

                    </tr>

                </table>


            </div>


            <!--  include categories /-->
            @include('common/categories')

        </div>



</section>

<style>
    div#preload { display: none; }
</style>

<div id="preload">
   <img id="r-img01" src="http://www.thairattan.com/assets/tester/pol-white-old-s.png" width="1" height="1" alt="Image 01" />
   <img id="r-img02" src="http://www.thairattan.com/assets/tester/pol-grey-light-s.png" width="1" height="1" alt="Image 02" />
   <img id="r-img03" src="http://www.thairattan.com/assets/tester/pol-natural-s.png" width="1" height="1" alt="Image 03" />
   <img id="r-img04" src="http://www.thairattan.com/assets/tester/pol-honey-s.png" width="1" height="1" alt="Image 01" />
   <img id="r-img05" src="http://www.thairattan.com/assets/tester/pol-black-washed-s.png" width="1" height="1" alt="Image 02" />
   <img id="r-img06" src="http://www.thairattan.com/assets/tester/pol-caramel-s.png" width="1" height="1" alt="Image 03" />
   <img id="r-img07" src="http://www.thairattan.com/assets/tester/pol-brown-old-s.png" width="1" height="1" alt="Image 01" />
   <img id="r-img08" src="http://www.thairattan.com/assets/tester/pol-grey-old-s.png" width="1" height="1" alt="Image 02" />
   <img id="r-img09" src="http://www.thairattan.com/assets/tester/pol-black-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img01" src="http://www.thairattan.com/assets/tester/cush-white-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img02" src="http://www.thairattan.com/assets/tester/cush-ecru-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img03" src="http://www.thairattan.com/assets/tester/cush-grey-light-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img04" src="http://www.thairattan.com/assets/tester/cush-walnut-old-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img05" src="http://www.thairattan.com/assets/tester/cush-walnut-dark-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img06" src="http://www.thairattan.com/assets/tester/cush-yellow-light-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img07" src="http://www.thairattan.com/assets/tester/cush-yellow-sun-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img08" src="http://www.thairattan.com/assets/tester/cush-green-light-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img09" src="http://www.thairattan.com/assets/tester/cush-orange-light-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img10" src="http://www.thairattan.com/assets/tester/cush-amaranth-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img11" src="http://www.thairattan.com/assets/tester/cush-blue-light-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img12" src="http://www.thairattan.com/assets/tester/cush-blue-dark-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img13" src="http://www.thairattan.com/assets/tester/cush-grey-s.png" width="1" height="1" alt="Image 03" />
   <img id="f-img14" src="http://www.thairattan.com/assets/tester/cush-black-s.png" width="1" height="1" alt="Image 03" />
</div>


<script>

document.getElementById('loading').style.display = 'block';

window.onload = function(){
   document.getElementById('loading').style.display = 'none';
};
    

</script>



@stop

