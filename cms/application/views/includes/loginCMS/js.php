<script>
  $(document).ready(() => {
    $('#loginForm').on('submit', (e) => {
      e.preventDefault();
      
      let userID = $('#username').val().trim();
      let password = $('#password').val().trim();
      
      if(userID !== '' && password !== ''){
        let data = {
          userID,
          password,
        }

        $.post('loginCMS/loginCMSAction', data, (res) => {
          let response = JSON.parse(res);

          let {status, message} = response;
          if(status === 'ok'){
            localStorage.setItem("user",userID);
            let test = localStorage.getItem("user");
            
            Swal.fire({
              title: 'Success!',
              text: message,
              type: 'success',
              showCancelButton: false,
              confirmButtonText: 'Take me in!'
            }).then((result) => {
              location.href = 'loginCMS/goToHome';
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
