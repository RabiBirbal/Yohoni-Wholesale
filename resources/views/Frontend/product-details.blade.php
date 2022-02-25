<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Product Details</title>
  <style>
    .xzoom-gallery {
    margin-top: 10px
    }

    .xzoom {
        margin-top: 40px
    }
    </style>
	@include('/frontend/style')

</head>
<body>
  @if(Session::has('success'))
  <div class="alert alert-success alert-dismissible alert-block" role="alert">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong><i class="fas fa-check-circle"></i> Success!! {{Session('success')}}</strong>
    {{ Session::forget('success'); }}
  </div>
  @elseif(Session::has('error'))
  <div class="alert alert-danger alert-dismissible alert-block" role="alert">
    <button type="button" class="close" data-dismiss="alert">X</button>
    <strong><i class="fas fa-check-circle"></i> Error!! {{Session('error')}}</strong>
    {{ Session::forget('error'); }}
  </div>
  @endif 
<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>

	<div class="how-section1">
                    <div class="row">
                      {{-- @foreach($product as $data) --}}
                      <div class="col-md-6">
                        <div class="xzoom-container"> <img class="xzoom" id="xzoom-default" src="{{asset('upload/images/'.$product->product_image)}}" xoriginal="{{asset('upload/images/'.$product->product_image)}}" width="50%" />
                        </div>
                    </div>
                        {{-- <div class="col-md-6 xzoom-container">
                            <img src="{{asset('upload/images/'.$product->product_image)}}" alt="" >
                        </div> --}}
                        <div class="col-md-6">
                            <h4>{{$product->name}}</h4> 
                            <div class="col-md-6 mb-3">
                              @if($product->product_quantity <= '0')
                              <h5 class="text-center" style="background-color: red; color: white; padding: 5px; width: 50%"><strong>Out of stock</strong></h5>
                              @else
                                <h5 class="text-center" style="background-color: green; color: white; padding: 5px; width: 40%"><strong>In stock</strong></h5>
                              @endif
                              </div>
                              <div class="col-md-6 text-left mb-3">
                              @if($product->offer != null)
                              <h5 class="text-center" style="background-color: yellow; color: red; padding: 5px; width: 70%"><strong>{{$product->offer}}</strong></h5>
                              @endif
                              </div>
                              <div class="col-md-12">
                              <h4 class="subheading">{{$product->category}} / {{$product->subcategory}}</h4>
                              <h3>Price : Rs.{{$product->price}}  <s>{{$product->previous_price}}</s></h3>
                        <p class="text-dark text-justify">{{$product->description}}
                     </p>
                     @if($product->product_quantity <= '0')
                              <h5 class="text-center" style="background-color: red; color: white; padding: 5px; width: 50%"><strong>This product is not available in stock. So, you can't add this product to the cart</strong></h5>
                              @else
                              <form action="/add_to_cart" method="post" class="was-validated">
                                @csrf
                                <div class="col-md-4">
                                  <span><strong>Quantity: </strong></span>
                                  <select id="select" name="quantity" class="form-control text-center" style="width: 100%">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option> 
                                  </select>
                                </div>
                                <div class="col-md-4">
                                  {{-- @if($product->category == 'Clothing') --}}
                                  <span><strong>Size:</strong></span>
                                  <select id="select" name="size" class="form-control text-center" style="width: 100%">
                                    @foreach($size as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                   {{-- <option value="m">M</option>
                                   <option value="l">L</option>
                                   <option value="xl">XL</option>
                                   <option value="xxl">XXL</option> --}}
                                   @endforeach
                                 </select>
                                 {{-- @elseif($data->category == 'Footwear')
                                 <span><strong>Size:</strong></span>
                                 <select id="select" name="size" class="form-control text-center">
                                  <option value="40">40</option>
                                  <option value="41">41</option>
                                  <option value="42">42</option>
                                  <option value="43">43</option>
                                  <option value="44">44</option>
                                </select> --}}
                                  {{-- @endif --}}
                                </div>
                                
                              <input type="hidden" name="price" id="price" value="{{$product['price']}}">
                              <input type="hidden" name="total" id="total" value="">
                                <input type="hidden" name="product_quantity" value="{{$product->product_quantity}}">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <div class="col-md-6">
                                 <button class="btn btn-primary text-center">
                                 <i class="fa fa-shopping-cart" aria-hidden="true">
                                    &nbsp Add to Cart
                                   </i>
                                 </button>
                                </div>
                              </form>
                              @endif
                          </div>
                        </div>
                       {{-- @endforeach --}}
                    </div>
                
                </div>

        <!-- details -->
        <div class="detail">
          <div class="container">
            <div class="row">
              <div class="col-md-4">
                <img src="/frontend/image/reward.jpg"  class= "center" alt="">
                <h4><b>BEST PRICES & OFFERS</b></h4>
                <p>Get 20% extra<br>
                  Exclusive Deal
                </p>
              </div>
              <div class="col-md-4">
                <img src="/frontend/image/box.jpg" class= "center" alt="">
                <h4><b>EASY RETURNS POLICY</b></h4>
                <p>Return 30 Days<br>
                  No Policy & Terms
                </p>
              </div>
              <div class="col-md-4">
                <img src="/frontend/image/secure.jpg"  class= "center" alt="">
                <h4><b>SECURE PAYMENTS</b></h4>
                <p>100% security<br>
                  Confirmation system
                </p>
              </div>
            </div>
          </div>
        </div>
        <!-- details end -->



<!-- newsletter -->
<!-- <div class="newsletter">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>SIGN UP FOR NEWSLETTER</h1>
        <h5>To subscribe Our Newsletter & Get coupons.</h5>
      </div>
      <div class="col-md-6">
         <div class="form-group">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control news" id="exampleFormControlInput1" placeholder="your email address">
    <a href=""><span class="subscribe">Subscribe</span></a>
  </div>
      </div>
    </div>
  </div>
</div> -->
<!-- newsletter ends -->



<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/bbbootstrap/libraries@main/xzoom.min.js"></script>
<<script>
  function wcqib_refresh_quantity_increments() {
  jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
      var c = jQuery(b);
      c.addClass("buttons_added"), c.children().first().before('<input type="button" value="-" class="minus" />'), c.children().last().after('<input type="button" value="+" class="plus" />')
  })
}
String.prototype.getDecimals || (String.prototype.getDecimals = function() {
  var a = this,
      b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
  return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
}), jQuery(document).ready(function() {
  wcqib_refresh_quantity_increments()
}), jQuery(document).on("updated_wc_div", function() {
  wcqib_refresh_quantity_increments()
}), jQuery(document).on("click", ".plus, .minus", function() {
  var a = jQuery(this).closest(".quantity").find(".qty"),
      b = parseFloat(a.val()),
      c = parseFloat(a.attr("max")),
      d = parseFloat(a.attr("min")),
      e = a.attr("step");
  b && "" !== b && "NaN" !== b || (b = 0), "" !== c && "NaN" !== c || (c = ""), "" !== d && "NaN" !== d || (d = 0), "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1), jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())), a.trigger("change")
});
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#total').val($('#price').val());
    // $('#quantity').val($('#quantity').val('1'));
    $('select').on('change',function(){
      var quantity = $('#select').find(":selected").text();
      // var quantity=parseInt($('#quantity').val());
      var price=$('#price').val();
      var total=quantity*price;
      $('#total').val(total);
    });
  });
