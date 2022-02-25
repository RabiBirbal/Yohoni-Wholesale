<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>About us</title>
	@include('/frontend/style')
  <style>
    .fixed-image{
  background-image: url("Frontend/image/image.jpg");
  /* opacity: 0.7;*/
  background-attachment: fixed;
 /* background-repeat: no-repeat;*/
 
}
  .fixed-image img{
     width: 100%;
  height: auto;
  }
.fixed-image h1{
  color: #fff;
 
  text-align: center;
  
  margin-top: 20px;
}
.fixed-image p{
  color: #fff;
  text-align: center;
}
  </style>
</head>
<body>

<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>
<!-- about us -->


<div class="fixed-image">
  <div class="container">
    <div class="col-md-12 col-sm-12 col-lg-12">
 <h1>About us</h1>
           <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br><br>
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
      tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
      quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
      consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
      cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
      proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
    </div>
  </div>
</div>
<!-- about us ends-->

<!-- choose the brand -->
<div class="brand"> 
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h1><b>Choose the brand you love!!!</b></h1>
      </div>
    </div>
  </div>
</div>

<!-- owl caraousel -->
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 offersimg">
      <div class="owl-carousel owl-carousel-custom-height owl-theme">
        <div class="crop-thumbnail">
        <img src="/frontend/image/lg.png" alt="" class="img-responsive"></a>
      
        </div>
        <div class="crop-thumbnail">
        <img src="/frontend/image/addidas.png" alt="" class="img-responsive"></a>
        </div>

        <div class="crop-thumbnail">
        <img src="/frontend/image/cg.jpg" alt="" class="img-responsive"></a>
        </div>
        <div class="crop-thumbnail">
         <img src="/frontend/image/baltra.png" alt="" class="img-responsive"></a>
          
        </div>
      <div class="crop-thumbnail">
         <img src="/frontend/image/apple.png" alt="" class="img-responsive"></a>
          
        </div>
        <div class="crop-thumbnail">
        <img src="/frontend/image/samsung.png" alt="" class="img-responsive"></a>
          
        </div>

        <div class="crop-thumbnail">
       <img src="/frontend/image/philips.png" alt="" class="img-responsive"></a>
       
        </div>
        <div class="crop-thumbnail">
        <img src="/frontend/image/mi.png" alt="" class="img-responsive"></a>
         
        </div>
        <div class="crop-thumbnail">
          <img src="/frontend/image/home glory.jpg" alt="" class="img-responsive"></a>
        </div>
        <div class="crop-thumbnail">
       <img src="/frontend/image/vivo.png" alt="" class="img-responsive"></a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- owl caraousel ends -->


<!-- choose the brand ends -->

<!-- details -->
<!-- <div class="detail">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="image/reward.jpg"  class= "center" alt="">
        <h4><b>BEST PRICES & OFFERS</b></h4>
        <p>Get 20% extra<br>
Exclusive Deal</p>
      </div>
      <div class="col-md-4">
        <img src="image/box.jpg" class= "center" alt="">
        <h4><b>EASY RETURNS POLICY</b></h4>
        <p>Return 30 Days<br>
No Policy & Terms</p>
      </div>
       <div class="col-md-4">
        <img src="image/secure.jpg"  class= "center" alt="">
        <h4><b>SECURE PAYMENTS</b></h4>
        <p>100% security<br>
Confirmation system</p>
      </div>
    </div>
  </div>
</div> -->
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
 

 <!-- owl caraousel -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="bxslider/jquery.bxslider.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<script>
  $(document).ready(function(){

    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items:4,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true
    });
    $('.play').on('click',function(){
      owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
    })

  });
</script>
<!-- owl caraousel -->

</body>
</html>