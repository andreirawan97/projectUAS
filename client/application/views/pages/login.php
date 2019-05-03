<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

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
  <header class="mdl-layout__header mdl-layout__header--transparent">
    <div class="mdl-layout__header-row">
      <!-- Title -->
      <span class="mdl-layout-title">Welcome to TokoDoto</span>
      <!-- Add spacer, to align navigation to the right -->
      <div class="mdl-layout-spacer"></div>
      <!-- Navigation -->
      <nav class="browser-default mdl-navigation">
        <a class="mdl-navigation__link" href="index.php/login/goToSignup">Don't have an account? Signup Now!</a>
      </nav>
    </div>
  </header>
  <main class="mdl-layout__content centerVerticalHorizontal">
    <div class="mdl-grid">
      <div class="mdl-cell mdl-cell--2-col"></div>
      <div class="mdl-cell mdl-cell--8-col centerVerticalHorizontal">
        <!-- Login Card -->
        <div class="mdl-card mdl-shadow--2dp customCardStyle">
          <!-- Card Content -->
          <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--2-col"></div>
            <div class="mdl-cell mdl-cell--8-col">
            <form action="#!" id="loginForm">
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input autocorrect="off" autocomplete="off" class="mdl-textfield__input" type="text" id="username">
                <label class="mdl-textfield__label" for="username">Username</label>
              </div>
              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input  class="mdl-textfield__input" type="password" id="password">
                <label class="mdl-textfield__label" for="password">Password</label>
              </div>

              <input type="submit" value="Login" class="mdl-button mdl-js-button mdl-button--raised mdl-button--accent right">
            </form>
            </div>
            <div class="mdl-cell mdl-cell--2-col"></div>
          </div>
        </div>
      </div>
      <div class="mdl-cell mdl-cell--2-col"></div>
    </div>
  </main>
</div>
  
</body>
</html>
