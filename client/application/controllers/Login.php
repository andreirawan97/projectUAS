<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
  public function __construct(){
    parent::__construct();
    $this->load->model('LoginModel');
  }

	public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    $data['js'] = $this->load->view('includes/login/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/login/css.php', NULL, TRUE);
    $this->load->view('pages/login.php', $data);
  }

  public function loginAction(){
    $userID = $this->input->post('userID');
    $password = $this->input->post('password');
    
    $response = $this->LoginModel->loginAction($userID, $password);

    echo json_encode($response);
  }

  public function goToSignup(){
    redirect('signup');
  }
}
