@extends('layout')

@section('content')



  <!-- about section -->
        <section id="rattan-colors" class="colors section">
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

                    <div class="col-sm-4 text-left" style="padding-left:30px;">  

                        <br><br><br>

                        <h3>Rattan colors</h3>
                        <p>8 rattan colors acrilyc varnish. Natural ( not painted )</p>
                        <br>


                        <table class="finish-table" border="0">
                            <tr>
                                <td>
                                    <span style="margin-left:5px;">White Old</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-white-old-s.png');$('#rattan-name').text('White Old');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/white-old.jpg" alt="Rattan color finishing White Old"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Grey Light</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-grey-light-s.png');$('#rattan-name').text('Grey Light');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/grey-light.jpg" alt="Rattan color finishing Grey Light"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Natural</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-natural-s.png');$('#rattan-name').text('Natural ( not painted )');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/natural.jpg" alt="Rattan color finishing Natural"></a>
                                </td>
                            </tr><tr>
                                <td>
                                    <span style="margin-left:5px;">Honey</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-honey-s.png');$('#rattan-name').text('Honey');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/honey.jpg" alt="Rattan color finishing Honey"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">black washed</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-black-washed-s.png');$('#rattan-name').text('Black Washed');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/black-washed.jpg" alt="Rattan color finishing Black Washed"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Caramel</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-caramel-s.png');$('#rattan-name').text('Caramel');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/caramel.jpg" alt="Rattan color finishing Caramel"></a>
                                </td>

                            </tr><tr>
                                <td>
                                    <span style="margin-left:5px;">Brown Old</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-brown-old-s.png');$('#rattan-name').text('Brown Old');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/brown-old.jpg" alt="Rattan color finishing Brown Old"></a><br>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Grey Old</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-grey-old-s.png');$('#rattan-name').text('Grey Old');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/grey-old.jpg" alt="Rattan color finishing Grey Old"></a><br>

                                </td>
                                <td>
                                    <span style="margin-left:5px;">Black</span>
                                    <a href="javascript:void(0);" onclick="$('#pol-tester').attr('src','{{ asset('../..') }}/assets/tester/pol-black-s.png');$('#rattan-name').text('Black');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/black.jpg" alt="Rattan color finishing Black"></a><br>

                                </td>

                            </tr>
                        </table>


                    </div>
                    <div class="col-sm-4 text-left" style="padding-left:30px;">  

                        <br><br><br>

                        <h3>Fabric colors</h3>

                        <p>Best quality sponge ( high density ), best comfort. 100% cotton or waterproof on request. ( waterproof available on few colors ) </p>

                        <br>

                        <table class="finish-table">
                            <tr>
                                <td>                                  
                                    <span style="margin-left:5px;">White</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-white-s.png');$('#fabric-name').text('White');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-01-white.jpg" alt="Cushions color finishing White for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Ecru</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-ecru-s.png');$('#fabric-name').text('Ecru');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-04-ecru.jpg" alt="Cushions color finishing Ecru for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Grey Light</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-grey-light-s.png');$('#fabric-name').text('Grey Light');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-05-grey-light.jpg" alt="Cushions color finishing Grey Light for Rattan furnitures"></a>
                                </td>
                            </tr><tr>
                                <td>
                                    <span style="margin-left:5px;">Walnut Old</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-walnut-old-s.png');$('#fabric-name').text('Walnut Old');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-07-walnut-old.jpg" alt="Cushions color finishing Walnut Old for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Walnut Dark</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-walnut-dark-s.png');$('#fabric-name').text('Walnut Dark');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-10-walnut-dark.jpg" alt="Cushions color finishing Walnut Dark for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Yellow Light</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-yellow-light-s.png');$('#fabric-name').text('Yellow Light');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-11-yellow-light.jpg" alt="Cushions color finishing Yellow Light for Rattan furnitures"></a>
                                </td>
                            </tr><tr>
                                <td>
                                    <span style="margin-left:5px;">Yellow Sun</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-yellow-sun-s.png');$('#fabric-name').text('Yellow Sun');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-12-yellow-sun.jpg" alt="Cushions color finishing Yellow Sun for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Green Light</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-green-light-s.png');$('#fabric-name').text('Green Light');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-14-green-light.jpg" alt="Cushions color finishing Green Light for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Orange Light</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-orange-light-s.png');$('#fabric-name').text('Orange Light');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-16-orange-light.jpg" alt="Cushions color finishing Orange Light for Rattan furnitures"></a>
                                </td>
                            </tr><tr>
                                <td>
                                    <span style="margin-left:5px;">Amaranth</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-amaranth-s.png');$('#fabric-name').text('Amaranth');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-19-amaranth.jpg" alt="Cushions color finishing Amaranth for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Blue Light</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-blue-light-s.png');$('#fabric-name').text('Blue Light');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-21-blue-light.jpg" alt="Cushions color finishing Blue Light for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Blue Dark</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-blue-dark-s.png');$('#fabric-name').text('Blue Dark');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-22-blue-dark.jpg" alt="Cushions color finishing Blue Dark for Rattan furnitures"></a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <span style="margin-left:5px;">Grey</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-grey-s.png');$('#fabric-name').text('Grey');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-23-grey.jpg" alt="Cushions color finishing Grey for Rattan furnitures"></a>
                                </td>
                                <td>
                                    <span style="margin-left:5px;">Black</span>
                                    <a href="javascript:void(0);" onclick="$('#cus-tester').attr('src','{{ asset('../..') }}/assets/tester/cush-black-s.png');$('#fabric-name').text('Black');">
                                        <img class="finish-img" style="margin-top:5px;margin-bottom:5px;" src="{{ asset('../..') }}/assets/fabrics/fabric-cotton-cv-01-24-black.jpg" alt="Cushions color finishing Black for Rattan furnitures"></a>
                                </td>
                                <td></td>
                            </tr>
                        </table>


                    </div>
                    <div class="col-sm-4 text-left" style="padding-left:30px;"> 
                        <br><br>
                        <h1 class="h2 space-bottom-half">Color Tester</h1>
                        <p>
                            Click on the rattan and fabric thumbnails and you see the result below.<br>
                         </p>                         
                          <p>
                            Current rattan color: <span id="rattan-name" style="font-weight: bold;">white-old</span><br>
                            Current fabric color: <span id="fabric-name" style="font-weight: bold;">white</span><br>
                        </p>
                        <div>

                            <img  id="pol-tester" src="{{ asset('../..') }}/assets/tester/pol-white-old-s.png" style="width:300px;"><br>
                            <img  id="cus-tester" src="{{ asset('../..') }}/assets/tester/cush-white-s.png" style="width:300px;position:relative;top:-225px;">

                        </div>
                    </div>
                </div>
        </section>  
  <script>
      
  
  function preloader() {
	if (document.images) {
            
		var img1 = new Image();
		var img2 = new Image();
		var img3 = new Image();
                var img4 = new Image();
		var img5 = new Image();
		var img6 = new Image();
                var img7 = new Image();
		var img8 = new Image();
		var img9 = new Image();
                var img10 = new Image();
                var img11 = new Image();
                var img12 = new Image();
                var img13 = new Image();
                var img14 = new Image();
                var img15 = new Image();
                var img16 = new Image();
                var img17 = new Image();
                var img18 = new Image();
                var img19 = new Image();
                var img20 = new Image();
                var img21 = new Image();
                var img22 = new Image();
                var img23 = new Image();

		img1.src = "http://www.thairattan.com/assets/tester/pol-white-old-s.png";
		img2.src = "http://www.thairattan.com/assets/tester/pol-grey-light-s.png";
		img3.src = "http://www.thairattan.com/assets/tester/pol-natural-s.png";
                img4.src = "http://www.thairattan.com/assets/tester/pol-honey-s.png";
		img5.src = "http://www.thairattan.com/assets/tester/pol-black-washed-s.png";
		img6.src = "http://www.thairattan.com/assets/tester/pol-caramel-s.png";
                img7.src = "http://www.thairattan.com/assets/tester/pol-brown-old-s.png";
                img8.src = "http://www.thairattan.com/assets/tester/pol-grey-old-s.png";
                img9.src = "http://www.thairattan.com/assets/tester/pol-black-s.png";                
                img10.src = "http://www.thairattan.com/assets/tester/cush-white-s.png";
                img11.src = "http://www.thairattan.com/assets/tester/cush-ecru-s.png";
                img12.src = "http://www.thairattan.com/assets/tester/cush-grey-light-s.png";
                img13.src = "http://www.thairattan.com/assets/tester/cush-walnut-old-s.png";
                img14.src = "http://www.thairattan.com/assets/tester/cush-walnut-dark-s.png";
                img15.src = "http://www.thairattan.com/assets/tester/cush-yellow-light-s.png";
                img16.src = "http://www.thairattan.com/assets/tester/cush-yellow-sun-s.png";
                img17.src = "http://www.thairattan.com/assets/tester/cush-green-light-s.png";
                img18.src = "http://www.thairattan.com/assets/tester/cush-orange-light-s.png";
                img19.src = "http://www.thairattan.com/assets/tester/cush-amaranth-s.png";
                img10.src = "http://www.thairattan.com/assets/tester/cush-blue-light-s.png";
                img21.src = "http://www.thairattan.com/assets/tester/cush-blue-dark-s.png";
                img22.src = "http://www.thairattan.com/assets/tester/cush-grey-s.png";
                img23.src = "http://www.thairattan.com/assets/tester/cush-black-s.png";
                
	}
}

function addLoadEvent(func) {
    
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			if (oldonload) {
				oldonload();
			}
			func();
		}
	}
}
addLoadEvent(preloader);

</script>


@stop

