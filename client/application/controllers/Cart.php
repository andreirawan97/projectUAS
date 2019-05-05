<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class Cart extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('CartModel');
    }

    public function index(){

    }

    public function getCart(){
      $userID = $this->input->post('userID');

      $response = $this->CartModel->getCart($userID);

      echo json_encode(array('count' => count($response), 'datas' => $response));
    }

    public function updateCart(){
      $userID = $this->input->post('userID');
      $productID = $this->input->post('productID');
      $quantity = $this->input->post('quantity');

      $this->CartModel->updateCart($userID, $productID, $quantity);

      echo json_encode(array('status' => 'ok'));
    }
  }
?>
