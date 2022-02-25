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
                <h1>Edit Products</h1>
                <hr>
                <form action="edit" method="post" enctype="multipart/form-data" class="was-validated">
                                @csrf
                                <div class="mb-3">
                                  <label for="name" class="form-label">Name :</label>
                                  <input type="text" class="form-control" value="{{$product['name']}}" name="name" id="name" aria-describedby="emailHelp" required>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="mb-3">
                                  <label for="quantity" class="form-label">Quantity :</label>
                                  <input type="number" class="form-control" name="quantity" id="quantity" value="{{$product['product_quantity']}}" aria-describedby="emailHelp" required>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-3">
                                  <label for="sel1" class="form-label">Select Category :</label>
                                  <select class="form-control" id="category" onclick="getValue();" name="category" required>
                                    <option>{{$product->category}}</option>
                                    @foreach($category as $data)
                                    <option>{{$data->name}}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                <div class="form-group mb-3">
                                  <label for="sel1" class="form-label">Select Sub Category :</label>
                                  <select class="form-control" id="subcategory" onclick="getValue();" name="subcategory" required>
                                    <option>{{$product->subcategory}}</option>
                                    @foreach($subcategory as $data)
                                    <option>{{$data->name}}</option>
                                    @endforeach
                                  </select>
                                  <div class="invalid-feedback">Please fill out this field.</div>
                                </div>
                                    <div class="mb-3">
                                      <label for="price" class="form-label">Price(Rs) :</label>
                                      <input type="text" class="form-control" value="{{$product['price']}}" name="price" id="price" aria-describedby="emailHelp" required>
                                      <div class="invalid-feedback">Please fill out this field.</div>
                                    </div>
                                    <div class="mb-3">
                                      <label for="offer" class="form-label">Offer :</label>
                                      <input type="text" class="form-control" value="{{$product['offer']}}" name="offer" id="offer" aria-describedby="emailHelp">
                                    </div>
                                    <div class="mb-3">
                                      <label for="oprice" class="form-label">Previous Price(Rs) :</label>
                                      <input type="text" class="form-control" value="{{$product['previous_price']}}" name="oprice" id="oprice" aria-describedby="emailHelp">
                                    </div>
                                <div class="form-group mb-3">
                                      <label for="description" class="form-label">Description :</label>
                                      <textarea class="form-control" row="15" id="description" name="description" placeholder="Enter Description" required>{{$product['description']}}</textarea> 
                                      <!-- <div class="valid-feedback">Valid.</div> -->
                                      <div class="invalid-feedback">Please fill out this field.</div>
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
  
  </body>
</html>
