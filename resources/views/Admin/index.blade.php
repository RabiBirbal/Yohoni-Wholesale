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
                    @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible alert-block" role="alert">
                      <button type="button" class="close" data-dismiss="alert">X</button>
                      <strong><i class="fas fa-check-circle"></i> Success!! {{Session('success')}}</strong>
                      {{ Session::forget('success'); }}
                    </div>
                    @endif              
                    <h1>Customers Details</h1>
                    <hr>
                    <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                  <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Mobile</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Action</th>
                                  </tr>
                                </thead>
                                <tbody id="myTable">
                                  @foreach($user as $data)
                                  <tr>
                                    <td>{{$data->name}}</td>
                                    <td>{{$data->mobile}}</td>
                                    <td>{{$data->email}}</td>
                                    <td>{{$data->address}}</td>
                                    <td>
                                      <a href="{{ url('customer/edit/'.$data['id']) }}" class="btn btn-primary">Edit</a>
                                      <a href="{{ url('customer/delete/'.$data['id']) }}" onclick="return confirm('Are you sure want to continue?')" class="btn btn-danger">Remove</a>
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
      <script>
        $("document").ready(function(){
            setTimeout(function(){
               $("div.alert-success").remove();
            }, 2000 ); // 5 secs    
        });
      </script>
  </body>
</html>
