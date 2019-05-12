<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" />
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  
  <?php echo $library ?>
  <?php echo $js ?>
  <?php echo $css ?>
  <title>Signup</title>
</head>
<body>
<div class="layout-transparent mdl-layout mdl-js-layout" style="display: flex; flex: 1; height: 100vh; justify-content: left; align-items: left">
    <div  style="height: 450px; width: 800px; background-image: white; border-radius: 20px; padding: 40px 80px 40px 80px;">
      <!-- Sidebar/menu -->
      <nav class="browser-default mdl-navigation w3-collapse w3-transparent w3-animate-left">
        <a style="margin-left:67px; color: white;"class="mdl-navigation__link" href="signup/goToLogin">Already have an account? Login Now!</a>
      </nav>
      <nav class=" w3-collapse w3-transparent w3-animate-left" style="margin-top: 10px;" id="mySidebar"><br>
          <div class="w3-container" style="color : white;" >
          <h4 style="margin-left:50px; font-size:50px">SignUp</h4>
        <form id="formSignup" style="margin-top: 10px; margin-left: 50px">
              <div class="collumn" style="margin-bottom:20px">
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                  <input autocorrect="off" autocomplete="off" id="userID" class="mdl-textfield__input mdl-color-text--grey" name="userID" type="text">
                  <label class="mdl-textfield__label mdl-color-text--white" for="userID">Username</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                  <input autocorrect="off" autocomplete="off" id="firstName" class="mdl-textfield__input mdl-color-text--grey" name="firstName" type="text">
                  <label class="mdl-textfield__label mdl-color-text--white" for="firstName">First Name</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                  <input autocorrect="off" autocomplete="off" id="lastName" class="mdl-textfield__input mdl-color-text--grey" name="lastName" type="text">
                  <label class="mdl-textfield__label mdl-color-text--white" for="lastName">Last Name</label>
                </div>

                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                  <input autocorrect="off" autocomplete="off" id="email" name="email" class="mdl-textfield__input mdl-color-text--grey" type="email" class="validate">
                  <label class="mdl-textfield__label mdl-color-text--white" for="email">Email</label>
                </div>
                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label ">
                  <input autocorrect="off" autocomplete="off" id="password" class="mdl-textfield__input mdl-color-text--grey" name="password" type="password" class="validate" >
                  <label class="mdl-textfield__label mdl-color-text--white" for="password">Password</label>
                </div>
                <i id="iconEye" class="fa fa-eye" onclick="revealPass()"></i> 
                <label for="showPassword" style="font-size:12px; font-weight:light">Show Password</label>
              </div>

              <input class="btn" type="submit" value="SignUp!" style="font-size: 20px; width: 50%; font-weight:bold; color:black; background-color: grey">
            </form>
        </div>
        <div class="w3-bar-block">
        </div>
      </nav>

    </div>
  </div>
</body>

</html>
