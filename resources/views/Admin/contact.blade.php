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
                    <h1>Contact Details</h1>
                    <hr>
                    <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                              <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                <tr>
                                  <th scope="col">Contact ID</th>
                                  <th scope="col">Name</th>
                                  <th scope="col">Email</th>
                                  <th scope="col">Message</th>
                                  <th scope="col">Action</th>
                                </tr>
                              </thead>
                              <tbody id="myTable">
                                @foreach($contact as $data)
                                <tr>
                                  <td>{{$data->id}}</td>
                                  <td>{{$data->name}}</td>
                                  <td>{{$data->email}}</td>
                                  <td>{{$data->message}}</td>
                                  <td><a href="mailto: {{$data->email}}"><button class="btn btn-success">Send Reply</button></a></td>
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
  </body>
</html>
