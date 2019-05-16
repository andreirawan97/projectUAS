<?php
  class ShoppingCartModel extends CI_Model {
    // Private Method
    private function isUserHasThisProduct($userID, $productID){
      // This method is to check if the product is exist or not. If exist, UPDATE, if not, INSERT INTO
      $query = $this->db->query("SELECT * FROM cart WHERE productID = '$productID' AND userID = '$userID'");
      $row = $query->result_array();

      if(count($row) == 0){
        return false;
      }

      return true;
    }

    private function getLatestQuantity($userID, $productID){
      $query = $this->db->query("SELECT quantity FROM cart WHERE productID = '$productID' AND userID = '$userID'");
      $row = $query->result_array();
      return $row[0]['quantity'];
    }

    // Public Method
    public function getCart($userID){
      $query = $this->db->query("SELECT * FROM cart INNER JOIN products ON cart.productID = products.productID WHERE cart.userID = '$userID' ORDER BY products.name ASC");

      $row = $query->result_array();

      return $row;
    }

    public function updateCart($userID, $productID, $quantity){
      if($this->isUserHasThisProduct($userID, $productID,$quantity)){
        $this->db->query("UPDATE cart SET quantity = $quantity WHERE userID = '$userID' AND productID = '$productID'");
      }
      else{
        $this->db->query("INSERT INTO cart VALUES ('$productID', '$userID', null, 1)");
      }
    }

    public function deleteCart($userID, $cartID){
      $this->db->query("DELETE FROM cart WHERE userID = '$userID' AND cartID = '$cartID'");
    }

    public function getSaldo($userID){
      $res = $this->db->query("SELECT saldo FROM users WHERE userID = '$userID'");
      $response = $res->result_array();

      return $response;
    }

    public function getTotalBayar($userID){
      $res = $this->db->query("SELECT * FROM cart INNER JOIN products ON cart.productID = products.productID WHERE cart.userID = '$userID' ORDER BY products.name ASC");
      $response = $res->result_array();

      $totalBayar = 0;
      foreach($response as $product){
        $totalBayar += $product['price'] * $product['quantity'];
      }
      return $totalBayar;
    }

    public function checkStock($userID){
      $response = $this->getCart($userID);
      $passFlag = true;
      foreach($response as $row){
        if($row['quantity'] > $row['stock']){
          $passFlag = false;
        }
        else{
          continue;
        }
      }

      return $passFlag;
    }

    public function reduceSaldo($userID){
      $a = $this->getSaldo($userID);
      $saldo = $a[0]['saldo'];

      $updatedSaldo = $saldo - $this->getTotalBayar($userID);
      $this->db->query("UPDATE users SET saldo = '$updatedSaldo' WHERE userID = '$userID'");
    }

    public function reduceStock($userID){
      $userID = 'andreirawan';
      $carts = $this->getCart($userID);
      
      for($i = 0; $i < count($carts); $i++){
        $quantity = $carts[$i]['quantity'];
        $productID = $carts[$i]['productID'];
        $stock = $carts[$i]['stock'];
        $newStock = $stock - $quantity;

        $this->db->query("UPDATE products SET stock = '$newStock' WHERE productID = '$productID'");
      }
    }

    public function clearCart($userID){
      $this->db->query("DELETE FROM cart WHERE userID = '$userID'");
    }

    public function addToShoppingLog($userID){
      $currentCart = $this->getCart($userID);
      foreach($currentCart as $cart) {
        $this->db->query("INSERT INTO shoppingLog VALUES ('$cart[productID]', '$cart[userID]', null, null, '$cart[quantity]')");
      }
    }
  }
?>
