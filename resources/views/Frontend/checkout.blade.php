<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Check Out</title>
  @include('/frontend/style')
</head>
<body>

<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>

<div class="container">
  <form action="{{url('order')}}" method="post" class="was-validated" onsubmit="return alert('Product has been added Successfully!!')">
    @csrf
  <div class="row">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2>Basic Details</h2>
          <hr>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label for="fullname">Full Name: </label>
              <input type="text" class="form-control" name="fullname" value="{{Session::get('user')['name']}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
              <label for="phone">Phone Number: </label>
              <input type="text" class="form-control" name="phone" value="{{Session::get('user')['mobile']}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
              <label for="email">Email: </label>
              <input type="email" class="form-control" name="email" value="{{Session::get('user')['email']}}" readonly>
            </div>
            <div class="col-md-6 mb-3">
              <label for="delivery_address">Delivery Address: </label>
              <input type="text" class="form-control" name="delivery_address" placeholder="Enter Delivery Address" required>
            </div>
            <div class="col-md-12 mb-3">
              <label for="map">Google Map Coordinates of Delivery Address: </label>
              <input type="text" class="form-control" name="map" placeholder="eg. 41.40338, 2.17403" required>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-body">
          <h2>Order Details</h2>
          <hr>
          <table class="table table-striped">
            <thead class="thead-dark">
              <tr>
                <td>Image</td>
                <td>Product</td>
                <td>Size</td>
                <td>Quantity</td>
                <td>Price</td>
                <td>Total</td>
              </tr>
            </thead>
            <tbody>
              @foreach($cartItem as $data)
              <input type="hidden" name="product_id" name="product_id" value="{{$data->products->id}}">
              <input type="hidden" name="product_quantity" name="product_quantity" value="{{$data->quantity}}">
              <input type="hidden" name="size" name="size" value="{{$data->size}}">
              <tr>
                <td><img src="{{asset('upload/images/'.$data->products->product_image)}}" alt="product_image" height="50px"></td>
                <td>{{$data->products->name}}</td>
                <td>{{$data->size}}</td>
                <td>{{$data->quantity}}</td>
                <td>Rs. {{$data->products->price}} /-</td>
                <td>Rs. {{$data->total}} /-</td>
              </tr>
              @endforeach
            </tbody>
            </table>
          <div class="text-right">
            <strong>Total Bill To Pay (Rs): <input type="text" class="text-right form-control" name="totalBill" value="{{$totalBill}}" readonly></strong>
          </div>
          <hr>
          <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure want to continue?')">Place Order</button>
        </div>
      </div>
    </div>
  </div>
  </form>
</div>


<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->
 

 <!-- owl caraousel -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="bxslider/jquery.bxslider.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

</body>
</html>