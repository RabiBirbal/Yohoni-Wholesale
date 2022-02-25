<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"/>
    @include('/admin/style')
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <!-- sidenav starts -->
      @include('/admin/sideNav')
      <!-- sidenav ends -->

        <!-- page content -->
        <div class="right_col" role="main">
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
                <h1>Product Details</h1>
                <hr>
                <div class="x_content">
                  <div class="row">
                      <div class="col-sm-12">
                        <div class="card-box table-responsive">
                          <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                            <tr>
                              {{-- <th scope="col">No</th> --}}
                              <th scope="col">Name</th>
                              <th scope="col">Image</th>
                              <th scope="col">Qty</th>
                              <th scope="col">Size</th>
                              <th scope="col">Price</th>
                              <th scope="col">Offer</th>
                              <th scope="col">Previous Price</th>
                              <th scope="col" width="50%">Description</th>
                              <th scope="col">Category</th>
                              <th scope="col">Sub Category</th>
                              <th scope="col">#Action</th>
                            </tr>
                          </thead>
                          <tbody id="myTable">
                            @foreach($product as $data)
                            <tr>
                              <td style="width: 5%;">{{$data->name}}</td>
                              <td style="width: 5%;"><img src="{{asset('upload/images/'.$data->product_image)}}" width="100%"></td>
                              <td class="text-center" style="width: 5%;">{{$data->product_quantity}}</td>
                              <td style="width: 3%;">{{$data->available_size}}</td>
                              <td style="width: 5%;">{{$data->price}}</td>
                              <td style="width: 5%;">{{$data->offer}}</td>
                              <td style="width: 5%;">{{$data->previous_price}}</td>
                              <td style="width: 40%;"><textarea class="form-control" row="5" id="description" name="description"readonly>{{$data->description}}</textarea> </td>
                              <td style="width: 5%;">{{$data->category}}</td>
                              <td style="width: 5%;">{{$data->subcategory}}</td>
                              <td style="width: 10%;">
                                    <a href="{{'delete_product/'.$data['id']}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                                    <a href="{{'edit_product/'.$data['id']}}/edit" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i> Edit </a>
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
        <!-- page content ends -->
        <!-- footer content -->
        @include('/admin/footer')
        <!-- /footer content -->
      </div>
    </div>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script> --}}
    <!-- script -->
    @include('/admin/js')

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

{{-- <script type="text/javascript">
  $(function () {
    
    var table = $('.yajra-datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('product.list') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'name', name: 'name'},
            {data: 'product_image', name: 'product_image'},
            {data: 'quantity', name: 'quantity'},
            {data: 'size', name: 'size'},
            {data: 'price', name: 'price'},
            {data: 'offer', name: 'offer'},
            {data: 'previous_price', name: 'previous_price'},
            {data: 'description', name: 'description'},
            {data: 'category', name: 'category'},
            {data: 'subcategory', name: 'subcategory'},
            {
                data: 'action', 
                name: 'action', 
                orderable: true, 
                searchable: true
            },
        ]
    });
    
  });
</script> --}}
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
