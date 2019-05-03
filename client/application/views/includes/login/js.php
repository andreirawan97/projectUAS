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
        location.href = 'index.php/login/goToHome';
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

        $.post('index.php/login/loginAction', data, (res) => {
          let response = JSON.parse(res);

          let {status, message} = response;
          if(status === 'ok'){
            Swal.fire('Success!', message, 'success');
          
            let newLocalStorage = {
              isLogin: true,
              userData: {
                userID,
              }
            }
            setLocalStorage(newLocalStorage);

            location.href = 'index.php/login/goToHome';
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
