<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class ShoppingLog extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('ShoppingLogModel');
    }
  
    public function index(){
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);
  
      $data['js'] = $this->load->view('includes/shoppingLog/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/shoppingLog/css.php', NULL, TRUE);
      $data['NavigationBar'] = $this->load->view('components/general/NavigationBar.php', NULL, TRUE);
      $this->load->view('pages/shoppingLog.php', $data);
    }

    public function fetchShoppingLog(){
      $userID = $this->input->post('userID');

      $res = $this->ShoppingLogModel->fetchShoppingLog($userID);

      echo json_encode(array('datas' => $res));
    }

  }
?>
