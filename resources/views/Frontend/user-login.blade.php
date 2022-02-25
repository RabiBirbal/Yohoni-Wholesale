<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>User Login</title>
    @include('/frontend/style')
    <style>
      /* STRUCTURE */
      
      .wrapper {
        display: flex;
        align-items: center;
        flex-direction: column; 
        justify-content: center;
        width: 100%;
        min-height: 100%;
        padding: 20px;
      }
      
      #formContent {
        -webkit-border-radius: 10px 10px 10px 10px;
        border-radius: 10px 10px 10px 10px;
        background: #fff;
        padding: 30px;
        width: 90%;
        max-width: 450px;
        position: relative;
        padding: 0px;
        -webkit-box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
        box-shadow: 0 30px 60px 0 rgba(0,0,0,0.3);
        text-align: center;
      }
      
      #formFooter {
        background-color: #f6f6f6;
        border-top: 1px solid #dce8f1;
        padding: 25px;
        text-align: center;
        -webkit-border-radius: 0 0 10px 10px;
        border-radius: 0 0 10px 10px;
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
      
      /* TABS */
      /*
      h2.inactive {
        color: #cccccc;
      }
      
      h2.active {
        color: #0d0d0d;
        border-bottom: 2px solid #5fbae9;
      }
      */
      
      
      /* FORM TYPOGRAPHY*/
      
      input[type=button], input[type=submit], input[type=reset]  {
        background-color: #56baed;
        border: none;
        color: white;
        padding: 15px 80px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        text-transform: uppercase;
        font-size: 13px;
        -webkit-box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
        box-shadow: 0 10px 30px 0 rgba(95,186,233,0.4);
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
        margin: 5px 20px 40px 20px;
        -webkit-transition: all 0.3s ease-in-out;
        -moz-transition: all 0.3s ease-in-out;
        -ms-transition: all 0.3s ease-in-out;
        -o-transition: all 0.3s ease-in-out;
        transition: all 0.3s ease-in-out;
      }
      
      input[type=button]:hover, input[type=submit]:hover, input[type=reset]:hover  {
        background-color: #39ace7;
      }
      
      input[type=button]:active, input[type=submit]:active, input[type=reset]:active  {
        -moz-transform: scale(0.95);
        -webkit-transform: scale(0.95);
        -o-transform: scale(0.95);
        -ms-transform: scale(0.95);
        transform: scale(0.95);
      }
      
      input[type=password] {
        background-color: #f6f6f6;
        border: none;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        width: 85%;
        border: 2px solid #f6f6f6;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
      }
      
      input[type=password]:focus {
        background-color: #fff;
        border-bottom: 2px solid #5fbae9;
      }
      
      input[type=password]:placeholder {
        color: #cccccc;
      }
      input[type=email] {
        background-color: #f6f6f6;
        border: none;
        color: #0d0d0d;
        padding: 15px 32px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 5px;
        width: 85%;
        border: 2px solid #f6f6f6;
        -webkit-transition: all 0.5s ease-in-out;
        -moz-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
        -o-transition: all 0.5s ease-in-out;
        transition: all 0.5s ease-in-out;
        -webkit-border-radius: 5px 5px 5px 5px;
        border-radius: 5px 5px 5px 5px;
      }
      
      input[type=text]:focus {
        background-color: #fff;
        border-bottom: 2px solid #5fbae9;
      }
      input[type=email]:focus {
      background-color: #fff;
      border-bottom: 2px solid #5fbae9;
    }

    input[type=email]:placeholder {
      color: #cccccc;
    }
      
      
      /* ANIMATIONS */
      
      /* Simple CSS3 Fade-in-down Animation */
      .fadeInDown {
        -webkit-animation-name: fadeInDown;
        animation-name: fadeInDown;
        -webkit-animation-duration: 1s;
        animation-duration: 1s;
        -webkit-animation-fill-mode: both;
        animation-fill-mode: both;
      }
      
      @-webkit-keyframes fadeInDown {
        0% {
          opacity: 0;
          -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
        }
        100% {
          opacity: 1;
          -webkit-transform: none;
          transform: none;
        }
      }
      
      @keyframes fadeInDown {
        0% {
          opacity: 0;
          -webkit-transform: translate3d(0, -100%, 0);
          transform: translate3d(0, -100%, 0);
        }
        100% {
          opacity: 1;
          -webkit-transform: none;
          transform: none;
        }
      }
      
      /* Simple CSS3 Fade-in Animation */
      @-webkit-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
      @-moz-keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
      @keyframes fadeIn { from { opacity:0; } to { opacity:1; } }
      
      .fadeIn {
        opacity:0;
        -webkit-animation:fadeIn ease-in 1;
        -moz-animation:fadeIn ease-in 1;
        animation:fadeIn ease-in 1;
      
        -webkit-animation-fill-mode:forwards;
        -moz-animation-fill-mode:forwards;
        animation-fill-mode:forwards;
      
        -webkit-animation-duration:1s;
        -moz-animation-duration:1s;
        animation-duration:1s;
      }
      
      .fadeIn.first {
        -webkit-animation-delay: 0.4s;
        -moz-animation-delay: 0.4s;
        animation-delay: 0.4s;
      }
      
      .fadeIn.second {
        -webkit-animation-delay: 0.6s;
        -moz-animation-delay: 0.6s;
        animation-delay: 0.6s;
      }
      
      .fadeIn.third {
        -webkit-animation-delay: 0.8s;
        -moz-animation-delay: 0.8s;
        animation-delay: 0.8s;
      }
      
      .fadeIn.fourth {
        -webkit-animation-delay: 1s;
        -moz-animation-delay: 1s;
        animation-delay: 1s;
      }
      
      /* Simple CSS3 Fade-in Animation */
      .underlineHover:after {
        display: block;
        left: 0;
        bottom: -10px;
        width: 0;
        height: 2px;
        background-color: #56baed;
        content: "";
        transition: width 0.2s;
      }
      
      .underlineHover:hover {
        color: #0d0d0d;
      }
      
      .underlineHover:hover:after{
        width: 100%;
      }
      
      
      
      /* OTHERS */
      
      *:focus {
          outline: none;
      } 
      
      #icon {
        width:20%;
      }
      
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
            <div class="alert alert-danger alert-dismissible alert-block" role="alert">
              <button type="button" class="close" data-dismiss="alert">X</button>
              <strong><i class="fas fa-check-circle"></i> Error!! {{Session('error')}}</strong>
              {{ Session::forget('error'); }}
            </div>
          @endif 
        <!-- page content -->
        <!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->

 
