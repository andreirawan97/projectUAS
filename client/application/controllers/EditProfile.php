<?php
  defined('BASEPATH') OR exit('No direct script access allowed');
  
  class EditProfile extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('EditProfileModel');
    }

    public function index() {
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);
  
      $data['js'] = $this->load->view('includes/editProfile/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/editProfile/css.php', NULL, TRUE);
      $data['NavigationBar'] = $this->load->view('components/general/NavigationBar.php', NULL, TRUE);
      $this->load->view('pages/editProfile.php', $data);
    }

    public function fetchProfileInfo() {
      $userID = $this->input->post('userID');
      $res = $this->EditProfileModel->fetchProfileInfo($userID);

      echo json_encode(array('status' => 'ok', 'data' => $res));
    }

    public function updateProfileInfo() {
      $userID = $this->input->post('userID');
      $fullName = $this->input->post('fullName');
      $email = $this->input->post('email');

      $this->EditProfileModel->updateProfileInfo($userID, $fullName, $email);

      echo json_encode(array('status' => 'ok', 'message' => 'Berhasil update profile!'));
    }

    public function changePassword() {
      $userID = $this->input->post('userID');
      $oldPassword = $this->input->post('oldPassword');
      $newPassword1 = $this->input->post('newPassword1');
      $newPassword2 = $this->input->post('newPassword2');

      if($newPassword1 !== $newPassword2) {
        echo json_encode(array('status' => 'err', 'message' => 'Mohon konfirmasi password baru!'));
      }
      else if($oldPassword === '' || $newPassword1 === '' || $newPassword2 === ''){
        echo json_encode(array('status' => 'err', 'message' => 'Field tidak boleh kosong!'));
      }
      else{
        if($this->EditProfileModel->checkOldPassword($userID, $oldPassword)){
          $this->EditProfileModel->changePassword($userID, $newPassword1);
          echo json_encode(array('status' => 'ok', 'message' => 'Berhasil update password!'));  
        }
        else{
          echo json_encode(array('status' => 'err', 'message' => 'Password sebelumnya salah!'));  
        }
      }
    }
  }
?>
