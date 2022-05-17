<!DOCTYPE html>
<html>
<head>
	<title>Order Details</title>
	<!-- bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="containe-fluid" style="margin-left: 5%; margin-right: 5%">
		<div class="row mb-3">
			<div class="col-md-12">
				<div class="row">
					<div class="col-md-5 text-right">
						<img src="/images/logo1.png" height="100px" alt="product_image">
					</div>
					<div class="col-md-7 mt-4 text-left">
						<strong>Welcome To Yohoni Wholesale</strong><br>
						<p>Kathmandu, Sundhara</p>
					</div>
				</div>
				
			</div>
		</div>
		<div class="row">
			<div class="col-md-9">
				<div>
					<strong>Customer Name: {{$user->name}}</strong>
				</div>
				<div>
					<strong>Customer ID: {{$user->id}}</strong>
				</div>
				<div>
					<strong>Address: {{$user->address}}</strong>
				</div>
				<div>
					<strong>Phone: {{$user->mobile}}</strong>
				</div>
				<div>
					<strong>Email: {{$user->email}}</strong>
				</div>
			</div>
			<div class="col-md-3">
				<div>
					<strong>Ordered ID: {{$order->id}}</strong>
				</div>
				<div>
					<strong>Ordered Date: {{$order->created_at}}</strong>
				</div>
				<div>
					<strong>Delivery Address: {{$order->delivery_address}}</strong>
				</div>
			</div>
		</div>
		<div class="row mt-3">
			<div class="col-md-12">
				<table class="table table-striped text-center">
					<thead>
						<tr>
							<td>Product ID</td>
							<td>Product Image</td>
							<td>Name</td>
							<td>Size</td>
							<td>Price</td>
							<td>Quantity</td>
							<td>Total</td>
						</tr>
					</thead>
					<tbody>
						@foreach($orderProduct as $data)
						<tr>
							<td>{{$data->product_id}}</td>
							<td><img src="{{asset('upload/images/'.$data->product_image)}}" width="80px"></td>
							<td>{{$data->name}}</td>
							<td>{{$data->ordered_size}}</td>
							<td>{{$data->price}}</td>
							<td>{{$data->quantity}}</td>
							<td>{{$data->total}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 text-right">
				
				<strong>Tax (10%): <input type="text" name="tax" value="Rs. {{($order->total_bill-200)/1.1 }} /-" class="text-right mb-3" readonly> </strong><br>
				<strong>Tax (10%): <input type="text" name="tax" value="Rs. {{ 0.10*(($order->total_bill-200)/1.1) }} /-" class="text-right mb-3" readonly> </strong><br>
				<strong>Shipping Charge: <input type="text" name="shipping" value="Rs. 200 /-" class="text-right mb-3" readonly></strong><br>
				<strong>Total: <input type="text" name="total" value="Rs. {{$order->total_bill}} /-" class="text-right" readonly></strong>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<strong>Thank You For Shopping!!!</strong>
			</div>
		</div>
	</div>

	<!-- script starts -->
        <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->

        <!-- bootstrap -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        <script type="text/javascript">
        	window.print();
        </script>
</body>
</html>