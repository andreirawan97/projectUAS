<script>
  $(document).ready(() => {
    renderAllProducts();
    renderOption();

    $('#submitBtn').click(() => {
      let name = $('#inputTextName').val().trim();
      let price = $('#inputTextPrice').val().trim();
      let quantity = $('#inputTextQuantity').val().trim();
      let description = $('#inputTextDescription').val().trim();
      let imageURL = $('#inputTextImageURL').val().trim();
      let heroName = $('#inputHeroesName').val().trim();
      let heroID = '';

      $.get('index.php/home/getAllHeroes', (res) => {
        let response = JSON.parse(res);
        
        let {status, datas} = response;
        if(status === 'ok'){
          datas.forEach((data, i) => {
            let {heroesID, heroesName, heroesAttr, imageURL} = data;
            if (heroName == heroesName){
              heroID = heroesID;
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
            }
          });
        }
      });
    })

    $('#updateBtn').click(() => {
      let productID = $('#editTextProductID').val().trim();
      let name = $('#editTextName').val().trim();
      let price = $('#editTextPrice').val().trim();
      let quantity = $('#editTextQuantity').val().trim();
      let description = $('#editTextDescription').val().trim();
      let imageURL = $('#editTextImageURL').val().trim();
      let heroName = $('#editHeroesName').val().trim();
      let heroID = '';

      $.get('index.php/home/getAllHeroes', (res) => {
        let response = JSON.parse(res);
        let heroID = '';
        let {status,datas} = response;
        if(status === 'ok'){
          datas.forEach((data) => {
            let {heroesID, heroesName, heroesAttr, imageURL} = data;
            if (heroName == heroesName){
              heroID = heroesID;
            }
            if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
              Swal.fire(
                'Error!',
                'Name, price, or quantity cannot be empty!',
                'error'
              )
            }
            else{
              let data = {
                productID,
                name,
                price,
                quantity,
                description,
                imageURL,
                heroID
              }


              $.post('index.php/home/updateProduct', data, (res) => {
                let response = JSON.parse(res);

                let {status, message} = response;

                if(status === 'ok'){
                  Swal.fire(
                    'Success!',
                    message,
                    'success'
                  )
                  $('#editModal').modal('hide');
                  renderAllProducts();
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
          })
        }
      })
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
          let {productID, name, price, quantity, description,imageURL,heroesID,heroesName} = data;

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
        });
      }
    });
  }

  function renderOption(){
    $.get('index.php/home/getAllHeroes', (res) => {
      let response = JSON.parse(res);
      
      let {status, datas} = response;
      if(status === 'ok'){
        datas.forEach((data, i) => {
          let {heroesID, heroesName, heroesAttr, imageURL} = data;
          $('#inputHeroesName').append(`
            <option>${heroesName}</option>
          `)
          $('#editHeroesName').append(`
            <option>${heroesName}</option>
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
    let imageURL = objBtn.getAttribute('imageURL');
    let heroesName = objBtn.getAttribute('heroesName');
    let heroesID = objBtn.getAttribute('heroesID');

    $('#editTextProductID').val(productID);
    $('#editTextName').val(name);
    $('#editTextPrice').val(price);
    $('#editTextQuantity').val(quantity);
    $('#editTextDescription').val(description);
    $('#editTextImageURL').val(imageURL);
    $('#editHeroesName').val(heroesName);
    $('#editModal').modal('show');
  }

  function renderSearchedProducts(searchKeyword){
    $.post('index.php/home/getSearchedProducts', {searchKeyword}, (res) => {
      let response = JSON.parse(res);
      
      let {status, datas} = response;
      if(status === 'ok'){
        $('#tbodyProducts').html('');
   
        datas.forEach((data, i) => {
          let {productID, name, price, quantity, description,imageURL,heroesID,heroesName} = data;

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
        });
      }
    })
  }

  function resetAddNewForm(){
    $('#inputTextName').val('');
    $('#inputTextPrice').val('');
    $('#inputTextQuantity').val('');
    $('#inputTextDescription').val('');
    $('#inputTextImageURL').val('');
  }

  function isEmpty(inputText){
    if(inputText === ''){
      return true;
    }

    return false;
  }
</script>
