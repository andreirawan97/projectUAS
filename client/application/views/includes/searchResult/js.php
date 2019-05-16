<script>
  $(document).ready(() => {
    let {searchQuery} = getLocalStorage();
     
    fetchSearchResult(searchQuery);
  })

  function fetchSearchResult(searchQuery){
    $.post('searchResult/fetchSearchResult', {searchQuery}, (res) => {
      let response = JSON.parse(res);
      let {count, datas} = response;

      $('#showResultFor').html(`Show ${count} result for "${searchQuery}"`);
      $('#resultContainer').html('');
      datas.forEach((data) => {
        let {name, price, productID, heroesName, stock, imageURL,heroesID} = data;
        
        const productCard = `
          <div class="col-lg-4 col-sm-12" style="margin-top: 20px">
            <div class="card">
              <img src="${imageURL}" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title text-truncate" style="font-size: 15px; display: inline-block; max-width: 150px;">${name}</h5>
                <p class="card-text" style="font-size: 12px;">
                  <a href="#! class="card-text" style="font-size: 12px;">${heroesName}</a>
                  <br />Harga: ${price} Shell
                  <br />Stok: ${stock}
                </p>
                <button
                  id="btnDetail"
                  productID="${productID}"
                  heroesID="${heroesID}"
                  onClick='goToDetail(this)'
                  type="button" 
                  class="btn btn-outline-info btn-sm btn-block btnDetail"
                  style="margin-bottom: 5px">View Detail
                </button>
              </div>
            </div>       
          </div>
        `;

        $('#resultContainer').append(productCard);
      })
      
    })
  }

  function goToDetail(btnObject){
    let productID = btnObject.getAttribute('productID');
    let heroesID = btnObject.getAttribute('heroesID');
    
    let tokoDoto = getLocalStorage();

    let newTokoDoto = {
      ...tokoDoto,
      tmpProductID : productID,
      tmpHeroesID : heroesID
    }
    
    setLocalStorage(newTokoDoto);
    location.href= 'home/goToDetail';
  }
</script>
