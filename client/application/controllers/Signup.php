<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signup extends CI_Controller {
	public function index(){
    $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
    $data['js'] = $this->load->view('includes/signup/js.php', NULL, TRUE);
    $data['css'] = $this->load->view('includes/signup/css.php', NULL, TRUE);
		$this->load->view('pages/signup.php', $data);
  }

}
