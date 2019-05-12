<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class IsiSaldo extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('IsiSaldoModel');
    }

    public function index() {
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);
  
      $data['js'] = $this->load->view('includes/isiSaldo/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/isiSaldo/css.php', NULL, TRUE);
      $data['NavigationBar'] = $this->load->view('components/general/NavigationBar.php', NULL, TRUE);
      $this->load->view('pages/isiSaldo.php', $data);
    }

    public function topUp() {
      $userID = $this->input->post('userID');
      $topUpValue = $this->input->post('topUpValue');

      $this->IsiSaldoModel->topUp($userID, $topUpValue);

      echo json_encode(array('status' => 'ok', 'message' => 'Top up berhasil!'));
    }
  }
?>
