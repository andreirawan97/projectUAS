<script>
    $(document).ready(() => {
        fetchHistory();
    })

    function fetchHistory() {
        $.get('history/fetchHistory', (res) => {
            let response = JSON.parse(res);

            let {status, datas} = response;
            if(status === 'ok'){
                $('#tbodyHistory').html('');
                datas.forEach((data,i) => {
                    let {datePurchase, name, price, quantity, userID} = data;
                    let total = quantity*price;
                    $('#tbodyHistory').append(`
                        <tr>
                            <th scope='row'>${i+1}</th>
                            <th>${name}</th>
                            <th>${userID}</th>
                            <th>${quantity}</th>
                            <th>${total}</th>
                            <th>${datePurchase}</th>
                        </tr>
                    `);
                })
            }
        })
    }

    function goToHome() {
        location.href="loginCMS/goToHome";
    }

    function logOut(){
        localStorage.clear();
        location.href = 'home/goToLoginCMS';
    }
</script>