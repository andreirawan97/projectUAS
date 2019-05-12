<?php
  class IsiSaldoModel extends CI_Model {
    // Private Method
    private function getLastSaldo($userID){
      $res = $this->db->query("SELECT saldo FROM users WHERE userID = '$userID'");
      $response = $res->result_array();

      return $response[0]['saldo'];
    }
    // Public Method
    public function topUp($userID, $topUpValue) {
      $lastSaldo = $this->getLastSaldo($userID);
      $newSaldo = $lastSaldo + $topUpValue;
      $this->db->query("UPDATE users SET saldo = '$newSaldo' WHERE userID = '$userID'");
    }
  }
?>
