<script>
  $(document).ready(() => {
    renderAllProducts();
    renderOption();
    
    $('#submitBtn').click(() => {
      let name = $('#inputTextName').val().trim();
      let price = $('#inputTextPrice').val().trim();
      let quantity = $('#inputTextQuantity').val().trim();
      let description = $('#inputTextDescription').val().trim();
      let file = $('#inputTextImageURL').get(0).files;
<<<<<<< HEAD
<<<<<<< HEAD
      let heroName = $('#inputHeroName').val().trim();
      let heroID = $('#inputHeroName option:selected').data('status');
<<<<<<< HEAD
=======
      let heroName = $('#inputHeroesName').val().trim();
=======
      let heroName = $('#inputHeroName').val().trim();
>>>>>>> fixing confused code
      let heroID = '';
>>>>>>> fixing search feature, adding upload image feature
=======
>>>>>>> renderOption disisipi heroesID

      let url = 'https://api.imgur.com/3/image';
      let clientID = '93978d38370b0b5';
      let clientSecret = '6fcf7caa752df1c4326584597003359dd08cbcdc';
      let settings = {
          url: url,
          method: 'POST',
          timeout: 0,
          headers: {
          Authorization: `Client-ID ${clientID}`,
          },
          processData: false,
          mimeType: 'multipart/form-data',
          contentType: false,
          data: file[0],
      };
<<<<<<< HEAD
<<<<<<< HEAD
      
      //insert database w/image
      if (file.length == 1){
        //show loading
        $('#loadingAdd').attr('class', 'loading d-flex align-items-center');
        $.ajax(settings).done(function(res) {
          //If the request is complete, the response will be the URL of uploaded image
          //hide loading
          $('#loadingAdd').attr('class', 'loading d-none align-items-center');
          let response = JSON.parse(res);

          let {data} = response;
          let {link} = data;
          let imageURL = link;
          
          if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
            Swal.fire(
              'Error!',
              'Name, price, or quantity cannot be empty!',
              'error'
            )
          }
          else{
            let data = {
              name,
              price,
              quantity,
              description,
              imageURL,
              heroID
            }

            $.post('index.php/home/addNewProduct', data, (res) => {
              let response = JSON.parse(res);

              let {status, message} = response;

              if(status === 'ok'){
                Swal.fire({
                  title: 'Success!',
                  text: message,
                  type: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Great!'
                }).then((result) => {
                  if (result.value) {
                    $('#addNewModal').modal('hide');
                    renderAllProducts();
                    resetAddNewForm();
                  }
                })
              }
              else{
                Swal.fire(
                  'Error!',
                  message,
                  'error'
                )
              }
            })
          }
        });
      }else{ //insert database wo/ image
        imageURL = '';
        if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
          Swal.fire(
            'Error!',
            'Name, price, or quantity cannot be empty!',
            'error'
          )
        }
        else{
          let data = {
            name,
            price,
            quantity,
            description,
            imageURL,
            heroID
          }

          $.post('index.php/home/addNewProduct', data, (res) => {
            let response = JSON.parse(res);

            let {status, message} = response;

            if(status === 'ok'){
              Swal.fire({
                title: 'Success!',
                text: message,
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Great!'
              }).then((result) => {
                if (result.value) {
                  $('#addNewModal').modal('hide');
                  renderAllProducts();
                  resetAddNewForm();
                }
              })
            }
            else{
              Swal.fire(
                'Error!',
                message,
                'error'
              )
            }
          })
        }
=======

=======
      
>>>>>>> fixing confused code
      //insert database w/image
      if (file.length == 1){
        $.ajax(settings).done(function(res) {
          //If the request is complete, the response will be the URL of uploaded image
          let response = JSON.parse(res);

          let {data} = response;
          let {link} = data;
          let imageURL = link;
          
          if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
            Swal.fire(
              'Error!',
              'Name, price, or quantity cannot be empty!',
              'error'
            )
          }
          else{
            let data = {
              name,
              price,
              quantity,
              description,
              imageURL,
              heroID
            }

            $.post('index.php/home/addNewProduct', data, (res) => {
              let response = JSON.parse(res);

              let {status, message} = response;

              if(status === 'ok'){
                Swal.fire({
                  title: 'Success!',
                  text: message,
                  type: 'success',
                  showCancelButton: false,
                  confirmButtonColor: '#3085d6',
                  confirmButtonText: 'Great!'
                }).then((result) => {
                  if (result.value) {
                    $('#addNewModal').modal('hide');
                    renderAllProducts();
                    resetAddNewForm();
                  }
                })
              }
              else{
                Swal.fire(
                  'Error!',
                  message,
                  'error'
                )
              }
            })
          }
        });
<<<<<<< HEAD
>>>>>>> fixing search feature, adding upload image feature
=======
      }else{ //insert database wo/ image
        imageURL = '';
        if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
          Swal.fire(
            'Error!',
            'Name, price, or quantity cannot be empty!',
            'error'
          )
        }
        else{
          let data = {
            name,
            price,
            quantity,
            description,
            imageURL,
            heroID
          }

          $.post('index.php/home/addNewProduct', data, (res) => {
            let response = JSON.parse(res);

            let {status, message} = response;

            if(status === 'ok'){
              Swal.fire({
                title: 'Success!',
                text: message,
                type: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'Great!'
              }).then((result) => {
                if (result.value) {
                  $('#addNewModal').modal('hide');
                  renderAllProducts();
                  resetAddNewForm();
                }
              })
            }
            else{
              Swal.fire(
                'Error!',
                message,
                'error'
              )
            }
          })
        }
>>>>>>> renderOption disisipi heroesID
      }
    })

    $('#updateBtn').click(() => {
      let productID = $('#editTextProductID').val().trim();
      let name = $('#editTextName').val().trim();
      let price = $('#editTextPrice').val().trim();
      let quantity = $('#editTextQuantity').val().trim();
      let description = $('#editTextDescription').val().trim();
<<<<<<< HEAD
<<<<<<< HEAD
      let heroesName = $('#editHeroName').val().trim();
      let heroesID = $('#editHeroesID').val().trim();
      let imageURL = $('#editImageLink').val().trim();
      let file = $('#editTextImageURL').get(0).files;
=======
      let file = $('#editTextImageURL').get(0).files;
      let heroName = $('#editHeroesName').val().trim();
      let imageURL = $('#editTextImageURL').val().trim();
      let link = $('#editTextLink').val().trim();
      let heroID = '';

>>>>>>> fixing search feature, adding upload image feature
=======
      let heroesName = $('#editHeroName').val().trim();
      let heroesID = $('#editHeroesID').val().trim();
      let imageURL = $('#editImageLink').val().trim();
      let file = $('#editTextImageURL').get(0).files;
>>>>>>> fixing confused code
      
      let url = 'https://api.imgur.com/3/image';
      let clientID = '93978d38370b0b5';
      let clientSecret = '6fcf7caa752df1c4326584597003359dd08cbcdc';
      let settings = {
          url: url,
          method: 'POST',
          timeout: 0,
          headers: {
          Authorization: `Client-ID ${clientID}`,
          },
          processData: false,
          mimeType: 'multipart/form-data',
          contentType: false,
          data: file[0],
      };

      if(file.length == 1){
<<<<<<< HEAD
        $('#loadingEdit').attr('class', 'loading d-flex align-items-center');
        $.ajax(settings).done(function(res) {
          //If the request is complete, the response will be the URL of uploaded image
          $('#loadingEdit').attr('class', 'loading d-none align-items-center');
          let response = JSON.parse(res);

          let {data} = response;
          let {link} = data;
          imageURL = link;
          
          if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
            Swal.fire(
              'Error!',
              'Name, price, or quantity cannot be empty!',
              'error'
            )
          }
          else{
            let data = {
              name,
              price,
              quantity,
              description,
              imageURL,
              productID,
              heroesID
            }

            $.post('index.php/home/updateProduct', data, (res) => {
              let response = JSON.parse(res);

              let {status, message} = response;

              if(status === 'ok') {
                Swal.fire(
                  'Success!',
                  message,
                  'success'
                )
                $('#editModal').modal('hide');
                renderAllProducts();
                $('#searchKeyword').val('');
              }else {
                Swal.fire(
                  'Error!',
                  message,
                  'error'
                )
              }
            })
          }
        });
      }else{
        if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
          Swal.fire(
            'Error!',
            'Name, price, or quantity cannot be empty!',
            'error'
          )
        }
        else{
          let data = {
            name,
            price,
            quantity,
            description,
            imageURL,
            productID,
            heroesID
          }

          $.post('index.php/home/updateProduct', data, (res) => {
            let response = JSON.parse(res);

            let {status, message} = response;

            if(status === 'ok') {
              Swal.fire(
                'Success!',
                message,
                'success'
              )
              $('#editModal').modal('hide');
              renderAllProducts();
              $('#searchKeyword').val('');
            }else {
              Swal.fire(
                'Error!',
                message,
                'error'
              )
            }
          })
        }
=======
        $.ajax(settings).done(function(res) {
          //If the request is complete, the response will be the URL of uploaded image
          let response = JSON.parse(res);

          let {data} = response;
          let {link} = data;
          imageURL = link;
          
          if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
            Swal.fire(
              'Error!',
              'Name, price, or quantity cannot be empty!',
              'error'
            )
          }
          else{
            let data = {
              name,
              price,
              quantity,
              description,
              imageURL,
              productID,
              heroesID
            }

            $.post('index.php/home/updateProduct', data, (res) => {
              let response = JSON.parse(res);

              let {status, message} = response;

              if(status === 'ok') {
                Swal.fire(
                  'Success!',
                  message,
                  'success'
                )
                $('#editModal').modal('hide');
                renderAllProducts();
                $('#searchKeyword').val('');
              }else {
                Swal.fire(
                  'Error!',
                  message,
                  'error'
                )
              }
            })
          }
        });
