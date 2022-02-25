<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Change Password</title>
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
<!-- <form action="{{url('order')}}" method="post"> -->
    <div class="container-fluid right_col" role="main" style="margin-left: 10px">
        <h1>Change Password</h1>
        <hr>
        <form action="{{ url('/user/password/update') }}" method="post" class="was-validated">
            @csrf
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-6" style="margin: 5px;">
                <div class="col-md-6 mb-3">
                    <span><h3>Current Password: </h3></span>
                </div>
                <div class="col-md-6  mb-3">
                    <h3><input type="password" name="current_password" placeholder="Current Password" id="current_password" class="form-control @error('current_password') is-invalid @enderror"  required autofocus></h3>
                </div>
                <div class="col-md-6 mb-3">
                    <span><h3>New Password: </h3></span>
                </div>
                <div class="col-md-6  mb-3">
                    <h3><input type="password" name="new_password" placeholder="New Password" id="new_password" class="form-control @error('new_password') is-invalid @enderror"  required autofocus></h3>
                    <div id="showErrorpswd"></div>
                    @error('new_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <span><h3>Confirm Password: </h3></span>
                </div>
                <div class="col-md-6  mb-3">
                    <h3><input type="password" name="confirm_password" placeholder="Confirm Password" id="confirm_password" class="form-control @error('name') is-invalid @enderror"  required autofocus></h3>
                    <div id="showErrorcpswd"></div>
                    @error('confirm_password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to continue?')">Update</button>
            </div> 
        </div>
    </div>
</form>
    </div>
<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->

<script type="text/javascript">
    $(document).ready(function(){

      $('#new_password').keyup(function(){
        var password=$('#new_password').val();
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
    $('#confirm_password').keyup(function(){
            var password=$('#new_password').val();
            var cpassword=$('#confirm_password').val();

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