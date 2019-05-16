<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginCMS extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('LoginCMSModel');
    $this->load->library('session');
  }

	public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    
    $data['js'] = $this->load->view('includes/loginCMS/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/loginCMS/css.php', NULL, TRUE);
    $this->load->view('pages/loginCMS.php', $data);
  }

  public function loginCMSAction(){
    $userID = $this->input->post('userID');
    $password = $this->input->post('password');
    $this->session->set_userdata('username', $userID);
    
    $response = $this->LoginCMSModel->loginCMSAction($userID, $password);

    echo json_encode($response);
  }
  public function goToHome(){
    redirect('home');
  }
}

?>