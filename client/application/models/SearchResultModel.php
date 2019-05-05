<?php
  class SearchResultModel extends CI_Model {
    public function fetchSearchResult($query){
      $query = $this->db->query("SELECT * FROM products INNER JOIN heroes ON products.heroesID = heroes.heroesID WHERE name LIKE '%$query%' OR heroes.heroesName LIKE '%$query%' ORDER BY name ASC");
      $row = $query->result_array();

      return $row;
    }
  }
?>
