<script>
  function _getSaldo(){
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('navbar/getSaldo', {userID}, (res) => {
      let response = JSON.parse(res);
      let {datas} = response;
      let {saldo} = datas[0];
      
      $('#textSaldo').html(`Saldo: ${saldo}`);
    })
  }

  function _getCart(){
    let {userData} = getLocalStorage();
    let {userID} = userData;

    $.post('navbar/getCart', {userID}, (res) => {
      let response = JSON.parse(res);
      let {count} = response;

      $('#cartBadge').html(count);
    })
  }

  $(document).ready(() => {
    _getSaldo();
    _getCart();
  })
</script>

<!-- Image and text -->
<nav class="navbar navbar-light" style="background-color: #7e57c2">
  <a class="navbar-brand" href="#" style="color: white;">
    <!-- <img src="/docs/4.3/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt=""> -->
    TokoDoto
  </a>

  <ul class="nav justify-content-end">
    <li class="nav-item dropdown">
      <!-- Shopping Cart -->
      <button type="button" class="btn btn-sm" style="margin-right: 10px;">
        <i class="material-icons" style="color: white">shopping_cart</i> <span id="cartBadge" class="badge badge-light">....</span>
      </button>
      <!-- User Profile Menu Dropdown -->
      <div class="btn-group">
        <a href="#!"  class="dropdown-toggle" data-toggle="dropdown" data-display="static" aria-haspopup="true" aria-expanded="false" style="color: #7e57c2">
          <i class="material-icons" style="color: white">person</i>
        </a>
        <div class="dropdown-menu dropdown-menu-lg-right">
          <p id="textSaldo" class="dropdown-item">Saldo: Loading...</p>
          <div class="dropdown-divider"></div>
          <a href="#!" class="dropdown-item">Edit Profile</a>
          <a href="#!" class="dropdown-item" style="color: red">Log Out</a>
        </div>
      </div>
    </li>
  </ul>
</nav>
