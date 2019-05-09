<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue_grey-indigo.min.css" />

  <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
  
  <?php echo $localStorageHelper ?>
  <?php echo $js ?>
  <?php echo $css ?>
  <title>Welcome !</title>
</head>
<body>
<div class="layout-transparent mdl-layout mdl-js-layout">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <img style="margin-top: 4%; width: 12%" src="../assets/tokoDoto2.png">
      <!-- Add spacer, to align navigation to the right -->
      <div class="w3-collapse w3-transparent w3-animate-left mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="browser-default mdl-navigation">
        <a class="mdl-navigation__link" href="login/goToSignup">Don't have an account? Signup Now!</a>
      </nav>
    </div>
  <main class="mdl-layout__content centerVerticalHorizontal">
    <div class="mdl-grid">
      <div class="mdl-cell mdl-cell--8-col centerVerticalHorizontal">
        <!-- Login Card -->
        <div class="mdl-card mdl-shadow--2dp customCardStyle" style="position:absolute;border-radius : 12px;">
          <!-- Card Content -->
          <div class="mdl-grid w3-animate-bottom">
            <div style="text-align:center;">
            <form class="w3-collapse" action="#!" id="loginForm">
              <h4 style="text-align:center; font-size:150%">Login</h4>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input autocorrect="off" autocomplete="off" class="mdl-textfield__input mdl-color-text--grey" type="text" id="username">
                <label class="mdl-textfield__label mdl-color-text--black"for="username">Username</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input  class="mdl-textfield__input mdl-color-text--grey" type="password" id="password">
                <label class="mdl-textfield__label mdl-color-text--black" for="password">Password</label>
              </div>
              <br>
              <input type="submit" style="background-color: #8D6E63; border-radius: 5px;" value="Login" class="mdl-button mdl-js-button">
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</div>
  
</body>
</html>
