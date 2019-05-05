<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('HomeModel');
  }

  public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);

    $data['js'] = $this->load->view('includes/home/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/home/css.php', NULL, TRUE);
    $data['NavigationBar'] = $this->load->view('components/general/NavigationBar.php', NULL, TRUE);
    $this->load->view('pages/home.php', $data);
  }

  public function fetchLatestProducts(){
    $response = $this->HomeModel->fetchLatestProducts();

    echo json_encode(array('datas' => $response));
  }

  public function updateCart(){
    $userID = $this->input->post('userID');
    $productID = $this->input->post('productID');
    $quantity = $this->input->post('quantity');

    $this->HomeModel->updateCart($userID, $productID, $quantity);

    echo json_encode(array('status' => 'ok'));
  }

  public function goToSearchResult(){
    redirect('searchResult');
  }
}
?>
