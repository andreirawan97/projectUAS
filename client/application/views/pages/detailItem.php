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
  <title>TokoDoto - Item</title>
</head>
<body>
    <?php echo $NavigationBar ?>
    <div class="card mx-auto col-11">
        <div class="card-body">
            <div class="miniView1 row d-block d-md-none mx-auto"></div>
            <div class="row">
                <div class="col-lg-5 col-md-8">
                    <img id="productImage" src="https://steamcdn-a.akamaihd.net/apps/570/icons/econ/items/phantom_assassin/manifold_paradox/arcana_pa_large.db6510e27100698985c0d4f980833808972fb127.png" alt="product image">
                </div>
                <div class="largeView col-lg-7 col-md-4 d-none d-sm-block"></div>
            </div>
            <div class="miniView2 col-sm-12 row d-block d-md-none"></div>     
            <div class="btnAddForHp fixed-bottom row d-block d-md-none"></div>
            <div class="textForAnotherProduct row" style="padding-top:20px; padding-left: 15px;"></div>
            <div class="anotherProduct row"></div>
        </div>
    </div>
</body>
</html>
