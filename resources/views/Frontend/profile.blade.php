<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Profile</title>
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
        <h1>My Profile <a href="{{ url('user/profile/edit') }}"><button class="btn btn-primary">Edit Profile</button></a></h1> 
        
        <hr>
        <div class="row" style="margin-top: 15px;">
            <div class="col-md-6" style="margin: 5px;">
                <div class="col-md-4 mb-3">
                    <span><h3>Name: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="name" value="{{ $user['name'] }}" readonly></h3>
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Email: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="email" value="{{ $user['email'] }}" readonly></h3>
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Phone: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="phone" value="{{ $user['mobile'] }}" readonly></h3>
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Address: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="address" value="{{ $user['address'] }}" readonly></h3>
                </div>
                <div class="col-md-4 mb-3">
                    <span><h3>Account Created: </h3></span>
                </div>
                <div class="col-md-8  mb-3">
                    <h3><input type="text" name="date" value="{{ $user['created_at'] }}" readonly></h3>
                </div>
            </div>
        </div>
        
    </div>

<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->
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