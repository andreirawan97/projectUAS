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
  <title>TokoDoto</title>
</head>
<body style="background-color: whitesmoke">
  <?php echo $NavigationBar ?>

  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <!-- Search Bar -->
        <form id="searchForm">
          <div class="input-group mb-3" style="margin-top: 20px;">   
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">search</i></span>
            </div>
            <input id="inputTextSearch" type="text" class="form-control" aria-label="" placeholder="Enter product name...">
          </div>
        </form>

        <!-- Latest Items -->
        <h3 style="margin-top: 10px;">Latest Items</h3>
        <div id="latestItemContainer" class="row">
          <!-- To be added -->
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>

</body>
</html>
