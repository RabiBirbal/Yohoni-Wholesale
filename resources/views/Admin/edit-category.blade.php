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
                    <h1>Edit Category</h1>
                    <hr>
                    <form action="edit" method="post" onsubmit="return alert('Category has been updated Successfully!!')" class="was-validated p-2 text-dark">
                      @csrf
                      <input type="hidden" value="{{$category->id}}" name="category_id">
                    <div class="mb-3">
                      <label for="category" class="form-label">Category Name</label>
                      <input type="text" value="{{$category->name}}" name="name" placeholder="Enter Category Name" class="form-control" id="category" aria-describedby="emailHelp" required>
                    </div>
                    <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Update</button>
                  </form>
                  </div>
        <!-- page content ends -->
        <!-- footer content -->
        @include('/admin/footer')
        <!-- /footer content -->
      </div>
    </div>

    <!-- script -->
    @include('/admin/js')
	
  </body>
</html>
