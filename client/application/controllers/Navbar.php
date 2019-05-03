<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Navbar extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('NavbarModel');
    }

    public function index(){

    }

    public function getSaldo(){
      $userID = $this->input->post('userID');

      $response = $this->NavbarModel->getSaldo($userID);

      echo json_encode(array('datas' => $response));
    }

    public function getCart(){
      $userID = $this->input->post('userID');

      $response = $this->NavbarModel->getCart($userID);

      echo json_encode(array('count' => count($response), 'datas' => $response));
    }
  }
?>
