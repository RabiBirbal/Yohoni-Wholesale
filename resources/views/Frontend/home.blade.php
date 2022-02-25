<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home Page</title>
  @include('/frontend/style')
  <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style0.css')}}">
	<style>
 
    @media screen and (max-width: 600px) {
      .btn{
        margin-left: 108px;
      }
      .form-control{
        margin-left: auto;
        margin-right: auto;
        display: block;
        margin-bottom: 100px;
      }
      .button{
        margin-top: 50px;
      }
      }
    
    .btn-primary {
        color: #000;
     /*   background-color: #337ab7;*/
        border: solid #b5092e;
    }
    .btn-primary:hover{
      background: #089cb7;
      border: solid #089cb7;
    }
    
    
     .button {
        display: inline-block;
        margin-bottom: 0;
        font-weight: 400;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        -ms-touch-action: manipulation;
        touch-action: manipulation;
        cursor: pointer;
        background-image: none;
        border: 1px solid transparent;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        border-radius: 4px;
        margin-left: 90px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;/*
     */   background: #ffffffff;
        margin-top: 50px;
    
    }
    .button-primary {
        color: #000;
     /*   background-color: #337ab7;*/
        border: solid #b5092e;
    }
    .button-primary:hover{
      background: #089cb7;
      border: solid #089cb7;
    }
    
    img{
      margin-bottom: 15px;
    }
    
    </style>
</head> 
<body>
  @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible alert-block" role="alert">
      <button type="button" class="close" data-dismiss="alert">X</button>
      <strong><i class="fas fa-check-circle"></i> Success!! {{Session('success')}}</strong>
      {{ Session::forget('success'); }}
    </div>
    @elseif(Session::has('error'))
      <div class="alert alert-error alert-dismissible alert-block" role="alert">
        <button type="button" class="close" data-dismiss="alert">X</button>
        <strong><i class="fas fa-check-circle"></i> Error!! {{Session('error')}}</strong>
        {{ Session::forget('error'); }}
      </div>
   @endif 
  <!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>

<!-- slider -->


<div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <!-- <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
   
  </ol> -->

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
  
  @foreach($banner as $banner_data)
    <div class="item {{$loop->first ? 'active':'' }}">
      <img src="upload/images/{{$banner_data->banner_image}}" alt="banner"  width="100%">
    </div>
    @endforeach
      <!-- <div class="item ">
       <img src="/frontend/image/funiture-01.jpg" alt="Chania"  width="100%" alt="Chania"  width="100%">
    </div>

    <div class="item">
      <img src="/frontend/image/purifier-01.jpg" alt="Flower" width="100%">
    </div> -->

  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- slider ends -->
<div class="product-search">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <input type="text" class="form-control news" id="exampleFormControlInput1" placeholder="Search for product">
 
      </div>
    </div>
  </div>
</div>

<!-- icon of product -->
<div class="icon">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
       <a href="{{ url('products/category/Home Appliance') }}"> <img src="/frontend/image/home appliance.png" alt="" class="center"></a>
        <p>Home Appliances</p>

      </div>
      <div class="col-md-2">
       <a href="{{ url('products/category/Furniture') }}"> <img src="/frontend/image/furniture.png" alt="" class="center"></a>
        <p>Furniture</p>
      </div>
       <div class="col-md-2">
        <a href="{{ url('products/category/Electric') }}"><img src="/frontend/image/electric.png" alt="" class="center"></a>
        <p>Electric</p>
      </div>
      <div class="col-md-2">
        <a href="{{ url('products/category/Clothing') }}"><img src="/frontend/image/clothing.png" alt="" class="center"></a>
        <p>Clothing</p>
      </div>
       <div class="col-md-2">
       <a href="{{ url('products/category/Mobile') }}"> <img src="/frontend/image/mobile phone.png" alt="" class="center"></a>
        <p>Mobile</p>
      </div>
      <div class="col-md-2">
       <a href="{{ url('products/category/Footwear') }}"><img src="/frontend/image/footwears.png" alt="" class="center"></a>
        <p>Footwear</p>
      </div>
    </div>
  </div>
