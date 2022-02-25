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
                    <h1>Sub Categories</h1>
                    <hr>
                    <h2 >Parent Category: {{$category->name}} <a href="../category" class="btn btn-success ml-5"><i class="fas fa-backward"></i> Go Back</a></h2> 
                    <table class="table table-hover text-dark mb-5">
                  <thead>
                        <tr>
                          <th scope="col">Sub Category Lists</th>
                          <th scope="col">#Edit</th>
                        </tr>
                      </thead>
                      <tbody id="myTable">
                        @foreach($subcategory as $data)
                        <tr>
                          <td>{{$data->name}}</td> 
                          <td>
                            <input type="hidden" name="category_id" value="{{$category->id}}">
                            <a href="{{'delete/'.$data['id']}}" onclick="return confirm('Are you sure want to delete?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Delete </a>
                            <a href="{{$data['id'].'/edit'}}" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i> Edit </a>
                          </td>                       
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    <h1>Add New Sub-Category</h1>
                    <hr>
                    <form action="{{$category->id}}/add" method="post" class="was-validated p-2 text-dark">
                      @csrf
                      <input type="hidden" name="category_id" value="{{$category->id}}">
                    <div class="mb-3">
                      <label for="scategry" class="form-label">Sub-Category Name</label>
                      <input type="text" name="name" class="form-control" id="scategory" aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Add Now</button>
                  </form>
                  </div>

        <!-- page content ends -->
        <!-- footer content -->
        @include('/admin/footer')
        <!-- /footer content -->
      </div>
    </div>

    @include('/admin/js')
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
