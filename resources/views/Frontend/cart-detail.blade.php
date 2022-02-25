<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Cart Details</title>
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
    <strong><i class="fas fa-times"></i> Error!! {{Session('error')}}</strong>
    {{ Session::forget('error'); }}
  </div>
  @endif 
<!-- header starts -->
 @include('/layouts/header')
 <!-- header ends -->
<hr>
<!-- <form action="{{url('order')}}" method="post"> -->
<div class="container">
  <h1>Cart List</h1>
  <hr>
  @if($cart == 0)
  <h2>You have empty card!!!</h2>
      <a href="{{url('/')}}"><button type="button" class="btn btn-primary ml-5 mb-3">Continue Shopping</button></a>
  @else
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Product</th>
        <th>Name</th>
        <th>Size</th>
        <th>Unit price</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Remove</th>
      </tr>
    </thead>
    <tbody>
      @foreach($cartlist as $data)
      <tr>
        <input type="hidden" name="cartTotal" id="cartTotal" value="{{$cartTotal}}">
        <td><img src="{{asset('upload/images/'.$data->product_image)}}" alt="product_image" height="100px"></td>
        <td><input type="text" name="name" value="{{$data->name}}" readonly></td>
        <form>
          @csrf
        <input type="hidden" value="{{$data->id}}" id="cart_id" name="cart_id">
          <td><select class="select text-center" uid='{{$data->id}}' name="size" id="size" style="width: 110%; height: 25px">
            <option  value="{{$data->size}}" selected>{{$data->size}}</option>
            @foreach($size as $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
          </select></td>
      </form>
        <td><input type="text" name="price" class="text-center" id="price" value="{{$data->price}}" readonly></td>
        <!-- <div class="quantity buttons_added">
          <input type="button" value="-" class="minus"><input type="number" step="1" min="1" max="" name="quantity" value="1" title="Qty" class="input-text qty text" size="4" pattern="" inputmode=""><input type="button" value="+" class="plus">
        </div> -->
        <form>
          @csrf
        <input type="hidden" value="{{$data->id}}" id="cart_id" name="cart_id">
          <td>
            <select class="select1 text-center" uid='{{$data->id}}' name="quantity" id="quantity" style="width: 100%; height: 25px">
            <option  value="{{$data->quantity}}" selected>{{$data->quantity}}</option>
            @for ($i = 1; $i <= $data->product_quantity; $i++)
            <option  value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
          @if($data->quantity > $data->product_quantity)
          <p class="bg-danger">Quantity is greater than in stock. Please change quantity.</p>
          @endif
        </td>
      </form>
        {{-- <td>
          @if($data->product_quantity <= 0)
          <input type="text" name="quantity" class="text-center bg-danger" id="quantity" value="Out Of Stock" style="width: 100px" readonly>
          @else
          <input type="text" name="quantity" class="text-center" id="quantity" value="{{$data->quantity}}" style="width: 50px" readonly>
          @endif
        </td> --}}
        <td><input type="text" name="total" class="text-center" id="total" value="{{ $data->total }}" readonly></td>
        <td><a href="{{url('cart/delete/'.$data->product_id)}}"><strong><i class="fa fa-trash" aria-hidden="true"> Remove</i></strong></a></td>
      </tr>
      @endforeach 
    </tbody>
  </table>

<!-- tax including -->
<div class="payments text-right">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-lg-12">
        <form action="{{url('checkout')}}" method="get" class="was-validated">
        <span><p>Tax (10%): <input type="text" name="tax" id="tax" value="{{ 0.10 * $cartTotal }}" class="text-center" readonly></p></span>
        <span><p>Shipping Charges (Rs): <input type="text" name="shipping_charge" id="shipping_charge" value="200" class="text-center" readonly></p></span>
          <span><p>Total Amount to pay (Rs): <input type="text" class="text-center" name="total_bill" id="total_bill" value="" readonly></p></span>
        <button type="submit" class="btn btn-primary ml-5 mb-3">Check out</button>
        <a href="{{url('/')}}"><button type="button" class="btn btn-primary ml-5 mb-3">Continue Shopping</button></a>
        </form>
      </div>
    </div>
  </div>
</div>
  @endif
</div>
<!-- </form> -->
<!-- tax including ends-->

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
{{-- <script type="text/javascript">
  $(document).ready(function(){
    // $('#quantity').keyup(function(){
      var quantity=parseInt($('#quantity').val());
      var price=parseInt($('#price').val());
      var total=quantity*price;
      $('#total').val(total);
    // });

    var total1=parseInt($('#total').val());
    var tax=parseInt($('#tax').val());
    var shipping=parseInt($('#shipping_charge').val());
    var totalBill=total1+tax+shipping;
    $('#total_bill').val(totalBill);
  });
</script> --}}
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

<script type="text/javascript">
  $('.select1').change(function () {
   var optionSelected = $(this).find("option:selected");
   var valueSelected  = optionSelected.val();
   var textSelected   = optionSelected.text();
    var adminid = $(this).attr('uid');
    alert("Are you sure want to change the Quantity??");
    // alert(valueSelected);
    // alert(adminid);
    $.ajax({
    url: "{{route('quantity-change')}}",
    type:"POST",
    data:{
      "_token": "{{ csrf_token() }}",
      value:valueSelected,
      id: adminid,
    },
    success: function (data) {
       alert('Quantity changed successfully.');
       window.location.href = "{{ route('cart_details')}}";
    },
    error: function(data){
       alert('Error occured.');
    }
   });
  });
</script>
<script type="text/javascript">
  $('.select').change(function () {
   var optionSelected = $(this).find("option:selected");
   var valueSelected  = optionSelected.val();
   var textSelected   = optionSelected.text();
    var adminid = $(this).attr('uid');
    alert("Are you sure want to change the size??");
    // alert(valueSelected);
    // alert(adminid);
    $.ajax({
    url: "{{route('size-change')}}",
    type:"POST",
    data:{
      "_token": "{{ csrf_token() }}",
      value:valueSelected,
      id: adminid,
    },
    success: function (data) {
       alert('Size changed successfully.');
       window.location.href = "{{ route('cart_details')}}";
    },
    error: function(data){
       alert('Error occured.');
    }
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