</div >
<!-- icon of product ends -->



<!-- product -->
<div class="product">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1><b>Best products directly to your door with  delivery!!</b></h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          <a href="about_us"> <button type="button" class="btn btn-primary">See more...</button></a>

          
        
      </div>
      <div class="col-md-6">
        @foreach($banner1 as $data)
        <img src="upload/images/{{$data->banner_image}}" alt="banner" class="center" >
        @endforeach
      </div>
    </div>
  </div>
</div>

<!-- product ends -->



<!-- 
<div class="best-product">
<img src="image/best product.jpg" alt="" width="100%" >
</div>
 -->





<!-- home appliance -->
<div class="container appliances">
  <div class="row">
    <div class="col-md-10">
    <h1><b>Home Appliances</b></h1>
  </div>
  <div class="col-md-2">
   <a href="{{ url('products/category/Home Appliance') }}"><h4>view all</h4></a>
  </div>
    </div>
</div>
<div class="container">
  <div class="row product-feature">
    @foreach($home_appliances as $data)
    <div class="col-md-3 items">
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}">
      @if($data->offer != null)
      <span class="badge" style="background-color: yellow; color: red;">{{$data->offer}}</span>
      @endif
      @if($data->product_quantity <= '0')
      <span class="badge" style="margin-left: 60%; background-color: red;">Out Of Stock</span>
      @else
      <span class="badge" style="margin-left: 60%; background-color: green;">In Stock</span>
      @endif
      <img src="{{asset('upload/images/'.$data->product_image)}}" alt="" width="200px" class="center">
      <p>{{$data->name}}</p>
      <h5>Rs. {{$data->price}}  <s>{{$data->previous_price}}</s></h5></a>
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}"><button class="btn btn-primary">View More</button></a>
      
    </div>
    @endforeach
  </div>
</div>
<!-- home appliance ends -->



<!-- electircal -->
<div class="container appliances">
  <div class="row">
    <div class="col-md-10">
    <h1><b>Electrical</b></h1>
  </div>
  <div class="col-md-2">
   <a href="{{ url('products/category/Electric') }}"><h4>view all</h4></a>
  </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row product-feature">
    @foreach($electric as $data)
    <div class="col-md-3 items">
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}">
        @if($data->offer != null)
      <span class="badge" style="background-color: yellow; color: red;">{{$data->offer}}</span>
      @endif
      @if($data->product_quantity <= '0')
      <span class="badge" style="margin-left: 60%; background-color: red;">Out Of Stock</span>
      @else
      <span class="badge" style="margin-left: 60%; background-color: green;">In Stock</span>
      @endif
      <img src="{{asset('upload/images/'.$data->product_image)}}" alt="" width="200px" class="center">
      <p>{{$data->name}}</p>
      <h5><b>Rs. {{$data->price}}  <s>{{$data->previous_price}}</s></b></h5></a>
        <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}"><button class="btn btn-primary">View More</button></a>
    </div>
    @endforeach
  </div>
</div>
<!-- product feature ends -->



<!-- mobile gadgets -->
<div class="container appliances">
  <div class="row">
    <div class="col-md-10">
    <h1><b>Mobile Phone Gadgets</b></h1>
  </div>
  <div class="col-md-2">
   <a href="{{ url('products/category/Mobile') }}"><h4>view all</h4></a>
  </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row product-feature">
    @foreach($mobile as $data)
    <div class="col-md-3 items">
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}">
        @if($data->offer != null)
      <span class="badge" style="background-color: yellow; color: red;">{{$data->offer}}</span>
      @endif
      @if($data->product_quantity <= '0')
      <span class="badge" style="margin-left: 60%; background-color: red;">Out Of Stock</span>
      @else
      <span class="badge" style="margin-left: 60%; background-color: green;">In Stock</span>
      @endif
      <img src="{{asset('upload/images/'.$data->product_image)}}" alt="" width="200px" class="center">
      <p>{{$data->name}}</p>
      <h5><b>Rs. {{$data->price}}  <s>{{$data->previous_price}}</s></b></h5></a>
        <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}"><button class="btn btn-primary">View More</button></a>
    </div>
    @endforeach
  </div>
