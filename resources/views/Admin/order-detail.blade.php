<!DOCTYPE html>
<html lang="en">
  <head>
    @include('/admin/style')
  </head>

  <body class="nav-md">
    <!-- sidenav starts -->
      @include('/admin/sideNav')
      <!-- sidenav ends -->
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
        <!-- page content ends -->
        <!-- footer content -->
        @include('/admin/footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- script -->
    @include('/admin/js')

    <script type="text/javascript">
      printme(){
        window.print();
      }
    </script>
	
  </body>
</html>
