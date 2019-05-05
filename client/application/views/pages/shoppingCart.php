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
  <title>Shopping Cart</title>
</head>
<body style="background-color: whitesmoke">
  <?php echo $NavigationBar ?>

  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <h3 style="margin-top: 20px;">Shopping Cart</h3>
        <div id="cartListContainer">
          <!-- Content Here -->
          
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>
</html>
