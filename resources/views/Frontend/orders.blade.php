<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>My Orders</title>
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
    <div class="container-fluid right_col" role="main">
        <h1>Order Details</h1>
        <hr>
        <div class="x_content">
          <div class="row">
              <div class="col-sm-12">
                <div class="card-box table-responsive">
                  <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                    <tr>
                      <th scope="col">Order ID</th>
                      <th scope="col">Status</th>
                      <th scope="col">Order Date</th>
                      <th scope="col">Total Bill</th>
                      <th scope="col" class="text-center">View</th>
                      <th scope="col" class="text-center">Action</th>
                    </tr>
                  </thead>
                  <tbody id="myTable">
                    @foreach($order as $data)
                    <tr>
                      <td>{{$data->id}}</td>
                        @if($data->status == '1')
                            <td class="status">Order Delivered</td>
                            @elseif ($data->status == '2')
                            <td class="status">Order Cancelled</td>
                            @else
                            <td class="status">Order Placed</td>
                            @endif
                      <td>{{$data->created_at}}</td>
                      <td>{{$data->total_bill}}</td>
                      <td><a href="{{url('user/order/details/'.$data['id'])}}"><button class="btn btn-primary">View</button></a></td>
                      <td>
                        <form action="{{ url('order/cancel') }}" method="post">
                            @csrf
                        <input type="hidden" name="orderId" value="{{ $data['id'] }}">
                        @if($data->status != '2')
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-info" style="background-color: red; color: white;">Cancel Order</button>
                        @endif
                    </form>  
                    </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                </div>
              </div>
          </div>
        </div>
    </div>

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