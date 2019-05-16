<script>
  $(document).ready(() => {
    fetchProfileInfo();

    $('#formEditProfile').submit((e) => {
      e.preventDefault();
      
      let userID = $('#userID').val();
      let firstName = $('#firstName').val();
      let lastName = $('#lastName').val();
      let email = $('#email').val();
      let fullName = `${firstName} ${lastName}`;

      let data = {
        fullName,
        userID,
        email,
      }
      $.post('editProfile/updateProfileInfo', data, (res) => {
        let response = JSON.parse(res);
        let {status, message} = response;

        if(status === 'ok'){
          Swal.fire({
            title: 'Success!',
            text: message,
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Great!'
          }).then((result) => {
            if (result.value) {
              location.reload();
            }
          })
        }
      })
    })

    $('#formChangePassword').submit((e) => {
      e.preventDefault();

      let userID = $('#userID').val().trim();
      let oldPassword = $('#oldPassword').val().trim();
      let newPassword1 = $('#newPassword1').val().trim();
      let newPassword2 = $('#newPassword2').val().trim();
      
      let data = {
        userID,
        oldPassword,
        newPassword1,
        newPassword2,
      }
      $.post('editProfile/changePassword', data, (res) => {
        let response = JSON.parse(res);
        let {status, message} = response;

        if(status === 'ok') {
          Swal.fire({
            title: 'Success!',
            text: message,
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Great!'
          }).then((result) => {
            if (result.value) {
              location.reload();
            }
          })
        }
        else{
          Swal.fire('Error!', message, 'error');
        }    
      })
    })
  })

  function fetchProfileInfo() {
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('editProfile/fetchProfileInfo', {userID}, (res) => {
      let response = JSON.parse(res);
      let {data} = response;
      let profileInfo = data[0];
      
      let {email, nama, userID} = profileInfo;
      let name = nama.split(' ');
      
      $('#userID').val(userID);
      $('#firstName').val(name[0]);
      $('#lastName').val(name[1]);
      $('#email').val(email);
    })
  }

</script>
