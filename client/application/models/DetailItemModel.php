<?php
  class DetailItemModel extends CI_Model{
    public function fetchDetailItem($tmpProductID){
      $query = $this->db->query(
        "SELECT products.productID,
          products.name,
          products.price, 
          products.stock, 
          products.description, 
          products.imageURL,
          heroes.heroesID,
          heroes.heroesName
          FROM `products` 
          JOIN heroes ON products.heroesID = heroes.heroesID
          WHERE products.productID = '$tmpProductID'
          ORDER BY products.name"
      );
      $row = $query->result_array();

      return $row;
    }

    public function fetchAnotherProduct($tmpHeroesID){
      $query = $this->db->query(
        "SELECT products.productID, products.name, products.price, products.stock, products.description, products.imageURL, products.heroesID, heroes.heroesName 
        FROM products 
        JOIN heroes ON products.heroesID = heroes.heroesID 
        WHERE products.heroesID =  '$tmpHeroesID'
        ORDER BY products.productID"
      );
      $row = $query->result_array();

      return $row;
    }
  }
?>