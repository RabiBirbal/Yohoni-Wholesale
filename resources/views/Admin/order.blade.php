<!DOCTYPE html>
<html lang="en">
  <head>
    @include('/admin/style')
  </head>

  <body class="nav-md">
    <!-- sidenav starts -->
      @include('/admin/sideNav')
      <!-- sidenav ends -->

        <!-- page content -->
        <div class="right_col" role="main">
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
                                  <th scope="col">Delivery Place Latitude</th>
                                  <th scope="col">Order Date</th>
                                  <th scope="col">Total Bill</th>
                                  <th scope="col">View</th>
                                </tr>
                              </thead>
                              <tbody id="myTable">
                                @foreach($order as $data)
                                <tr>
                                  <td>{{$data->id}}</td>
                                  <td>
                                    <form>
                                      @csrf
                                    <input type="hidden" value="{{$data->id}}" id="order_id" name="order_id">
                                    <div class="form-group">
                                      <select class="form-control" uid='{{$data->id}}' name="status" id="status">
                                        @if($data->status == '1')
                                        <option  value="1" selected>Order Delivered</option>
                                        @elseif ($data->status == '2')
                                        <option  value="2" selected>Order Cancelled</option>
                                        @else
                                        <option  value="0" selected>Order Placed</option>
                                        @endif
                                        <option  value="0">Order Placed</option>
                                        <option  value="1">Order Delivered</option>
                                        <option  value="2">Order Cancelled</option>
                                      </select>
                                    </div>
                                  </form>
                                  </td>
                                  <td><a href="https://www.google.com/maps/place/{{ $data->map }}" target="_Blank">{{ $data->map }}</a></td>
                                  <td>{{$data->created_at}}</td>
                                  <td>{{$data->total_bill}}</td>
                                  <td><a href="{{url('order/details/'.$data['id'])}}"><button class="btn btn-success">View</button></a></td>
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
      <script type="text/javascript">
          $('select').change(function () {
           var optionSelected = $(this).find("option:selected");
           var valueSelected  = optionSelected.val();
           var textSelected   = optionSelected.text();
            var adminid = $(this).attr('uid');
            alert("Are you sure want to change the status??");
            // alert(valueSelected);
            // alert(adminid);
            $.ajax({
            url: "{{route('status-change')}}",
            type:"POST",
            data:{
              "_token": "{{ csrf_token() }}",
              value:valueSelected,
              id: adminid,
            },
            success: function (data) {
               alert('Status changed successfully.');
            },
            error: function(data){
               alert('Error occured.');
            }
           });
          });
        </script>
  </body>
</html>
