<style>
.layout-transparent {
  background: url(<?php echo base_url('/assets/BG.jpg') ?>) center / cover;
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

.customCardStyle{
  width: 100%;
  padding: 20px 5px 20px 5px; 
  width: 80vh; 
}

@media only screen and (max-width: 1024px){
  .mdl-card {
    width: 50%;
  }
}

@media only screen and (max-width: 536px){
  .mdl-card {
    width: 80%;
  }
}

@media only screen and (max-width: 320px){
  .mdl-card {
    width:95%;
  }
}

</style>

