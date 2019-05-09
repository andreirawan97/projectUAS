<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailItem extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('DetailItemModel');
  }

  public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);

    $data['js'] = $this->load->view('includes/detailItem/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/detailItem/css.php', NULL, TRUE);
    $data['NavigationBar'] = $this->load->view('components/general/NavigationBar.php', NULL, TRUE);
    $this->load->view('pages/detailItem.php', $data);
  }
  
  public function fetchDetailItem(){
    $tmpProductID = $this->input->get('tmpProductID');
    $response = $this->DetailItemModel->fetchDetailItem($tmpProductID);

    if($response){
      echo json_encode(array('status' => 'ok', 'datas' => $response));
    }
  }

  public function fetchAnotherProduct(){
    $tmpHeroesID = $this->input->post('tmpHeroesID');
    $response = $this->DetailItemModel->fetchAnotherProduct($tmpHeroesID);

    if($response){
      echo json_encode(array('status' => 'ok', 'datas' => $response));
    }
  }
}
?>