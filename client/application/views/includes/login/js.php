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

        $.post('index.php/login/loginAction', data, (res) => {
          let response = JSON.parse(res);

          let {status, message} = response;
          if(status === 'ok'){
            Swal.fire('Success!', message, 'success');
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
