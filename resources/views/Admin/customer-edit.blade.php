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
                <h1>Edit Customer Detail</h1>
                <hr>
                <form action="{{ url('customer/update') }}" method="post" enctype="multipart/form-data" class="was-validated">
                                @csrf
                                <input type="hidden" class="form-control" value="{{$user['id']}}" name="user_id" id="user_id" aria-describedby="emailHelp" required>
                                <div class="mb-3">
                                  <label for="name" class="form-label">Full Name :</label>
                                  <input type="text" class="form-control" value="{{$user['name']}}" name="name" id="name" aria-describedby="emailHelp" required>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                  <div id="showErrorName"></div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                  <label for="email" class="form-label">Email :</label>
                                  <input type="email" class="form-control" name="email" id="email" value="{{$user['email']}}" aria-describedby="emailHelp" required>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                  <div id="showErrorEmail"></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                    <div class="mb-3">
                                      <label for="Mobile" class="form-label">Mobile :</label>
                                      <input type="text" class="form-control" value="{{$user['mobile']}}" name="mobile" id="mobile" aria-describedby="emailHelp" required>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                      <div id="showErrorPhone"></div>
                                        @error('mobile')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                      <label for="address" class="form-label">Address :</label>
                                      <input type="text" class="form-control" value="{{$user['address']}}" name="address" id="address" aria-describedby="emailHelp" required>
                                    </div>
                                    
                            <!-- Modal footer -->
                            <div class="modal-footer">
                              <button type="submit" onclick="return confirm('Are you sure want to update?')" class="btn btn-success">Update</button>
                            </div>
                          </form>
            </div>
        <!-- page content ends -->
        <!-- footer content -->
        @include('/admin/footer')
        
        <!-- /footer content -->
      </div>
    </div>

    <!-- java script starts -->
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
          </script>
        <script type="text/javascript">
        $(document).ready(function(){
          $('#mobile').keyup(function(){
            var mobile=$('#mobile').val();
            if(isNaN(mobile)){
              $('#showErrorPhone').html('Mobile number must be a number');
               $('#showErrorPhone').css('color','red');
              return false;
            }
            else if(mobile.length!=10){
              $('#showErrorPhone').html('Phone number must be of 10 characters');
               $('#showErrorPhone').css('color','red');
               return false;
            }
            else{
              $('#showErrorPhone').html('');
              return true;
            }
          });
    
          $('#name').keyup(function(){
            var name=$('#name').val();
            var pattern = /^[A-Za-z ]+$/;
            if(!pattern.test(name)){
              $('#showErrorName').html('Full Name should not contain Number');
              $('#showErrorName').css('color','red');
              return false;
            }
            else{
              $('#showErrorName').html('');
              return true;
            }
          });
        });
      </script>
  
  </body>
</html>
