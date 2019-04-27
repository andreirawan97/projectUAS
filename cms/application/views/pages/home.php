<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $library ?>
  <?php echo $js ?>
  <?php echo $css ?>
  
  <title>CMS - Home</title>
</head>
<body>
  <?php echo $navbar ?>


  <div class='container' style="margin-top: 20px">

    <button id='addNewBtn' type='button' class='btn btn-primary btn-sm' data-toggle="modal" data-target="#addNewModal">Add New Item</button>
    
    <br /><br />
    <input type="text" class="col-md-6" id="searchKeyword" placeholder="Filter product name....">

    <table class='table' style="margin-top: 20px">
      <thead>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Heroes</th>
        <th scope="col">Price</th>
        <th scope="col">Quantity</th>
        <th scope="col">Description</th>
        <th scope="col">Action</th>
      </thead>
      <tbody id="tbodyProducts">
        <!-- To Be Added -->
      </tbody>
    </table>
    
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addNewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add New Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="newProductForm">
            <div class="form-group">
              <label for="inputTextName">Name <a style="color: tomato">*</a></label>
              <input type="text" class="form-control" id="inputTextName" placeholder="Enter product name...">
            </div>
            <div class="form-group">
              <label for="inputHeroesName">Heroes  <a style="color: tomato">*</a></label>
              <select class="form-control" id="inputHeroesName">
                <!-- To Be Added -->
              </select>
            </div>
            <div class="form-group">
              <label for="inputTextPrice">Price <a style="color: tomato">*</a></label>
              <input value='0' min='0' type="number" class="form-control" id="inputTextPrice" placeholder="Enter product price...">
            </div>
            <div class="form-group">
              <label for="inputTextQuantity">Quantity <a style="color: tomato">*</a></label>
              <input value='0' min='0' type="number" class="form-control" id="inputTextQuantity" placeholder="Enter product quantity...">
            </div>
            <div class="form-group">
              <label for="inputTextDescription">Description</label>
              <input type="text" class="form-control" id="inputTextDescription" placeholder="Enter product description...">
            </div>
            <div class="form-group">
              <label for="inputTextImageURL">Image URL</label>
              <input type="text" class="form-control" id="inputTextImageURL" placeholder="Enter product image url...">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="submitBtn" type="submit" class="btn btn-primary">Submit</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal about edit -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form id="newProductForm">
            <input type="hidden" id="editTextProductID" />
            <div class="form-group">
              <label for="editTextName">Name <a style="color: tomato">*</a></label>
              <input type="text" class="form-control" id="editTextName" placeholder="Enter product name...">
            </div>
            <div class="form-group">
              <label for="editHeroesName">Heroes  <a style="color: tomato">*</a></label>
              <select class="form-control" id="editHeroesName">
                <!-- To Be Added -->
              </select>
            </div>
            <div class="form-group">
              <label for="editTextPrice">Price <a style="color: tomato">*</a></label>
              <input type="number" class="form-control" id="editTextPrice" placeholder="Enter product price...">
            </div>
            <div class="form-group">
              <label for="editTextQuantity">Quantity <a style="color: tomato">*</a></label>
              <input type="number" class="form-control" id="editTextQuantity" placeholder="Enter product quantity...">
            </div>
            <div class="form-group">
              <label for="editTextDescription">Description</label>
              <input type="text" class="form-control" id="editTextDescription" placeholder="Enter product description...">
            </div>
            <div class="form-group">
              <label for="editTextImageURL">Image URL</label>
              <input type="text" class="form-control" id="editTextImageURL" placeholder="Enter product image url...">
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button id="updateBtn" type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </div>
  </div>


</body>
</html>
