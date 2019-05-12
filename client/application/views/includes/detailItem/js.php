<script>
    $(document).ready(() => {
        let tokoDoto = getLocalStorage();
        
        let {tmpProductID,tmpHeroesID} = tokoDoto;

        fetchDetailItem(tmpProductID);
        fetchAnotherProduct(tmpHeroesID,tmpProductID);

    })

    function fetchDetailItem(tmpProductID){
        $.get('detailItem/fetchDetailItem', {tmpProductID}, (res) => {
            let response = JSON.parse(res);
            let {datas} = response;

            datas.forEach((datas) => {
                let {description,heroesID,heroesName,imageURL,name,price,productID,stock} = datas;
                
                $('.miniView1').html(`
                    <h4>${name}</h4>
                    <p>Heroes : ${heroesName}</p>
                `);
                $('.miniView2').html(`
                    <p>Stock : ${stock}</p>
                    <p>Price : $${price} </p>
                    <hr>
                    ${description}
                `);
                $('.btnAddForHp').html(`
                    <a 
                        href="#!" 
                        class="btn btn-primary btn-lg btn-block"
                        productName="${name}"
                        productID="${productID}"
                        onClick="addToCart(this)"
                    ><i class="material-icons" style="font-size: 18px; margin-right: 5px;">
                      shopping_cart
                    </i>
                    Add to cart (+1)
                    </a>
                `);
                $('.largeView').html(`
                    <h2>${name}</h2>
                    <p>Heroes : ${heroesName} </p>
                    <p>Stock : ${stock} </p>
                    <p>Price : $${price} </p>
                    <a 
                        href="#!" 
                        class="btn btn-primary btn-sm btn-block"
                        productName="${name}"
                        productID="${productID}"
                        onClick="addToCart(this)"
                    ><i class="material-icons" style="font-size: 13px; margin-right: 5px;">
                      shopping_cart
                    </i>
                    Add to cart (+1)
                    </a>
                    <hr>
                    <p>${description}</p>
                `);
                $('#productImage').attr('src', imageURL);
            })
        })
    }

    function fetchAnotherProduct(tmpHeroesID,tmpProductID){
        $.post('detailItem/fetchAnotherProduct', {tmpHeroesID}, (res) => {
            let response = JSON.parse(res);

            let {datas} = response;

            datas.forEach((data) => {
                let {description,heroesAttr,heroesID,heroesName,name,price,productID,stock,imageURL} = data;
                if(productID === tmpProductID){

                }else{
                    $('.textForAnotherProduct').html(`<h5>another item for ${heroesName} :</h5>`);
                    $('.anotherProduct').append(`
                    <div class="col-sm-3">
                        <div class="card">
                            <img src="${imageURL}" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title text-truncate" style="font-size: 15px; display: inline-block; max-width: 150px;">${name}</h5>
                                <p class="card-text" style="font-size: 12px;">
                                <a href="#! class="card-text" style="font-size: 12px;">${heroesName}</a>
                                <br />${description || '<i>No Description</i>'}
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
                    `);
                }
            })
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

        $.post('shoppingCart/updateCart', data, (res) => {
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