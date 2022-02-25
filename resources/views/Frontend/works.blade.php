<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>How it works</title>
	@include('/frontend/style')
<style>
  hr {
  width: 100%;
  height: 10px;
  margin-left: auto;
  margin-right: auto;
  background-color:#0097b2;
  border: 0 none;
  margin-top: 0;
  margin-bottom:0;
}
</style>
</head>
<body>

<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>
<div class="container">
	<div class="row">
		<div class="how-it-work clearfix">
        		<div class="main-how-it">
        			<h4> Follow <span class="bg-theme"> Steps</span> </h4>
        		</div>
	    		<div class="panel panel-default col-sm-10 col-sm-offset-2">
				  <div class="panel-body">
				  	<span> 1 </span> <h3 class="step-heading"> Step 1 </h3>
				    Select your category and ask any question related to it.
				  </div>
				</div>       	

	    		<div class="panel panel-default col-sm-10 col-sm-offset-2">
				  <div class="panel-body">
				  	<span> 2 </span> <h3 class="step-heading"> Step 2 </h3>
				    Connect with an Expert related to your question. The licensed professionals are confirmed by a third-party verification firm. 
				  </div>
				</div>
	    	
	    		<div class="panel panel-default col-sm-10 col-sm-offset-2">
				  <div class="panel-body">
				  	<span> 3 </span> <h3 class="step-heading"> Step 3 </h3>
				    Get your answer within a min. Although, sometimes it may take a little longer to answer your question because of the solution it provides could be a little tricky or lengthy. 
				  </div>
				</div>
	    	
	    		<div class="panel panel-default col-sm-10 col-sm-offset-2">
				  <div class="panel-body">
				  	<span> 4 </span> <h3 class="step-heading"> Step 4 </h3>
				    Don’t forget to give rating to your expert. We need the ratings to keep a track of your satisfaction level and experience with us and of course to improve ourselves. 
				  </div>
				</div>
	        	
	        </div>
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



</body>
</html>