<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/favicon.ico" type="image/ico" />

    <title>Dashboard</title>
    @include('/admin/style')
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>

  <body>
        <!-- page content -->
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
        <div class="container-fluid">
            <h2 class="text-center">Welcome To Yohoni Wholesale</h2>
            <h1 class="text-dark text-center pt-2">Admin Login</h1> 
        </div>
        <div class="container-fluid">
        <div class="row justify-content-center">
          <div class="col-12 col-lg-12 col-md-3 col-sm-6"></div>
            <form method="POST" action="admin_login" class="form-container col-lg-4" validate>
                    @csrf
                    @if(Session::get('fail'))
                    <div class="alert alert-danger">
                      {{Session::get('fail')}}
                    </div>
                    @endif
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
        <!-- page content ends -->

        @include('/admin/js')
  <!-- bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
      $("document").ready(function(){
          setTimeout(function(){
             $("div.alert-success").remove();
          }, 2000 ); // 5 secs      
      });
      setTimeout(function(){
             $("div.alert-danger").remove();
          }, 2000 ); // 5 secs  
    </script>
  </body>
</html>