</div>
<!-- mobile gadget ends -->



<!-- footwears -->
<div class="container appliances">
  <div class="row">
    <div class="col-md-10">
    <h1><b>Footwears</b></h1>
  </div>
  <div class="col-md-2">
   <a href="{{ url('products/category/Footwear') }}"><h4>view all</h4></a>
  </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row product-feature">
    @foreach($footwear as $data)
    <div class="col-md-3 items">
      @if($data->offer != null)
      <span class="badge" style="background-color: yellow; color: red;">{{$data->offer}}</span>
      @endif
      @if($data->product_quantity <= '0')
      <span class="badge" style="margin-left: 60%; background-color: red;">Out Of Stock</span>
      @else
      <span class="badge" style="margin-left: 60%; background-color: green;">In Stock</span>
      @endif
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}">
      <img src="{{asset('upload/images/'.$data->product_image)}}" alt="" width="200px" class="center">
      <p>{{$data->name}}</p>
      <h5><b>Rs. {{$data->price}}  <s>{{$data->previous_price}}</s></b></h5></a>
        <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}"><button class="btn btn-primary">View More</button></a>
    </div>
    @endforeach
  </div>
</div>
<!-- footwears ends -->



<!-- clothing -->
<div class="container appliances">
  <div class="row">
    <div class="col-md-10">
    <h1><b>Clothing</b></h1>
  </div>
  <div class="col-md-2">
   <a href="{{ url('products/category/Clothing') }}"><h4>view all</h4></a>
  </div>
    </div>
  </div>
</div>
<div class="container">
  <div class="row product-feature">
    @foreach($clothing as $data)
    <div class="col-md-3 items">
      @if($data->offer != null)
      <span class="badge" style="background-color: yellow; color: red;">{{$data->offer}}</span>
      @endif
      @if($data->product_quantity <= '0')
      <span class="badge" style="margin-left: 60%; background-color: red;">Out Of Stock</span>
      @else
      <span class="badge" style="margin-left: 60%; background-color: green;">In Stock</span>
      @endif
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}">
      <img src="{{asset('upload/images/'.$data->product_image)}}" alt="" width="200px" class="center">
      <p>{{$data->name}}</p>
      <h5><b>Rs. {{$data->price}}  <s>{{$data->previous_price}}</s></b></h5></a>
        <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}"><button class="btn btn-primary">View More</button></a>
    </div>
    @endforeach
  </div>
</div>
<!-- clothing ends -->


<!-- how it works -->

<!-- <div class="work"> 
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h1><b>How it works??</b></h1>
      </div>
    </div>
  </div>
</div>

<div class="work-about">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="image/map.png" alt="" class="center">
        <p>Create an account</p>
      </div>
       <div class="col-md-4">
        <img src="image/cart.png" alt="" class="center">
        <p>Selects product you want to buy </p>
      </div>
       <div class="col-md-4">
        <img src="image/car.png" alt="" class="center">
        <p>We will deliver your shopping to your door</p>
      </div>
    </div>
  </div>
</div> -->
<!-- how it works ends -->




<!-- details -->
<div class="detail">
  <div class="container">
    <div class="row">
      <div class="col-md-4">
        <img src="/frontend/image/reward.jpg"  class= "center" alt="">
        <h4><b>BEST PRICES & OFFERS</b></h4>
        <p>Get 20% extra<br>
Exclusive Deal</p>
      </div>
      <div class="col-md-4">
        <img src="/frontend/image/box.jpg" class= "center" alt="">
        <h4><b>EASY RETURNS POLICY</b></h4>
        <p>Return 30 Days<br>
No Policy & Terms</p>
      </div>
       <div class="col-md-4">
        <img src="/frontend/image/secure.jpg"  class= "center" alt="">
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


<!-- navbar -->
<script>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
</script>

<script>
  $("document").ready(function(){
      setTimeout(function(){
         $("div.alert-success").remove();
      }, 2000 ); // 5 secs    
      setTimeout(function(){
         $("div.alert-error").remove();
      }, 2000 ); // 5 secs 
  });
</script>
</body>
</html>