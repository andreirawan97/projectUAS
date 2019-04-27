<?php
  class LoginModel extends CI_Model{
    // Private Function
    private function isPasswordCorrect($password, $salt, $realPassword){
      $userPasswordWithSalt = "$password$salt";
      $md5UserPassword = md5($userPasswordWithSalt);

      if($md5UserPassword === $realPassword){
        return true;
      }
      return false;
    }

    private function userValidation($userID, $password){
      $query = $this->db->query("SELECT * FROM users INNER JOIN secret ON users.userID = secret.userID WHERE users.userID = '$userID' ");
      $row = $query->result_array();

      // Check is user found or not
      if(count($row) === 0){
        return false;
      }
      
      // Check is password correct
      if(!$this->isPasswordCorrect($password, $row[0]['salt'], $row[0]['password'])){
        return false;
      }

      // If all check passed
      return true;
    }
   
    // Public Function
    public function loginAction($userID, $password){
      $isUserValid = $this->userValidation($userID, $password);

      if($isUserValid){
        return array('status' => 'ok', 'message' => 'Login success!');
      }
      
      return array('status' => 'err', 'message' => 'Invalid user or password');
    }
  }
?>
