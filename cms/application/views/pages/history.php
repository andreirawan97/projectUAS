<!DOCTYPE html>
<html lang="en">
<head>
  <?php echo $library ?>
  <?php echo $js ?>
  <?php echo $css ?>
  <?php echo $navbarjs ?>

  
  <title>CMS - Home</title>
</head>
<body>
  <?php echo $navbar ?>

  <div class="container" style="margin-top: 20px">
    <table class='table' style="margin-top: 20px">
      <thead>
        <th scope="col">#</th>
        <th scope="col">Product Name</th>
        <th scope="col">Bought by</th>
        <th scope="col">Quantity</th>
        <th scope="col">Total Price</th>
        <th scope="col">Date Purchased</th>
      </thead>
      <tbody id="tbodyHistory">
        <!-- To Be Added -->
      </tbody>
    </table> 
  </div>
</body>
</html>