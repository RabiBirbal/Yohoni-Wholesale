<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Products</title>
  @include('/frontend/style')

</head>
<body>
    <!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>

 <div id="wrapper">
        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav nav-pills nav-stacked" id="menu">
 
                <!-- <li class="active">
                    <a href="#"><span class="fa-stack fa-lg pull-left"><i class="fa fa-dashboard fa-stack-1x "></i></span> Dashboard</a>
                       <ul class="nav-pills nav-stacked" style="list-style-type:none;">
                        <li><a href="#">link1</a></li>
                        <li><a href="#">link2</a></li>
                    </ul>
                </li> -->
                <li>
                    <a href="{{url('products/category/'.Str::slug($category1['name']))}}"><span class="fa-stack fa-lg pull-left"></span><b>All {{$category1->name}}</b></a>
                </li>
                @foreach($subcategory as $data)
                <li>
                    <a href="{{url('products/subcategory/'.Str::slug($data['name']))}}"><span class="fa-stack fa-lg pull-left"></span>{{$data->name}}</a>
                </li>
                @endforeach
                
                 
            </ul>
        </div><!-- /#sidebar-wrapper -->



<!-- cloth -->
<!-- <div class="container appliances">
  <div class="row">
    <div class="col-md-10">
    <h1><b>Furniture</b></h1>
  </div>
    </div>
</div> -->
<div class="container">
  <div class="row cloth-feature">
    @foreach($products as $data)
    <div class="col-md-3 items" style="margin-bottom: 30px;">
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
      <h5><b>Rs. {{$data->price}}  <s>{{$data->previous_price}}  </s></b></h5></a>
      <a href="{{asset('product/'.Str::slug($data['name']).'/id='.$data['id'])}}"><button class="btn btn-primary">View More</button></a>
    </div>
    @endforeach
    
  </div>
</div>
</div>
<!-- cloth ends -->


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


</body>
</html>