<<<<<<< HEAD
>>>>>>> fixing search feature, adding upload image feature
=======
      }else{
        if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
          Swal.fire(
            'Error!',
            'Name, price, or quantity cannot be empty!',
            'error'
          )
        }
        else{
          let data = {
            name,
            price,
            quantity,
            description,
            imageURL,
            productID,
            heroesID
          }

          $.post('index.php/home/updateProduct', data, (res) => {
            let response = JSON.parse(res);

            let {status, message} = response;

            if(status === 'ok') {
              Swal.fire(
                'Success!',
                message,
                'success'
              )
              $('#editModal').modal('hide');
              renderAllProducts();
              $('#searchKeyword').val('');
            }else {
              Swal.fire(
                'Error!',
                message,
                'error'
              )
            }
          })
        }
>>>>>>> fixing confused code
      }
    })

    $('#searchKeyword').keyup(() =>{
      let searchKeyword = $('#searchKeyword').val().trim();

      if(isEmpty(searchKeyword)){
        renderAllProducts();
      }else{
        renderSearchedProducts(searchKeyword);
      }
    })
  })

  function renderAllProducts(){
    $.get('index.php/home/getAllProducts', (res) => {
      let response = JSON.parse(res);
      
      let {status, datas} = response;
      if(status === 'ok'){
        $('#tbodyProducts').html('');
        datas.forEach((data, i) => {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fixing confused code
          let {productID, name, price, quantity, description,imageURL, heroesID, heroesName} = data;
            $('#tbodyProducts').append(`
            <tr>
              <th scope='row'>${i+1}</th>
              <td>${name}</td>
              <td>${heroesName}</td>
              <td>$${price}</td>
              <td>${quantity}</td>
              <td>${description !== '' ? description : `<i>No Description</i>`}</td>
              <td>
              <button 
                  id='editBtn' 
                  productID='${productID}'
                  name='${name}'
                  price='${price}'
                  quantity='${quantity}'
                  description='${description}'
                  imageURL='${imageURL}'
                  heroesName='${heroesName}'
                  heroesID='${heroesID}'
                  class='btn btn-outline-primary btn-sm'
                  onClick='editProduct(this)'>
                    edit
                </button>
                <button 
                  id='deleteBtn' 
                  productID='${productID}' 
                  class='btn btn-outline-danger btn-sm'
                  onClick='deleteProduct(this)'>
                    delete
                </button>
              </td>
            </tr>
          `)
<<<<<<< HEAD
=======
          let heroName = '';
          let {productID, name, price, quantity, description,imageURL, heroesID} = data;
          let heroID = heroesID;
          let link = imageURL;
          $.get('index.php/home/getAllHeroes', (res) => {
            let response = JSON.parse(res);
            
            let {status, datas} = response;
            if(status === 'ok'){
              datas.forEach((data) => {
                let {heroesID,heroesName,heroesAttr,imageURL} = data;
                if (heroID == heroesID){
                  heroName = heroesName;
                  $('#tbodyProducts').append(`
                  <tr>
                    <th scope='row'>${i+1}</th>
                    <td>${name}</td>
                    <td>${heroName}</td>
                    <td>$${price}</td>
                    <td>${quantity}</td>
                    <td>${description !== '' ? description : `<i>No Description</i>`}</td>
                    <td>
                    <button 
                        id='editBtn' 
                        productID='${productID}'
                        name='${name}'
                        price='${price}'
                        quantity='${quantity}'
                        description='${description}'
                        link='${link}'
                        heroName='${heroName}'
                        heroID='${heroID}'
                        class='btn btn-outline-primary btn-sm'
                        onClick='editProduct(this)'>
                          edit
                      </button>
                      <button 
                        id='deleteBtn' 
                        productID='${productID}' 
                        class='btn btn-outline-danger btn-sm'
                        onClick='deleteProduct(this)'>
                          delete
                      </button>
                    </td>
                  </tr>
                `)
                }
              })
            }
          })
>>>>>>> fixing search feature, adding upload image feature
=======
>>>>>>> fixing confused code
        });
      }
    });
  }

  function renderOption(){
    $.get('index.php/home/getIdHeroes', (res) => {
      let response = JSON.parse(res);
      let {status, datas} = response;
      if(status === 'ok'){
        datas.forEach((data, i) => {
          let {heroesID, heroesName} = data;
          $('#inputHeroName').append(`
<<<<<<< HEAD
<<<<<<< HEAD
            <option data-status='${heroesID}'>${heroesName}</option>
          `)
          $('#editHeroName').append(`
            <option data-status='${heroesID}'>${heroesName}</option>
=======
            <option>${heroesName}</option>
          `)
          $('#editHeroName').append(`
            <option>${heroesName}</option>
>>>>>>> fixing confused code
=======
            <option data-status='${heroesID}'>${heroesName}</option>
          `)
          $('#editHeroName').append(`
            <option data-status='${heroesID}'>${heroesName}</option>
>>>>>>> renderOption disisipi heroesID
          `)
        });
      }
    });
  }

  function deleteProduct(objBtn){
    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
      if (result.value) {
        let productID = objBtn.getAttribute('productID');

        $.post('index.php/home/deleteProduct', {productID}, (res) => {
          let response = JSON.parse(res);

          let {status, message} = response;
          if(status === 'ok'){
            Swal.fire(
              'Deleted!',
              message,
              'success'
            )
            renderAllProducts();
          }
        });
      }
    })

  }

  function editProduct(objBtn){
    let productID = objBtn.getAttribute('productID');
    let name = objBtn.getAttribute('name');
    let price = objBtn.getAttribute('price');
    let quantity = objBtn.getAttribute('quantity');
    let description = objBtn.getAttribute('description');
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fixing confused code
    let imageURL = objBtn.getAttribute('imageURL');
    let heroesName = objBtn.getAttribute('heroesName');
    let heroesID = objBtn.getAttribute('heroesID');
    
    $('#editImageLink').val(imageURL);
<<<<<<< HEAD
=======
    let link = objBtn.getAttribute('link');
    let heroName = objBtn.getAttribute('heroName');
    let heroID = objBtn.getAttribute('heroID');

    $('#editTextLink').val(link);
>>>>>>> fixing search feature, adding upload image feature
=======
>>>>>>> fixing confused code
    $('#editTextProductID').val(productID);
    $('#editHeroesID').val(heroesID);
    $('#editTextName').val(name);
    $('#editTextPrice').val(price);
    $('#editTextQuantity').val(quantity);
    $('#editTextDescription').val(description);
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
    $('#editHeroName').val(heroesName);
    $('#editPhotos').attr('src', imageURL);
=======
    $('#editHeroesName').val(heroName);
    //$('#editPhotos').html(`<image src="${link}" class="img-thumbnail"/>`);
    $('#editPhotos').attr('src', link);
>>>>>>> fixing search feature, adding upload image feature
=======
    $('#editHeroesName').val(heroesName);
=======
    $('#editHeroName').val(heroesName);
>>>>>>> renderOption disisipi heroesID
    $('#editPhotos').attr('src', imageURL);
>>>>>>> fixing confused code
    $('#editModal').modal('show');
  }

  function renderSearchedProducts(searchKeyword){
    $.post('index.php/home/getSearchedProducts', {searchKeyword}, (res) => {
      let response = JSON.parse(res);
      
      let {status, datas} = response;
      if(status === 'ok'){
        $('#tbodyProducts').html('');
        datas.forEach((data, i) => {
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> fixing confused code
          let {productID, name, price, quantity, description,imageURL, heroesID, heroesName} = data;
            $('#tbodyProducts').append(`
            <tr>
              <th scope='row'>${i+1}</th>
              <td>${name}</td>
              <td>${heroesName}</td>
              <td>$${price}</td>
              <td>${quantity}</td>
              <td>${description !== '' ? description : `<i>No Description</i>`}</td>
              <td>
              <button 
                  id='editBtn' 
                  productID='${productID}'
                  name='${name}'
                  price='${price}'
                  quantity='${quantity}'
                  description='${description}'
                  imageURL='${imageURL}'
                  heroesName='${heroesName}'
                  heroesID='${heroesID}'
                  class='btn btn-outline-primary btn-sm'
                  onClick='editProduct(this)'>
                    edit
                </button>
                <button 
                  id='deleteBtn' 
                  productID='${productID}' 
                  class='btn btn-outline-danger btn-sm'
                  onClick='deleteProduct(this)'>
                    delete
                </button>
              </td>
            </tr>
          `)
<<<<<<< HEAD
=======
          let heroName = '';
          let {productID, name, price, quantity, description,imageURL, heroesID} = data;
          let heroID = heroesID;
          let link = imageURL;
          $.get('index.php/home/getAllHeroes', (res) => {
            let response = JSON.parse(res);
            
            let {status, datas} = response;
            if(status === 'ok'){
              datas.forEach((data) => {
                let {heroesID,heroesName,heroesAttr,imageURL} = data;
                if (heroID == heroesID){
                  heroName = heroesName;
                  $('#tbodyProducts').append(`
                  <tr>
                    <th scope='row'>${i+1}</th>
                    <td>${name}</td>
                    <td>${heroName}</td>
                    <td>$${price}</td>
                    <td>${quantity}</td>
                    <td>${description !== '' ? description : `<i>No Description</i>`}</td>
                    <td>
                    <button 
                        id='editBtn' 
                        productID='${productID}'
                        name='${name}'
                        price='${price}'
                        quantity='${quantity}'
                        description='${description}'
                        link='${link}'
                        heroName='${heroName}'
                        heroID='${heroID}'
                        class='btn btn-outline-primary btn-sm'
                        onClick='editProduct(this)'>
                          edit
                      </button>
                      <button 
                        id='deleteBtn' 
                        productID='${productID}' 
                        class='btn btn-outline-danger btn-sm'
                        onClick='deleteProduct(this)'>
                          delete
                      </button>
                    </td>
                  </tr>
                `)
                }
              })
            }
          })
>>>>>>> fixing search feature, adding upload image feature
=======
>>>>>>> fixing confused code
        });
      }
    })
  }

  function resetAddNewForm(){
    $('#inputTextName').val('');
    $('#inputTextPrice').val('');
    $('#inputTextQuantity').val('');
    $('#inputTextDescription').val('');
    $('#addPhotos').attr('src', '');
  }

  function isEmpty(inputText){
    if(inputText === ''){
      return true;
    }

    return false;
  }

  function viewBeforeInsertForAdd(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
<<<<<<< HEAD
        reader.onload = function (e) {
          $('#addPhotos').html(`<img src="${e.target.result}" alt="your image" class="img-thumbnail"/>`);
=======

        reader.onload = function (e) {
            $('#addPhotos').attr('src', e.target.result);
>>>>>>> fixing search feature, adding upload image feature
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  function viewBeforeInsertForEdit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
<<<<<<< HEAD
          $('#editPhotos').attr('src', e.target.result);
=======
            $('#editPhotos').attr('src', e.target.result);
>>>>>>> fixing search feature, adding upload image feature
        }
        reader.readAsDataURL(input.files[0]);
    }
  }
</script>
