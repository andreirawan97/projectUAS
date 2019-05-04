<script>
  $(document).ready(() => {
    // Check if exist or not
    if(!checkLocalStorage()){
      initializeLocalStorage();
    }
    else{
      // Check login status;
      let {isLogin, userData} = getLocalStorage();

      if(isLogin){
        location.href = 'login/goToHome';
      }
    }

    $('#loginForm').on('submit', (e) => {
      e.preventDefault();

      let userID = $('#username').val().trim();
      let password = $('#password').val().trim();

      if(userID !== '' && password !== ''){
        let data = {
          userID,
          password,
        }

        $.post('login/loginAction', data, (res) => {
          let response = JSON.parse(res);

          let {status, message} = response;
          if(status === 'ok'){
            Swal.fire({
              title: 'Success!',
              text: message,
              type: 'success',
              showCancelButton: false,
              confirmButtonText: 'Take me in!'
            }).then((result) => {
              let newLocalStorage = {
                isLogin: true,
                userData: {
                  userID,
                }
              }
              setLocalStorage(newLocalStorage);

              location.href = 'login/goToHome';
            })  
          }
          else{
            Swal.fire('Error!', message, 'error');
          }
        });
      }
      else{
        Swal.fire('Error!', 'All field cannot be empty!', 'error');
      }
    })
  })

</script>
