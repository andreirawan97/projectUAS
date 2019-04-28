<style>
  .layout-transparent {
    background: url(<?php echo base_url('/assets/bgSignup.jpg') ?>) center / cover;
  }
  .layout-transparent .mdl-layout__header,
  .layout-transparent .mdl-layout__drawer-button {
    /* This background is dark, so we set text to white. Use 87% black instead if
      your background is light. */
    color: white;
  }
  .centerVerticalHorizontal {
    display: flex; 
    align-items: center;
    justify-content: center;"
  }

  .right {
    float: right;
  }

  .leftSection {
    height: 100vh;
  }
  .rightSection {
    height: 100vh;
    background-color: whitesmoke;
  }
  .centeredAbsolute {
    position: absolute;
    top: 50%;
    left: 25%;
    transform: translate(-50%, -50%); 
  }
  .promoText{
    color: white;
    text-shadow: 1px 1px #000;
    font-size: 30px;
    text-align: center;
  }
</style>
