<script>
  $(document).ready(() => {
    fetchLatestProducts();
  })

  function fetchLatestProducts(){
    $.get('home/fetchLatestProducts', (res) => {
      let response = JSON.parse(res);
      let {datas} = response;

      $('#latestItemContainer').html('');
      datas.forEach((data) => {
        console.log(data);
        let {name, description, productID, heroesName, quantity} = data;
        const productCard = `
          <div class="col-3" style="margin-top: 20px">
            <div class="card">
              <img src="<?php echo base_url('/assets/noImage.jpg') ?>" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-truncate" style="font-size: 15px; display: inline-block; max-width: 150px;">${name}</h5>
                <p class="card-text" style="font-size: 12px;">
                  <a href="#! class="card-text" style="font-size: 12px;">${heroesName}</a>
                  <br />${description || '<i>No Description</i>'}
                  <br />Stok: ${quantity}
                </p>
                <button type="button" class="btn btn-outline-info btn-sm btn-block" style="margin-bottom: 5px">View Detail</button>
                <a 
                  href="#!" 
                  class="btn btn-primary btn-sm btn-block"
                  productName="${name}"
                  productID="${productID}"
                  onClick="addToCart(this)"
                >
                    <i class="material-icons" style="font-size: 13px; margin-right: 5px;">
                      shopping_cart
                    </i>
                    Add to cart (+1)
                </a>
              </div>
            </div>       
          </div>
        `;

        $('#latestItemContainer').append(productCard);
      })
    });
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
    $.post('cart/updateCart', data, (res) => {
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

</script>
