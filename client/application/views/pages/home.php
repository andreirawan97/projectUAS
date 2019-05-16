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
  <div class="container" style="margin-bottom: 20px;">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <!-- Carousel -->
        <div class="bd-example" style="margin-top: 5px;">
          <div id="carouselPromo" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselPromo" data-slide-to="0" class="active"></li>
              <li data-target="#carouselPromo" data-slide-to="1"></li>
              <li data-target="#carouselPromo" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="<?php echo base_url('assets/promo1.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  <h5>Comeback!</h5>
                  <p>Now On SALE!!! Desert Sands Baby Roshan available to be purchased, Get it now</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php echo base_url('assets/promo2.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
              <div class="carousel-item">
                <img src="<?php echo base_url('assets/promo3.jpg') ?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselPromo" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselPromo" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>

        <!-- Search Bar -->
        <form id="searchForm">
          <div class="input-group mb-3" style="margin-top: 20px;">   
            <div class="input-group-prepend">
              <span class="input-group-text"><i class="material-icons">search</i></span>
            </div>
            <input autocomplete="off" id="inputTextSearch" type="text" class="form-control" aria-label="" placeholder="Enter keyword...">
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
