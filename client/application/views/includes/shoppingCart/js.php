<script>
  let totalProduct = 0;

  $(document).ready(() => {
    fetchShoppingCart();

    $('#btnCheckout').click(() => {
      Swal.fire({
        title: 'Checkout',
        text: "Are you sure?",
        type: 'question',
        showCancelButton: true,
        confirmButtonColor: 'green',
        confirmButtonText: 'Confirm'
      }).then((result) => {
        if (result.value) {
          if(totalProduct === 0){
            Swal.fire('Oopsie!', 'Keranjang kosong!', 'error');
          }else{
            checkoutProduct();
          }
        }
      })
    })
  })

  function checkoutProduct(){
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('shoppingCart/checkout', {userID}, (res) => {
      let response = JSON.parse(res);
      let {status, message} = response;
      
      if(status === 'ok'){
        Swal.fire('Thank you!', message, 'success');
        _refreshNavbar();
        fetchShoppingCart();
      }
      else{
        Swal.fire('Oopsie!', message, 'error');
      }
    })
  }

  function fetchShoppingCart(){
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('shoppingCart/getCart', {userID}, (res) => {
      let response = JSON.parse(res);
      let {datas} = response;
      let totalBayar = 0;
      totalProduct = 0;
      $('#cartListContainer').html('');

      if(!datas.length){
        $('#cartListContainer').html('<h5 style="margin-top: 20px; color: grey;">Nothing in here. Please buy something :(</h5>');
      }

      datas.forEach((data) => {
        let {name, quantity, stock, cartID, price, productID,imageURL} = data;
        totalProduct += 1;
        totalBayar += price * quantity;
        const card = `
          <div class="card" style="padding: 20px 20px 20px 20px; margin: 20px 0px 20px 0px;">
            <div class="row">
              <div class="col-lg-4 col-sm-6">
                <img src="${imageURL}" class="card-img-top" alt="...">
              </div>
              <div class="col-lg-7 col-sm-5" style="padding: 10px 10px 10px 10px;">
                <h4 class="text-truncate" style="display: inline-block; max-width: 400px;">${name}</h4>
                <p>Stok Tersedia: ${stock} <br />Harga Satuan: ${price} Shell</p>
                <div class="input-group input-group-sm mb-3" style="width: 40%">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm${productID}" aria-label="Quantity must be less than or equal to ${stock}">Quantity</span>
                  </div>
                  <input id="inputTextQuantity${productID}" value="${quantity}" productID="${productID}" stock="${stock}" onChange="onChangeQuantity(this)" type="number" max="${stock}" min="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
              </div>
              <div class="col-lg-1 col-sm-1">
                <a 
                  href="#!"
                  class=""
                  onClick="deleteCart(this)"
                  cartID="${cartID}"
                  style="float: right;"
                >
                  <i class="material-icons" style="font-size: 25px; color: #d32f2f;">
                    delete_forever
                  </i>
                </a>
              </div>
            </div>
          </div>
        `

        $('#cartListContainer').append(card);
      })

      const info = `
        <div class="row" style="display: flex; justify-content: space-between; padding: 0px 15px 0px 15px;">
          <h5 id="totalShell">Total Shell: NaN</h5>
          <button id="btnCheckout" class="btn btn-success btn-sm"><i class="material-icons">shopping_basket</i> Checkout</button>
        </div>
      `
      $('#shoppingCartContainer').append(info);
      $('#totalShell').html(`Total Shell: ${totalBayar}`);
    })
  }

  function deleteCart(btnObject){
    let cartID = btnObject.getAttribute('cartID');
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('shoppingCart/deleteCart', {userID, cartID}, (res) => {
      let response = JSON.parse(res);
      let {message, status} = response;
      if(status = 'ok'){
        iziToast.show({
          title: 'Success',
          message,
          color: 'green',
          timeout: 3000,
          position: 'bottomCenter'
        });

        fetchShoppingCart();
        _getCart();
      }
    })
  }

  function addToCart(btnObject){
    let productName = btnObject.getAttribute('productName');
    let productID = btnObject.getAttribute('productID');

    let {userData} = getLocalStorage();
    let {userID} = userData;

    let data = {
      userID,
      productID,
      quantity: 1,
    }
    $.post('home/updateCart', data, (res) => {
      let response = JSON.parse(res);
      
      _getCart();
    })

    // Make the toast!!!  
    iziToast.show({
      title: 'Success',
      message: 'Added to cart',
      color: 'green',
      timeout: 3000,
      position: 'bottomCenter'
    });
  }

  function onChangeQuantity(btnObject){
    let productID = btnObject.getAttribute('productID');
    let quantityText = '#inputTextQuantity' + productID;
    let quantity = $(quantityText).val().trim();
    let stock = btnObject.getAttribute('stock');
    let infoText = '#inputGroup-sizing-sm' + productID;
    
    if(quantity <= stock){
      $(infoText).attr('class', 'input-group-text');

      let {userData} = getLocalStorage();
      let {userID} = userData;
      let data = {
        userID,
        productID,
        quantity,
      }
      
      $.post('shoppingCart/updateCart', data, (res) => {
        let response = JSON.parse(res);
        
        _getCart();
      })

      fetchShoppingCart();
    }else{
      $(infoText).attr('class', 'input-group-text hint--bottom hint--bounce hint--error hint--rounded hint--always');
    }
  }
</script>
