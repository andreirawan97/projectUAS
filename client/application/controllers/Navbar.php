<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Navbar extends CI_Controller{
    public function __construct(){
      parent::__construct();
      $this->load->model('NavbarModel');
    }

    public function index(){

    }

    public function getCartCount(){
      $userID = $this->input->post('userID');

      $response = $this->NavbarModel->getCartCount($userID);

      echo json_encode(array('count' => count($response)));
    }

    public function getSaldo(){
      $userID = $this->input->post('userID');

      $response = $this->NavbarModel->getSaldo($userID);

      echo json_encode(array('datas' => $response));
    }

    public function goToLogin(){
      redirect('login');
    }

    public function goToShoppingCart(){
      redirect('shoppingCart');
    }

    public function goToHome(){
      redirect('home');
    }
  }
?>
