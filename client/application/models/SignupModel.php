<?php
    class SignupModel extends CI_Model{
        private function isDuplicateEmail($inputtedEmail){
            $query = $this->db->query("SELECT email from users WHERE email = '$inputtedEmail'");
            $row = $query->result_array();

            if(count($row) > 0){
              return true;
            }
            else{
              return false;
            }
        }

        private function isDuplicateID($inputtedUserID){
            $query = $this->db->query("SELECT userID from users WHERE userID = '$inputtedUserID'");
            $row = $query->result_array();

            if(count($row) > 0){
                return true;
            }
            else{
                return false;
            }
        }

        public function insertToDatabase($inputtedUserID, $inputtedFullName, $inputtedEmail, $inputtedPassword){
          if(!$this->isDuplicateEmail($inputtedEmail) && !$this->isDuplicateID($inputtedUserID)){
            $query = "INSERT INTO users VALUES ('$inputtedUserID','$inputtedFullName', 0,'$inputtedEmail')";
            $this->db->query($query);
            $salt = rand(100, 999);
            $inputtedPasswordWithSalt = "$inputtedPassword$salt";
            $md5InputtedPasswordWithSalt = md5($inputtedPasswordWithSalt);

            $query = "INSERT INTO secret VALUES ('$inputtedUserID', '$md5InputtedPasswordWithSalt', '$salt')";
            $this->db->query($query);

            return array('status' => 'ok', 'message' => 'Signup Successful!');
          }
          else{
            return array('status' => 'err', 'message' ='Signup Failed!');
          }
        }
    }
?>

