<!-- footer -->
<div class="footer text-center">
  <div class="container">
    @if(Session::has('user'))
    <div class="col-md-3">
      <h2 style="color: white">My account</h2>
      <a href="{{ url('user/profile') }}"><span><p>My Profile</p></span></a>
      <a href="{{ url('orders') }}"><span><p>Orders</p></span></a>
       <a href="{{ url('cart/details') }}"><span><p>Shopping Cart</p></span></a>
    </div>
    @else
    <div class="col-md-3">
      <h2 style="color: white">My account</h2>
      <a href="{{ url('user_register') }}"><span><p>Register</p></span> </a>
      <a href="{{ url('user_login') }}"><span><p>Login</p></span></a>
    </div>
    @endif
     <div class="col-md-3">
      <h2 style="color: white">Category</h2>
      @foreach($category as $data)
     <a href="{{url('products/category/'.$data['name'])}}"><span><p>{{$data->name}}</p></span></a>
      @endforeach
    </div>
     <div class="col-md-3">
      <h2 style="color: white">Our Company</h2>
      <a href="/"><span><p>Home</p></span></a>
     <a href="/about_us"><span><p>About</p></span></a>
     <a href="{{url('works')}}"> <span><p>How it works</p></span></a>
     <a href="/contact_us"><span><p>Contact</p></span></a>
    </div>
    <div class="col-md-3">
      <h2 style="color: white">Contact</h2>
      <span><p>Call us: 91319733</p></span>
      <span><p>Email: yohoni@gmail.com</p></span>
       <span><p>Location: CTC Mall</p></span>
           </div>
  </div>
</div>

  

  <!-- copyright -->
  <div class="copyright">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <h6><i class="fa fa-copyright" aria-hidden="true">&nbsp<b>copyright2021 Yohoni Wholesale | All Right Reserved</b></i></h6>
        <a href="http://yohoniads.com/"><p><b>Powered by: Yohoni AD Marketing</b></p></a>
      </div>
    </div>
  </div>
  <!-- copyright ends -->
<!-- footer ends -->

<!-- script starts -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <script src="{{asset('frontend/js/jquery-2.2.2.min.js')}}"></script> -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="{{asset('frontend/js/owl.carousel.min.js')}}"></script>