</script>

<!-- search -->
<script>
  $(document).ready(function(){
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });
  });
</script>

<script>
  $("document").ready(function(){
      setTimeout(function(){
         $("div.alert-success").remove();
      }, 2000 ); // 5 secs    
  });
  $("document").ready(function(){
      setTimeout(function(){
         $("div.alert-danger").remove();
      }, 2000 ); // 5 secs    
  });
</script>

<script>
    (function ($) {
$(document).ready(function() {
$('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
$('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
$('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
$('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
$('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

//Integration with hammer.js
var isTouchSupported = 'ontouchstart' in window;

if (isTouchSupported) {
//If touch device
$('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
var xzoom = $(this).data('xzoom');
xzoom.eventunbind();
});

$('.xzoom, .xzoom2, .xzoom3').each(function() {
var xzoom = $(this).data('xzoom');
$(this).hammer().on("tap", function(event) {
event.pageX = event.gesture.center.pageX;
event.pageY = event.gesture.center.pageY;
var s = 1, ls;

xzoom.eventmove = function(element) {
element.hammer().on('drag', function(event) {
event.pageX = event.gesture.center.pageX;
event.pageY = event.gesture.center.pageY;
xzoom.movezoom(event);
event.gesture.preventDefault();
});
}

xzoom.eventleave = function(element) {
element.hammer().on('tap', function(event) {
xzoom.closezoom();
});
}
xzoom.openzoom(event);
});
});

$('.xzoom4').each(function() {
var xzoom = $(this).data('xzoom');
$(this).hammer().on("tap", function(event) {
event.pageX = event.gesture.center.pageX;
event.pageY = event.gesture.center.pageY;
var s = 1, ls;

xzoom.eventmove = function(element) {
element.hammer().on('drag', function(event) {
event.pageX = event.gesture.center.pageX;
event.pageY = event.gesture.center.pageY;
xzoom.movezoom(event);
event.gesture.preventDefault();
});
}

var counter = 0;
xzoom.eventclick = function(element) {
element.hammer().on('tap', function() {
counter++;
if (counter == 1) setTimeout(openfancy,300);
event.gesture.preventDefault();
});
}

function openfancy() {
if (counter == 2) {
xzoom.closezoom();
$.fancybox.open(xzoom.gallery().cgallery);
} else {
xzoom.closezoom();
}
counter = 0;
}
xzoom.openzoom(event);
});
});

$('.xzoom5').each(function() {
var xzoom = $(this).data('xzoom');
$(this).hammer().on("tap", function(event) {
event.pageX = event.gesture.center.pageX;
event.pageY = event.gesture.center.pageY;
var s = 1, ls;

xzoom.eventmove = function(element) {
element.hammer().on('drag', function(event) {
event.pageX = event.gesture.center.pageX;
event.pageY = event.gesture.center.pageY;
xzoom.movezoom(event);
event.gesture.preventDefault();
});
}

var counter = 0;
xzoom.eventclick = function(element) {
element.hammer().on('tap', function() {
counter++;
if (counter == 1) setTimeout(openmagnific,300);
event.gesture.preventDefault();
});
}

function openmagnific() {
if (counter == 2) {
xzoom.closezoom();
var gallery = xzoom.gallery().cgallery;
var i, images = new Array();
for (i in gallery) {
images[i] = {src: gallery[i]};
}
$.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
} else {
xzoom.closezoom();
}
counter = 0;
}
xzoom.openzoom(event);
});
});

} else {
//If not touch device

//Integration with fancybox plugin
$('#xzoom-fancy').bind('click', function(event) {
var xzoom = $(this).data('xzoom');
xzoom.closezoom();
$.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
event.preventDefault();
});

//Integration with magnific popup plugin
$('#xzoom-magnific').bind('click', function(event) {
var xzoom = $(this).data('xzoom');
xzoom.closezoom();
var gallery = xzoom.gallery().cgallery;
var i, images = new Array();
for (i in gallery) {
images[i] = {src: gallery[i]};
}
$.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
event.preventDefault();
});
}
});
})(jQuery);
</script>

</body>
</html>