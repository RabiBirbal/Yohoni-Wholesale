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
          @if(Session::has('success'))
          <div class="alert alert-success alert-dismissible alert-block" role="alert">
            <button type="button" class="close" data-dismiss="alert">X</button>
            <strong><i class="fas fa-check-circle"></i> Success!! {{Session('success')}}</strong>
            {{ Session::forget('success'); }}
          </div>
          @endif 
                    <h1>Add Banner</h1>
                    <hr>
                    <h3 class="bg-dark text-white">Main Banner</h3>
                    <table class="table table-hover text-dark mb-3">
                      <thead>
                        <tr class="text-center">
                          <th scope="col" width="60%">Banner Image</th>
                          <th scope="col" width="40%">#Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($banner as $data)
                        <tr>
                          <td><img src="{{asset('upload/images/'.$data->banner_image)}}" alt="banner" width="90%" class="mb-3"></td>
                          <td class="text-center pt-5">
                            <a href="{{'delete_banner/'.$data['id']}}" onclick="return confirm('Are you sure want to remove?')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i> Remove </a>
                          </td> 
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    <h3>Add New Banner</h3>
                    <form action="add_banner" method="post" enctype="multipart/form-data" class="text-dark">
                      @csrf
                          <div class="form-group ">
                          <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="banner" required>
                          <div class="preview mt-3">
                          <img src="" id="file-ip-1-preview" width="50%;">
                      </div>
                      </div>
                      <div class="pl-5">
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Add Now</button>
                      </div>
                    </form>

                    <!-- middle banner -->
                    <hr class="bg-success">
                    <hr class="bg-success">
                    <h3 class="bg-dark text-white">Middle Banner</h3>
                    @foreach($banner1 as $data)
                    <img src="{{asset('upload/images/'.$data->banner_image)}}" alt="banner" width="50%" class="mb-3">
                    @endforeach
                    <br>
                    <h3>Change Middle Banner</h3>
                    <form action="add_middle_banner" method="post" enctype="multipart/form-data" class="text-dark">
                      @csrf
                          <div class="form-group ">
                          <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview(event);" name="banner" required>
                          <div class="preview mt-3">
                          <img src="" id="file-ip-2-preview" width="50%;">
                      </div>
                      </div>
                      <div class="pl-5">
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Change Now</button>
                      </div>
                    </form>

                    <!-- lower banner -->
                    <hr class="bg-success">
                    <hr class="bg-success">
                    <h3 class="bg-dark text-white">Lower Banner</h3>
                    @foreach($banner2 as $data)
                    <img src="{{asset('upload/images/'.$data->banner_image)}}" alt="banner" width="50%" class="mb-3">
                    @endforeach
                    <br>
                    <h3>Change Lower Banner</h3>
                    <form action="add_lower_banner" method="post" enctype="multipart/form-data" class="text-dark">
                      @csrf
                          <div class="form-group ">
                          <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview3(event);" name="banner" required>
                          <div class="preview mt-3">
                          <img src="" id="file-ip-3-preview" width="50%;">
                      </div>
                      </div>
                      <div class="pl-5">
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Change Now</button>
                      </div>
                    </form>
                </div>
        <!-- page content ends -->
        <!-- footer content -->
        @include('/admin/footer')
        <!-- /footer content -->
      </div>
    </div>
    <!-- script starts -->
    @include('/admin/js')

    <!-- image preview -->
        <script type="text/javascript">
            function showPreview1(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-1-preview");
                    preview.src=src;
                    preview.style.display="block";
                }
            }
            function showPreview(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-2-preview");
                    preview.src=src;
                    preview.style.display="block";
                }
            }

            function showPreview3(event){
                if(event.target.files.length > 0){
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("file-ip-3-preview");
                    preview.src=src;
                    preview.style.display="block";
                }
            }

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
