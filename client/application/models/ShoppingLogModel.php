<?php
  class ShoppingLogModel extends CI_Model {
    public function fetchShoppingLog($userID) {
      $res = $this->db->query("SELECT * FROM shoppingLog INNER JOIN products ON shoppingLog.productID = products.productID WHERE userID = '$userID' ORDER BY shoppingLog.datePurchase DESC");
      $response = $res->result_array();

      return $response;
    }
  }
?>
