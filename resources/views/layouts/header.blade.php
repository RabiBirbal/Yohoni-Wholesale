<style>
  .btn {
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

}
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

hr {
width: 100%;
height: 5px;
margin-left: auto;
margin-right: auto;
background-color:#0097b2;
border: 0 none;
margin-top: 0;
margin-bottom:0;
}
   .button {
  display: inline-block;
  margin-bottom: 10;
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
  margin-left: 450px;
 /* margin-right: 290px;*/
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

@media screen and (max-width: 600px) {
.my-cart img{
  width: 100%;
      margin-bottom: -65px;
}
.button{
   padding: 2px 10px;
  margin-left: -5px;
  margin-right: -44px;
  top: 190px;
  margin-bottom: -43px
 }
}
.user-login{
  margin-left: 290px;
  margin-top: 15px;
  color: #fff;
}
.fa-user:before {
  content: "\f007";
  color: #fff;
  font-size: 15px;
}
  .xzoom-gallery {
  margin-top: 10px
}

.xzoom {
  margin-top: 40px
}

  </style>
  </style>
  <!-- top-bar -->
  <div class="top-nav" style="background-color: #25a65a">
    <div class="container" style="color: white">
      <div class="row">
        <div class="col-xs-6">
          <h5>Call us: 9813197330 </h5>
        </div>
        <div class="col-xs-6 text-right">
         <h5>LOGIN &nbspREGISTER</h5>
        </div>
      </div>
    </div>
  </div>
  <!-- top bar ends -->
  <div class="my-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
              <a href="/"><img src="/frontend/image/yohoni.jpg" alt="" width="50%" ></a>
            </div>
    <!-- <div class="col-md-4">
  <input type="email" class="form-control news" id="exampleFormControlInput1" placeholder="Search for product">
  </div> -->
            <div class="col-sm-6">
              <a href="{{url('cart/details')}}"><button type="button" class="button button-primary"><strong>My Cart ({{$cart}})</strong></button></a>
            </div>
        </div>
    </div>
</div>
{{-- <div class="logo-text">
   <div class="container">
     <div class="row">
       <div class="col-md-6">
         <a href="/"><img src="/frontend/image/yohoni.jpg" alt="logo" width="50%"></a>
       </div>
       <div class="col-sm-6 text-right">
        <a href="{{url('cart/details')}}"><button type="button" class="button button-primary"><strong>My Cart ({{$cart}})</strong></button></a>
      </div>
       <div class="col-md-6 text-right" style="margin-top: 45px;">
      <a href="{{url('cart/details')}}"><button type="submit" class="button button-primary"><strong>My Cart ({{$cart}})</strong></button></a>
       </div>
     </div>
   </div>
 </div> --}}

	<!-- navbar -->
    <div id="header-area" class="header_area">
        <div class="header_bottom">
            <div class="container">
                <div class="row">
                    <nav role="navigation" class="navbar navbar-default mainmenu">
                <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <!-- Collection of nav links and other content for toggling -->
                        <div id="navbarCollapse" class="collapse navbar-collapse col-md-8">
                            <ul id="fresponsive" class="nav navbar-nav dropdown">
                              <li><a href="{{ url('/') }}">Home</a></li>
                              <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">Category<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  @foreach($category as $data)
                                <li><a href="{{url('products/category/'.Str::slug($data['name']))}}">{{$data->name}}</a>
                         </li>
                         @endforeach
                                </ul>
                                </li>
                                <li><a href="{{ url('/contact_us') }}">Contact Us</a></li>
                                <li><a href="{{ url('/about_us') }}">About Us</a></li>
                            </ul>
                                  <ul id="fresponsive" class="nav navbar-nav dropdown">
                                   
                                    @if(Session::has('user'))
                                      <li class="dropdown"><a data-toggle="dropdown" class="dropdown-toggle">{{ $user->name }}<span class="caret"></span></a>
                                    <ul class="dropdown-menu">
                                      <li><a href="{{url('user/profile')}}">My Profile</a></li>
                                      <li><a href="{{url('user/password/edit')}}">Change Password</a></li>
                                      <li><a href="{{url('orders')}}">My Orders</a></li>
                                      <li><a href="{{url('logout_user')}}">Logout</a></li>
                                    </ul>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                      <a class="nav-link" href="/user_login" ><i class="fas fa-sign-in-alt"></i>&nbsp; Login </a>
                                    </li>
                                     @endif
                                  </ul>
                                </div>
                              </nav>
                        </div>
                </div> 
            </div>            
        </div><!-- /.header_bottom -->
      
    </div>
  <!-- navbar ends -->