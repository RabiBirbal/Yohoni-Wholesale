<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Orders</title>
  @include('/frontend/style')
</head>
<body>

<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>
<!-- <form action="{{url('order')}}" method="post"> -->
    <div class="container-fluid" style="margin: 10px">
    <div class="right_col" role="main">
        <div class="text-right">
          <a href="{{url('order/details/'.$order['id'].'/pdf')}}" target="_blank"><button class="btn btn-primary"><i class="fas fa-print"></i> PDF</button></a>
        </div>
      <h1>Customer Detail</h1>
        <hr>
        <table class="table table-hover text-dark mb-3">
          <thead>
            <tr>
              <th scope="col">Customer ID</th>
              <th scope="col">Name</th>
              <th scope="col">Address</th>
              <th scope="col">Mobile</th>
              <th scope="col">Email</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$user->id}}</td>
              <td>{{$user->name}}</td>
              <td>{{$user->address}}</td>
              <td>{{$user->mobile}}</td>
              <td>{{$user->email}}</td>
            </tr>
          </tbody>
        </table>
        <h2>Product Details</h2>
        <table class="table table-hover text-dark">
          <thead>
            <tr>
              <th scope="col" width="200px">Product Id</th>
              <th scope="col" width="200px">Product Image</th>
              <th scope="col" width="200px">Product Name</th>
              <th scope="col" width="200px">Size</th>
              <th scope="col" width="200px">Category</th>
              <th scope="col" width="200px">Quantity</th>
              <th scope="col" width="200px">Price</th>
              <th scope="col" width="200px">Total</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orderProduct as $data)
            <tr>
              <td>{{$data->id}}</td>
              <td><img src="{{asset('upload/images/'.$data->product_image)}}" alt="product_image" width="100px" class="mb-2"></td>
              <td>{{$data->name}}</td>
              <td>{{$data->ordered_size}}</td>
              <td>{{$data->category}}</td>
              <td>{{$data->quantity}}</td>
              <td>{{$data->price}}</td>
              <td>{{$data->total}}</td>
            </tr>
            @endforeach
          </tbody> 
        </table>                    
        <h2>Order Details</h2>
        <hr>
        <table class="table table-hover text-dark mb-3">
          <thead>
            <tr>
              <th scope="col">Order ID</th>
              <th scope="col">Ordered Time</th>
              <th scope="col">Order Status</th>
              <th scope="col">Delivery Address</th>
              <th scope="col">Total Bill</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>{{$order->id}}</td>
              <td>{{$order->created_at}}</td>
              @if($order->status == '1')
              <td>Order Delivered</td>
              @elseif($order->status == '2')
              <td>Order Cancelled</td>
              @else
              <td>Order Placed</td>
              @endif
              <td>{{$order->delivery_address}}</td>
              <td>{{$order->total_bill}}</td>
            </tr>
            
          </tbody>
        </table>  
      </div>
    </div>
<!-- page content ends -->

<!-- footer -->
@include('/layouts/footer')
<!-- footer ends -->
 

 <!-- owl caraousel -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="bxslider/jquery.bxslider.min.js"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>

<script>
  $(document).ready(function(){

    var owl = $('.owl-carousel');
    owl.owlCarousel({
      items:4,
      loop:true,
      margin:10,
      autoplay:true,
      autoplayTimeout:5000,
      autoplayHoverPause:true
    });
    $('.play').on('click',function(){
      owl.trigger('play.owl.autoplay',[1000])
    })
    $('.stop').on('click',function(){
      owl.trigger('stop.owl.autoplay')
    })

  });
</script>
<!-- owl caraousel -->

  <script type="text/javascript">
    $(document).ready(function(){
      // $('#quantity').keyup(function(){
        var cartTotal=parseInt($('#cartTotal').val());
        var tax=parseInt($('#tax').val());
        var shipping_charge=parseInt($('#shipping_charge').val());
        var bill=cartTotal+tax+shipping_charge;
        $('#total_bill').val(bill);
      // });
    });
  </script>

  <!-- search -->
  <script>
    $(document).ready(function(){
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
</script>

</body>
</html>