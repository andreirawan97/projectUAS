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
  <title>Search Result</title>
</head>
<body style="background-color: #7e57c2">
  <!-- Back Button -->
  <div id="backArrow">
    <a href="searchResult/goToHome">
      <i class="material-icons" style="color: white; font-size: 42px;">arrow_back</i>
    </a>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-2"></div>
      <div class="col-lg-8" style="padding-top: 70px;">
        <h2 style="color: white; margin-bottom: 20px;">Search Result</h2>
        <h5 id="showResultFor" style="color: white;">Show X result for ""</h5>
        <div id="resultContainer" class="row">
          <!-- To Be Added -->
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>
</body>
</html>
