<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class ShoppingCart extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('ShoppingCartModel');
    }

    // Private method
    private function isSaldoEnough($userID){
      $response = $this->ShoppingCartModel->getSaldo($userID);
      $saldoUser = $response[0]['saldo'];

      $totalBayar = $this->ShoppingCartModel->getTotalBayar($userID);

      return $saldoUser >= $totalBayar;
    }

    private function isStockExist($userID){
      return $this->ShoppingCartModel->checkStock($userID);
    }

    // Public method
    public function index(){
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);
  
      $data['js'] = $this->load->view('includes/shoppingCart/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/shoppingCart/css.php', NULL, TRUE);
      $data['NavigationBar'] = $this->load->view('components/general/NavigationBar.php', NULL, TRUE);
      $this->load->view('pages/shoppingCart.php', $data);
    }

    public function getCart(){
      $userID = $this->input->post('userID');

      $response = $this->ShoppingCartModel->getCart($userID);

      echo json_encode(array('count' => count($response), 'datas' => $response));
    }

    public function updateCart(){
      $userID = $this->input->post('userID');
      $productID = $this->input->post('productID');
      $quantity = $this->input->post('quantity');

      $this->ShoppingCartModel->updateCart($userID, $productID, $quantity);

      echo json_encode(array('status' => 'ok'));
    }

    public function deleteCart(){
      $userID = $this->input->post('userID');
      $cartID = $this->input->post('cartID');

      $this->ShoppingCartModel->deleteCart($userID, $cartID);

      echo json_encode(array('status' => 'ok', 'message' => 'Delete successfully!'));
    }

    public function checkout(){
      $userID = $this->input->post('userID');
      
      if($this->isSaldoEnough($userID)){
        if($this->isStockExist($userID)){
          $this->ShoppingCartModel->reduceSaldo($userID);
          $this->ShoppingCartModel->reduceStock($userID);
          $this->ShoppingCartModel->clearCart($userID);
          echo json_encode(array('status' => 'ok', 'message' => 'Thank you!'));
        }
        else{
          echo json_encode(array('status' => 'err', 'message' => 'Stock tidak mencukupi!'));
        }
      }
      else{
        echo json_encode(array('status' => 'err', 'message' => 'Saldo tidak cukup! Silahkan top up'));
      }

      // Kalau udah lanjut proses
    }
  }
?>
