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
                <h1>Add Products</h1>
                <hr>
                <form action="add_product" method="post" enctype="multipart/form-data" class="was-validated text-dark">
                      @csrf
                  <div class="mb-3">
                    <label for="name" class="form-label">Name :</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="mb-3">
                    <label for="quantity" class="form-label">Quantity :</label>
                    <input type="number" class="form-control" name="quantity" id="quantity" aria-describedby="emailHelp" required>
                    <div class="invalid-feedback">Please fill out this field.</div>
                  </div>
                  <div class="col-md-12">
                  <label for="size" class="form-label">Available Size :</label>
                  </div>
                  <div class="col-md-4 mb-3">
                    <u><label for="size" class="form-label">Clothing Size</label></u>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="S" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        S
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="M" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        M
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="L" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        L
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="XL" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        XL
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="XXL" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        XXL
                      </label>
                    </div>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label for="size" class="form-label">Footwear Size</label>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="39" id="flexCheckDefault">
                      <label class="form-check-label" for="flexCheckDefault">
                        39
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="40" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        40
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="41" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        41
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="42" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        42
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="43" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        43
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="44" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        44
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="size[]" value="45" id="flexCheckChecked">
                      <label class="form-check-label" for="flexCheckChecked">
                        45
                      </label>
                    </div>
                  </div>
                  <div class="col-md-12 form-group mb-3">
                        <label for="sel1" class="form-label">Select Category :</label>
                        <select class="form-control" id="category" onclick="getValue();" name="category" required>
                          @foreach($category as $data)
                          <option>{{$data->name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="col-md-12 form-group mb-3">
                        <label for="sel1" class="form-label">Select Sub Category :</label>
                        <select class="form-control" id="subcategory" onclick="getValue();" name="subcategory" required>
                          @foreach($subcategory as $data)
                          <option>{{$data->name}}</option>
                          @endforeach
                        </select>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="col-md-12 form-group">
                        <label for="product-img">Select Product Image :</label>
                          <input type="file" id="file-ip-1" accept="image/*" class="form-control-file border" onchange="showPreview1(event);" name="product-img" required>
                          <div class="invalid-feedback">Please choose the product image.</div>
                          <div class="preview mt-2">
                            <img src="" id="file-ip-1-preview" width="40%;">
                          </div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="price" class="form-label">Price(Rs) :</label>
                        <input type="text" class="form-control" name="price" id="price" aria-describedby="emailHelp" required>
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="offer" class="form-label">Offer :</label>
                        <input type="text" class="form-control" name="offer" id="offer" aria-describedby="emailHelp">
                      </div>
                      <div class="col-md-12 mb-3">
                        <label for="oprice" class="form-label">Previous Price(Rs) :</label>
                        <input type="text" class="form-control" name="oprice" id="oprice" aria-describedby="emailHelp">
                      </div>
                  <div class="col-md-12 form-group mb-3">
                        <label for="description" class="form-label">Description :</label>
                        <textarea class="form-control" row="15" id="description" name="description" placeholder="Enter Description" required></textarea> 
                        <!-- <div class="valid-feedback">Valid.</div> -->
                        <div class="invalid-feedback">Please fill out this field.</div>
                      </div>
                      <div class="col-md-12">
                        <button type="submit" onclick="return confirm('Are you sure want to continue?')" class="btn btn-primary">Submit</button>
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