<hr>
 <!-- page content -->
 <!-- contact -->


<div class="contact">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="wrapper fadeInDown">
               <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="/frontend/image/logo1.png" id="icon" alt="User Icon" />
     
    </div>

    <!-- Login Form -->
    <form method="POST" action="user_login" class="was-validated">
      @csrf
      <input type="email" id="email" class="fadeIn second" name="email" placeholder="Email Address" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="Password" required>
       <a href="{{url('user_register')}}"><p>Don't have an account</p></a>
      <input type="submit" class="fadeIn fourth" value="Log In">
      <a href="{{ route('password.request') }}"><p>Forgot Password</p></a>
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="http://yohoniads.com/">Go to the Site</a>
    </div>

  </div>
</div>
      </div>
     

    </div>
  </div>
</div>
<!-- contact ends -->
 {{-- <div class="container-fluid justify-content-center">
  <h2 class="text-center">Welcome To Yohoni Wholesale</h2>
  <h1 class="text-dark text-center pt-2">User Login</h1> 
  <div class="row" style="margin-left: 32%">
  <div class="col-md-12">
    <form method="POST" action="user_login" class="col-md-6" validate>
            @csrf
            
      <div class="mb-3">
        <label for="email" class="form-label">Email Address</label>
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
        @error('email')
            <span class="text-danger" style="font-size: 18px">
                {{$errors->first('email')}}
            </span>
        @enderror
      </div>
      <!-- <div class="mb-3">
        <label for="uname" class="form-label">Username</label>
        <input type="text" class="form-control" name="uname" id="uname" required="">
      </div> -->
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
        @error('password')
            <span class="text-danger" style="font-size: 18px">
                {{$errors->first('password')}}
            </span>
        @enderror
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>Remember me</label>
      </div>
      <div class="mb-3">
        <a href="{{url('user_register')}}" class="btn btn-link">Dont have an account?</a>
      </div>
      
      <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary btn-block">
                            {{ __('Login') }}
                        </button>

                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                    </div>
                </div>
    </form>
  </div>
  </div>
</div> --}}
<!-- page content ends -->

<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->

<script>
  $("document").ready(function(){
      setTimeout(function(){
         $("div.alert-success").remove();
      }, 2000 ); // 5 secs    
      setTimeout(function(){
         $("div.alert-danger").remove();
      }, 2000 ); // 5 secs 
  });
</script>
  </body>
</html>