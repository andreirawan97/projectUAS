<script>
  $(document).ready(() => {
    renderAllProducts();

    $('#submitBtn').click(() => {
      let name = $('#inputTextName').val().trim();
      let price = $('#inputTextPrice').val().trim();
      let quantity = $('#inputTextQuantity').val().trim();
      let description = $('#inputTextDescription').val().trim();
      let imageURL = $('#inputTextImageURL').val().trim();
      
      if(isEmpty(name) || isEmpty(price) || isEmpty(quantity)){
        Swal.fire(
          'Error!',
          'Name, price, and quantity cannot be empty!',
          'error'
        )
      }
      else{
        let data = {
          name,
          price,
          quantity,
          description,
          imageURL
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
    })
  })

  function renderAllProducts(){
    $.get('index.php/home/getAllProducts', (res) => {
      let response = JSON.parse(res);

      let {status, datas} = response;
      if(status === 'ok'){
        $('#tbodyProducts').html('');
        datas.forEach((data, i) => {
          let {productID, name, price, quantity, description} = data;

          $('#tbodyProducts').append(`
            <tr>
              <th scope='row'>${i+1}</th>
              <td>${name}</td>
              <td>$${price}</td>
              <td>${quantity}</td>
              <td>${description !== '' ? description : `<i>No Description</i>`}</td>
              <td>
                <button 
                  id='editBtn' 
                  productID='${productID}' 
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
        resetForm();
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
        console.log(productID);

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

  function resetForm(){
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
