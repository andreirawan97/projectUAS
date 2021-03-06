<script>
  $(document).ready(() => {
    renderAllProducts();
    renderOption();
    let user = localStorage.getItem("user");
    if(user === null){
      Swal.fire({
        title: 'Error!',
        text: 'You must login to acces this feature!',
        type: 'error',
        showCancelButton: false,
        confirmButtonText: 'Bring me to login!'
      }).then((result) => {
        location.href = 'home/goToLoginCMS';
      })
    }


    $('#submitBtn').click(() => {
      let name = $('#inputTextName').val().trim();
      let price = $('#inputTextPrice').val().trim();
      let stock = $('#inputTextQuantity').val().trim();
      let description = $('#inputTextDescription').val().trim();
      let file = $('#inputTextImageURL').get(0).files;
      let heroName = $('#inputHeroName').val().trim();
      let heroID = $('#inputHeroName option:selected').data('status');

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
          
          if(isEmpty(name) || isEmpty(price) || isEmpty(stock)){
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
              stock,
              description,
              imageURL,
              heroID
            }

            $.post('home/addNewProduct', data, (res) => {
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
        if(isEmpty(name) || isEmpty(price) || isEmpty(stock)){
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
            stock,
            description,
            imageURL,
            heroID
          }

          $.post('home/addNewProduct', data, (res) => {
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
      }
    })

    $('#updateBtn').click(() => {
      let productID = $('#editTextProductID').val().trim();
      let name = $('#editTextName').val().trim();
      let price = $('#editTextPrice').val().trim();
      let stock = $('#editTextQuantity').val().trim();
      let description = $('#editTextDescription').val().trim();
      let heroesName = $('#editHeroName').val().trim();
      let heroesID = $('#editHeroesID').val().trim();
      let imageURL = $('#editImageLink').val().trim();
      let file = $('#editTextImageURL').get(0).files;
      
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
        $('#loadingEdit').attr('class', 'loading d-flex align-items-center');
        $.ajax(settings).done(function(res) {
          //If the request is complete, the response will be the URL of uploaded image
          $('#loadingEdit').attr('class', 'loading d-none align-items-center');
          let response = JSON.parse(res);

          let {data} = response;
          let {link} = data;
          imageURL = link;
          
          if(isEmpty(name) || isEmpty(price) || isEmpty(stock)){
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
              stock,
              description,
              imageURL,
              productID,
              heroesID
            }

            $.post('home/updateProduct', data, (res) => {
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
        if(isEmpty(name) || isEmpty(price) || isEmpty(stock)){
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
            stock,
            description,
            imageURL,
            productID,
            heroesID
          }

          $.post('home/updateProduct', data, (res) => {
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
    $.get('home/getAllProducts', (res) => {
      let response = JSON.parse(res);
      
      let {status, datas} = response;
      if(status === 'ok'){
        $('#tbodyProducts').html('');
        datas.forEach((data, i) => {
          let {productID, name, price, stock, description,imageURL, heroesID, heroesName} = data;
            $('#tbodyProducts').append(`
            <tr>
              <th scope='row'>${i+1}</th>
              <td>${name}</td>
              <td>${heroesName}</td>
              <td>$${price}</td>
              <td>${stock}</td>
              <td>${description !== '' ? description : `<i>No Description</i>`}</td>
              <td>
              <button 
                  id='editBtn' 
                  productID='${productID}'
                  name='${name}'
                  price='${price}'
                  stock='${stock}'
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
        });
      }
    });
  }

  function renderOption(){
    $.get('home/getIdHeroes', (res) => {
      let response = JSON.parse(res);
      let {status, datas} = response;
      if(status === 'ok'){
        datas.forEach((data, i) => {
          let {heroesID, heroesName} = data;
          $('#inputHeroName').append(`
            <option data-status='${heroesID}'>${heroesName}</option>
          `)
          $('#editHeroName').append(`
            <option data-status='${heroesID}'>${heroesName}</option>
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

        $.post('home/deleteProduct', {productID}, (res) => {
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
    let stock = objBtn.getAttribute('stock');
    let description = objBtn.getAttribute('description');
    let imageURL = objBtn.getAttribute('imageURL');
    let heroesName = objBtn.getAttribute('heroesName');
    let heroesID = objBtn.getAttribute('heroesID');
    
    $('#editImageLink').val(imageURL);
    $('#editTextProductID').val(productID);
    $('#editHeroesID').val(heroesID);
    $('#editTextName').val(name);
    $('#editTextPrice').val(price);
    $('#editTextQuantity').val(stock);
    $('#editTextDescription').val(description);
    $('#editHeroName').val(heroesName);
    $('#editPhotos').attr('src', imageURL);
    $('#editModal').modal('show');
  }

  function renderSearchedProducts(searchKeyword){
    $.post('home/getSearchedProducts', {searchKeyword}, (res) => {
      let response = JSON.parse(res);
      
      let {status, datas} = response;
      if(status === 'ok'){
        $('#tbodyProducts').html('');
        datas.forEach((data, i) => {
          let {productID, name, price, stock, description,imageURL, heroesID, heroesName} = data;
            $('#tbodyProducts').append(`
            <tr>
              <th scope='row'>${i+1}</th>
              <td>${name}</td>
              <td>${heroesName}</td>
              <td>$${price}</td>
              <td>${stock}</td>
              <td>${description !== '' ? description : `<i>No Description</i>`}</td>
              <td>
              <button 
                  id='editBtn' 
                  productID='${productID}'
                  name='${name}'
                  price='${price}'
                  stock='${stock}'
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
        reader.onload = function (e) {
          $('#addPhotos').html(`<img src="${e.target.result}" alt="your image" class="img-thumbnail"/>`);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  function viewBeforeInsertForEdit(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          $('#editPhotos').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
  }

  function logOut(){
    localStorage.clear();
    location.href = 'home/goToLoginCMS';
  }
</script>
