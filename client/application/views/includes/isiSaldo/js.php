<script>
  $(document).ready(() => {
    
  })

  function topUp(objBtn) {
    let {userData} = getLocalStorage();
    let {userID} = userData;

    let topUpValue = objBtn.getAttribute('shell');

    $('#loadingModal').modal({backdrop: 'static', keyboard: false});
    $('#loadingModal').modal('show');
    setTimeout(() => {
      let data = {
        userID,
        topUpValue,
      }
      $.post('isiSaldo/topUp', data, (res) => {
        let response = JSON.parse(res);
        let {status, message} = response;

        if(status === 'ok'){
          $('#loadingModal').modal('hide');
          Swal.fire('Success!', message, 'success');
          _getSaldo();
        }
      })
    }, 3000);
  }
</script>
