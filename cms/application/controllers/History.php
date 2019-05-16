<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class History extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('HistoryModel');
  }

	public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    
    $data['js'] = $this->load->view('includes/history/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/history/css.php', NULL, TRUE);
    $data['navbar'] = $this->load->view('components/general/navbar.php', NULL, TRUE);
    $data['navbarjs'] = $this->load->view('components/general/navbarjs.php', NULL, TRUE);

    $this->load->view('pages/History.php', $data);
  }

  public function fetchHistory(){
      $allHistory = $this->HistoryModel->fetchHistory();

      echo json_encode(array('status' => 'ok', 'datas' => $allHistory));
  }

  public function goToHome(){
    redirect('home');
  }
}

?>