<?php
  class NavbarModel extends CI_Model {
    public function getSaldo($userID){
      $query = $this->db->query("SELECT saldo FROM users WHERE userID = '$userID' ");
      
      $row = $query->result_array();

      return $row;
    }
  }
?>
