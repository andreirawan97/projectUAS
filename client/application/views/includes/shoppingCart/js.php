<script>
  $(document).ready(() => {
    fetchShoppingCart();
  })

  function fetchShoppingCart(){
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('shoppingCart/getCart', {userID}, (res) => {
      let response = JSON.parse(res);
      let {datas} = response;
      console.log(datas);

      $('#cartListContainer').html('');

      if(!datas.length){
        $('#cartListContainer').html('<h5 style="margin-top: 20px; color: grey;">Nothing in here. Please buy something :(</h5>');
      }

      datas.forEach((data) => {
        let {name, quantity, stock, cartID, price} = data;

        const card = `
          <div class="card" style="padding: 20px 20px 20px 20px; margin: 20px 0px 20px 0px;">
            <div class="row">
              <div class="col-4">
                <img src="<?php echo base_url('assets/noImage.jpg') ?>" class="card-img-top" alt="..." style="width: 150px;">
              </div>
              <div class="col-7" style="padding: 10px 10px 10px 10px;">
                <h4 class="text-truncate" style="display: inline-block; max-width: 400px;">${name}</h4>
                <p>Stok Tersedia: ${stock} <br />Harga Satuan: ${price} Shell</p>

                <div class="input-group input-group-sm mb-3" style="width: 40%">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Quantity</span>
                  </div>
                  <input disabled id="inputTextQuantity" value="${quantity}" onKeyUp="onKeyUpQuantity(this)" type="number" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
              </div>
              <div class="col-1">
                <a 
                  href="#!"
                  onClick="deleteCart(this)"
                  cartID="${cartID}"
                  style="float: right;"
                >
                  <i class="material-icons" style="font-size: 25px; color: grey;">
                    close
                  </i>
                </a>
              </div>
            </div>
          </div>
        `

        $('#cartListContainer').append(card);
      })
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

</script>
