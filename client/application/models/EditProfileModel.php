<?php
  class EditProfileModel extends CI_Model {
    // Private Method
    private function getSalt($userID) {
      $res = $this->db->query("SELECT salt FROM secret WHERE userID = '$userID'");
      $response = $res->result_array();

      return $response[0]['salt'];
    }

    private function getOldPassword($userID) {
      $res = $this->db->query("SELECT password FROM secret WHERE userID = '$userID'");
      $response = $res->result_array();

      return $response[0]['password'];
    }

    // Public Method
    public function fetchProfileInfo($userID) {
      $res = $this->db->query("SELECT * FROM users WHERE userID = '$userID'");
      $response = $res->result_array();

      return $response;
    }

    public function updateProfileInfo($userID, $fullName, $email) {
      $this->db->query("UPDATE users SET nama = '$fullName', email = '$email' WHERE userID = '$userID'");
    }

    public function changePassword($userID, $newPassword) {
      $salt = $this->getSalt($userID);
      $newPassword = md5("$newPassword$salt");
      $this->db->query("UPDATE secret SET password = '$newPassword' WHERE userID = '$userID'");
    }

    public function checkOldPassword($userID, $oldPassword) {
      $salt = $this->getSalt($userID);
      $veryOldPassword = $this->getOldPassword($userID);
      $oldPassword = md5("$oldPassword$salt");

      return $veryOldPassword === $oldPassword;
    }
  }
?>
