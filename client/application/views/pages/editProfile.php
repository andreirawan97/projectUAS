<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <?php echo $library ?>
  <?php echo $localStorageHelper ?>
  <?php echo $js ?>
  <?php echo $css ?>
  <title>Edit Profile</title>
</head>
<body>
  <?php echo $NavigationBar ?>
  
  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <h3 style="margin-top: 20px;">Edit Profile</h3>

        <form id="formEditProfile" style="margin-top: 20px;">
          <input hidden disabled id="userID" />
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="firstName">First name</label>
              <input autocomplete="off" type="text" class="form-control" id="firstName" placeholder="First name...">
            </div>
            <div class="form-group col-md-6">
              <label for="lastName">Last name</label>
              <input autocomplete="off" type="text" class="form-control" id="lastName" placeholder="Last name...">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h4 style="margin-top: 40px;">Change Password</h4>
        <form id="formChangePassword" style="margin-top: 20px;">
          <div class="form-group">
            <label for="oldPassword">Old Password</label>
            <input type="password" class="form-control" id="oldPassword" placeholder="Old password...">
          </div>
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="newPassword1">New Password</label>
              <input autocomplete="off" type="password" class="form-control" id="newPassword1" placeholder="New password...">
            </div>
            <div class="form-group col-md-6">
              <label for="newPassword2">Repeat New Password</label>
              <input autocomplete="off" type="password" class="form-control" id="newPassword2" placeholder="Enter new password again...">
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Update password</button>
        </form>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>
</html>
