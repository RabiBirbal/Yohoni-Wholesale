<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit Profile</title>
  @include('/frontend/style')
</head>
<body>

<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>
<!-- <form action="{{url('order')}}" method="post"> -->
    <div class="container-fluid right_col" role="main" style="margin-left: 10px">
        <h1>Edit Profile</h1>
        <hr>
        <form action="{{ url('/user/profile/update') }}" method="post" class="was-validate">
            @csrf
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-6" style="margin: 5px;">
                <div class="col-md-4 mb-3">
                    <span><h3>Full Name: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="name" id="name" value="{{ $user['name'] }}" placeholder="Your Full Name" class="form-control" autofocus required></h3>
                    <div id="showErrorName"></div>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Email: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="email" name="email" id="email" value="{{ $user['email'] }}" placeholder="Your Email" class="form-control" autofocus required></h3>
                    <div id="showErrorEmail"></div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Phone: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="mobile" id="mobile" value="{{ $user['mobile'] }}" placeholder="Your Mobile Number" class="form-control" autofocus required></h3>
                    <div id="showErrorPhone"></div>
                        @error('mobile')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Address: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="address" id="address" value="{{ $user['address'] }}" placeholder="Your Address" class="form-control" autofocus required></h3>
                </div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to continue?')">Update</button>
            </div> 
        </div>
    </div>
</form>
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

</body>
</html>