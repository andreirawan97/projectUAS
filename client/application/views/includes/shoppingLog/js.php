<script>
  $(document).ready(() => {
    fetchShoppingLog();
  })

  function fetchShoppingLog() {
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('shoppingLog/fetchShoppingLog', {userID}, (res) => {
      let response = JSON.parse(res);
      let {datas} = response;
      datas.forEach((data) => {
        let {name, quantity, stock, cartID, price, productID, imageURL, datePurchase} = data;
        const bayar = price * quantity;

        const logCard = `
          <div class="card" style="padding: 20px 20px 20px 20px; margin: 20px 0px 20px 0px;">
            <div class="row">
              <div class="col-lg-4 col-sm-6">
                <img src="${imageURL}" class="card-img-top" alt="...">
              </div>
              <div class="col-lg-7 col-sm-5" style="padding: 10px 10px 10px 10px;">
                <h4 class="text-truncate" style="display: inline-block; max-width: 400px;">${name}</h4>
                <p>Harga: ${bayar} Shell</p>
                <p>Tanggal Beli: ${moment(datePurchase).format('MMMM Do YYYY, h:mm:ss a')}</p>
                <div class="input-group input-group-sm mb-3" style="width: 40%">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm${productID}" aria-label="Quantity must be less than or equal to ${stock}">Quantity</span>
                  </div>
                  <input disabled id="inputTextQuantity${productID}" value="${quantity}" productID="${productID}" stock="${stock}" onChange="onChangeQuantity(this)" type="number" max="${stock}" min="1" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                </div>
              </div>
            </div>
          </div>
        `
        $('#shoppingLogContent').append(logCard);
      })
    })
  }

</script>
