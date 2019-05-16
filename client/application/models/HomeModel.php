<?php
  class HomeModel extends CI_Model{
    // Private method
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

    // Public method
    public function fetchLatestProducts(){
<<<<<<< HEAD
      $query = $this->db->query("SELECT * FROM products INNER JOIN heroes ON products.heroesID = heroes.heroesID ORDER BY products.productID DESC LIMIT 3");
      $row = $query->result_array();

      return $row;
    }

    public function fetchAllProducts(){
      $query = $this->db->query("SELECT * FROM products INNER JOIN heroes ON products.heroesID = heroes.heroesID ORDER BY products.name ASC");
=======
      $query = $this->db->query("SELECT * FROM products INNER JOIN heroes ON products.heroesID = heroes.heroesID ORDER BY products.productID DESC LIMIT 9 ");
>>>>>>> Add responsive on client pages
      $row = $query->result_array();

      return $row;
    }

    public function updateCart($userID, $productID, $quantity){
      if($this->isUserHasThisProduct($userID, $productID)){
        $latestQuantity = $this->getLatestQuantity($userID, $productID) + 1;

        $this->db->query("UPDATE cart SET quantity = $latestQuantity WHERE userID = '$userID' AND productID = '$productID'");
      }
      else{
        $this->db->query("INSERT INTO cart VALUES ('$productID', '$userID', null, 1)");
      }
    }

  }
?>
