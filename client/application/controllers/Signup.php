<?php
defined('BASEPATH') OR exit('No direct script access allowed');

 class Signup extends CI_Controller {
   public function __construct(){
    parent::__construct();
    $this->load->model('SignupModel');
  }

	public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    $data['js'] = $this->load->view('includes/signup/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/signup/css.php', NULL, TRUE);
		$this->load->view('pages/signup.php', $data);
  }

  public function signupAction(){
    $userID = $this->input->post('inputtedUserID');
    $fullname = $this->input->post('inputtedFullName');
    $email = $this->input->post('inputtedEmail');
    $password = $this->input->post('inputtedPassword');

    $response = $this->SignupModel->insertToDatabase($userID,$fullname,$email,$password);

    echo json_encode($response);
  }

  public function goToLogin(){
    redirect('login');
  }
}

?>
