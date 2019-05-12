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
  <title>Isi Saldo</title>
</head>
<body>
  <?php echo $NavigationBar ?>

  <div class="container">
    <div class="row">
      <div class="col-2"></div>
      <div class="col-8">
        <h3 style="margin-top: 20px; margin-bottom: 15px;">Isi Saldo</h3>

        <div class="row">
          <div class="col-4" style="padding: 5px;">
            <button shell="150" onclick="topUp(this)" type="button" class="btn btn-outline-primary saldoCard">
              Rp. 10.000,- <br />
              +150 Shell
            </button>
          </div>
          <div class="col-4" style="padding: 5px;">
            <button shell="800" onclick="topUp(this)" type="button" class="btn btn-outline-success saldoCard">
              Rp. 50.000,- <br />
              +800 Shell
            </button>
          </div>
          <div class="col-4" style="padding: 5px;">
            <button shell="1850" onclick="topUp(this)" type="button" class="btn btn-outline-danger saldoCard">
              Rp. 100.000,- <br />
              <s>+1500 Shell</s> 1850 Shell
            </button>
          </div>
          <div class="col-4" style="padding: 5px;">
            <button shell="2500" onclick="topUp(this)" type="button" class="btn btn-outline-info saldoCard">
              Rp. 150.000,- <br />
              +2500 Shell
            </button>
          </div>
          <div class="col-4" style="padding: 5px;">
            <button shell="5500" onclick="topUp(this)" type="button" class="btn btn-outline-dark saldoCard">
              Rp. 300.000,- <br />
              +5500 Shell
            </button>
          </div>
          <div class="col-4" style="padding: 5px;">
            <button shell="10000" onclick="topUp(this)" type="button" class="btn btn-outline-secondary saldoCard">
              Rp. 500.000,- <br />
              +10000 Shell
            </button>
          </div>
        </div>
      </div>
      <div class="col-2"></div>
    </div>
  </div>

  <!-- Loading Modal -->
  <div class="modal fade" id="loadingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top: 60px;">
    <div class="modal-dialog" role="document">
      <div class="modal-content col d-flex align-items-center justify-content-center" style="height: 200px;">
        <img src="<?php echo base_url('assets/loading.gif') ?>" style="height: 80px; width: 80px;" />
        <h5>Please wait while we processing your payment...</h5>
      </div>
    </div>
  </div>
</body>
</html>
