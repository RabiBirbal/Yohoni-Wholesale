<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Contact us</title>
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
<!-- contact -->
<div class="contact-us">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h1>Contact us</h1>
      </div>
    </div>
  </div>
</div>
<!-- contact ends -->

<!-- google map -->
<div class="google-map">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <iframe src="https://www.google.com/maps/embed?pb=!1m28!1m12!1m3!1d3532.6222419214914!2d85.31065701510683!3d27.698068082795793!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m13!3e6!4m5!1s0x39eb1853425fd67b%3A0x70604f354eadbfba!2sChina%20Town%20Rd%2C%20Kathmandu%2044600!3m2!1d27.698308899999997!2d85.31245899999999!4m5!1s0x39eb1981be77a867%3A0x1de926e1d48a55ce!2sctc%20mall!3m2!1d27.697834!2d85.31312609999999!5e0!3m2!1sen!2snp!4v1639913348144!5m2!1sen!2snp" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- google map ends -->


<!-- contact form -->
<div class="contact-form">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h2>Drop your message!!</h2>
        <form action="contact_us" method="POST" enctype="multipart/form-data" class="was-validated text-dark">
          @csrf
          <div class="form-group">
            @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible alert-block" role="alert">
                      <button type="button" class="close" data-dismiss="alert">X</button>
                      <strong><i class="fas fa-check-circle"></i> Success!! {{Session('success')}}</strong>
                    </div>
                    @endif 
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
        </div>
        
        <div class="form-group">
          <label for="message">Message</label>
          <textarea class="form-control" name="message" id="message" rows="3" placeholder="Write Your Message Here......." required></textarea>
            
        </div>
        <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to continue?')">Submit</button>
      </form>
      </div>
      <div class="col-md-6">
       <h3>Get in touch!!</h3>
       <span><p>Call us: 91319733</p></span>
      <span><p>Email: yohoni@gmail.com</p></span>
       <span><p>Location: Kathmandu</p></span>
      </div>
    </div>
  </div>
</div>
<!-- contact form ends -->



<!-- details -->
<div class="detail">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="frontend/image/reward.jpg"  class= "center" alt="">
        <h4><b>BEST PRICES & OFFERS</b></h4>
        <p>Get 20% extra<br>
Exclusive Deal</p>
      </div>
      <div class="col-md-4">
        <img src="frontend/image/box.jpg" class= "center" alt="">
        <h4><b>EASY RETURNS POLICY</b></h4>
        <p>Return 30 Days<br>
No Policy & Terms</p>
      </div>
       <div class="col-md-4">
        <img src="frontend/image/secure.jpg"  class= "center" alt="">
        <h4><b>SECURE PAYMENTS</b></h4>
        <p>100% security<br>
Confirmation system</p>
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
<!-- footer ends -->
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
</body>
</html>