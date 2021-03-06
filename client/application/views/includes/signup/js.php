<script>
$(document).ready(() => {

  $('#btn_goToLogin').click(() => {
    location.href = 'login.php';
  });

  $('#formSignup').on('submit', (e) => {
    e.preventDefault();

    let inputtedFirstName = $('#firstName')
      .val()
      .trim();
    let inputtedLastName = $('#lastName')
      .val()
      .trim();
    let inputtedEmail = $('#email')
      .val()
      .trim();
    let inputtedPassword = $('#password')
      .val()
      .trim();
    let inputtedUserID = $('#userID')
      .val()
      .trim();
   
    if (
      inputtedFirstName === '' ||
      inputtedLastName === '' ||
      inputtedEmail === '' ||
      inputtedPassword === '' 
    ) {
      Swal.fire('Error', 'Please fill all the form!', 'error');
    } else {
      let inputtedFullName = `${inputtedFirstName} ${inputtedLastName}`;

      let data = {
        inputtedFullName: inputtedFullName,
        inputtedUserID: inputtedUserID,
        inputtedEmail: inputtedEmail,
        inputtedPassword: inputtedPassword,
        
      };

      $.post('signup/signupAction', data, (res) => {
        let response = JSON.parse(res);
        let {status, message} = response;
        console.log(response);
        if (status === 'ok') {
          Swal.fire({
            title: 'Success!',
            text: message,
            type: 'success',
            showCancelButton: false,
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Login Now!',
          }).then((result) => {
            if (result.value) {
              location.href = 'signup/goToLogin';
            }
          });
        } else {
          Swal.fire('Error', message, 'error');
        }
      });
    }
  });
});

function revealPass() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }

  var eye = $('#iconEye').attr('class');
  if(eye === 'fa fa-eye'){
    $('#iconEye').attr('class', 'fa fa-eye-slash');
  }else{
    $('#iconEye').attr('class', 'fa fa-eye');
  }
}

</script>