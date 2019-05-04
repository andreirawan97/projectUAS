<?php
  class HomeModel extends CI_Model{
    public function fetchLatestProducts(){
      $query = $this->db->query("SELECT * FROM products INNER JOIN heroes ON products.heroesID = heroes.heroesID ORDER BY products.productID DESC ");
      $row = $query->result_array();

      return $row;
    }

  }
?>
