<?php
  class LoginCMSModel extends CI_Model{
    // Private Function
    private function userValidation($userID, $password){
      // Check is user found or not
      if(($userID) !== "admin"){
        return false;
      }
      
      // Check is password correct
      if(($password) !== "admin"){
        return false;
      }

      // If all check passed
      return true;
    }
   
    // Public Function
    public function loginCMSAction($userID, $password){
      $isUserValid = $this->userValidation($userID, $password);

      if($isUserValid){
        return array('status' => 'ok', 'message' => 'Login success!');
      }
      
      return array('status' => 'err', 'message' => 'Invalid user or password');
    }
  }
?>
