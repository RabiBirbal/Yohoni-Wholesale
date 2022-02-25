<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Registration</title>
  @include('/frontend/style')

</head>
<body>
     <!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->

 
<hr>
 <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card ml-auto">
                <div class="card-header"><h1>User Registration</h1></div>
                <hr>
                @if (Session::has('error'))
                    <div class="alert alert-info">{{ Session::get('error') }}</div>
                    {{ Session::forget('error'); }}
                @endif  
                <div class="card-body">
                    <form method="POST" action="{{ route('userRegister') }}" class="was-validated">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name </label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" autocomplete="name" required autofocus>
                                <div class="invalid-feedback">**Please fill out this field.</div>
                                <span style="color: red;">@error('name'){{$message}}@enderror </span>
                                <div id="showErrorName"></div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>

                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required>
                                <div class="invalid-feedback">**Please fill out this field.</div>
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="new-password" required>

                                <div class="invalid-feedback">**Please fill out this field.</div>
                                <span style="color: red;">@error('pswd'){{$message}}@enderror </span>
                                <div id="showErrorpswd"></div>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Confirm Password</label>

                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" required>
                                <div class="invalid-feedback">**Please fill out this field.</div>
                                <span style="color: red;">@error('cpswd'){{$message}}@enderror </span>
                                <div id="showErrorcpswd"></div>
                                
                        </div>
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address </label>

                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"autocomplete="address" autofocus required>
                                <div class="invalid-feedback">**Please fill out this field.</div>
                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>

                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">Mobile No. </label>

                                <input id="mobile" type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" value="{{ old('mobile') }}" autocomplete="mobile" autofocus required>
                                <div class="invalid-feedback">**Please fill out this field.</div>
                                <span style="color: red;">@error('phone'){{$message}}@enderror </span>
                                <div id="showErrorPhone"></div>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="row mb-3">
                          <a href="/user_login" class="btn">Already have an account?</a>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->

<script type="text/javascript">
          $(document).ready(function(){
            $('#mobile').keyup(function(){
              var mobile=$('#mobile').val();
              if(isNaN(mobile)){
                $('#showErrorPhone').html('Mobile number must be a number');
                 $('#showErrorPhone').css('color','red');
                return false;
              }
              else if(mobile.length!=10){
                $('#showErrorPhone').html('Phone number must be of 10 characters');
                 $('#showErrorPhone').css('color','red');
                 return false;
              }
              else{
                $('#showErrorPhone').html('');
                return true;
              }
            });

            $('#name').keyup(function(){
              var name=$('#name').val();
              var pattern = /^[A-Za-z ]+$/;
              if(!pattern.test(name)){
                $('#showErrorName').html('Full Name should not contain Number');
                $('#showErrorName').css('color','red');
                return false;
              }
              else{
                $('#showErrorName').html('');
                return true;
              }
            });
          });
        </script>
        <script type="text/javascript">
          $(document).ready(function(){

            $('#password').keyup(function(){
              var password=$('#password').val();
              if(password.length>15){
                $('#showErrorpswd').html('Password must be less than 16 characters');
                 $('#showErrorpswd').css('color','red');
                 return false;
              }
              else if(password.length<6){
                $('#showErrorpswd').html('Password must be greater than 6 characters');
                 $('#showErrorpswd').css('color','red');
                 return false;
              }
              else{
                $('#showErrorpswd').html('');
                 return true;
              }
            });
          });
        </script>
        <script type="text/javascript">
          $('#password_confirmation').keyup(function(){
                  var password=$('#password').val();
                  var cpassword=$('#password_confirmation').val();

                  if(cpassword!=password){
                    $('#showErrorcpswd').html('Password didn not matched');
                     $('#showErrorcpswd').css('color','red');
                     return false;
                  }
                  else{
                    $('#showErrorcpswd').html('');
                     return true;
                  }
                });
        </script>

         <script>
        $("document").ready(function(){
            setTimeout(function(){
               $("div.alert-info").remove();
            }, 2000 ); // 5 secs    
        });
    </script>

</body>
</html>