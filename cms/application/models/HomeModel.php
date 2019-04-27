<?php
  class HomeModel extends CI_Model{
    // Function to get all product
    function getAllProducts(){
      $query = $this->db->query('SELECT products.productID,
      products.name,
      products.price,
      products.quantity,
      products.description,
      products.imageURL,
      heroes.heroesID, 
      heroes.heroesName 
      FROM products
      LEFT JOIN heroes 
      ON heroes.heroesID = products.heroesID');

      return $query->result_array();
    }

    function getAllHeroes(){
      $query = $this->db->query('SELECT * FROM heroes ORDER BY heroesName');

      return $query->result_array();
    }

    function getSearchedProducts($searchKeyword){
      $query = $this->db->query("SELECT products.productID,
      products.name,
      products.price,
      products.quantity,
      products.description,
      products.imageURL,
      heroes.heroesID, 
      heroes.heroesName 
      FROM products
      LEFT JOIN heroes 
      ON heroes.heroesID = products.heroesID
      WHERE products.name LIKE '%$searchKeyword%' ORDER BY products.name");

      return $query->result_array();
    }

    function addNewProduct($name, $price, $quantity, $description, $imageURL, $heroesID){
      $this->db->query("INSERT INTO products VALUES (null, '$name', '$price', '$quantity', '$description', '$imageURL', '$heroesID')");
      
      return true;
    }

    function deleteProduct($productID){
      $this->db->query("DELETE FROM products WHERE productID = '$productID'");

      return true;
    }

    function updateProduct($name, $price, $quantity, $description, $imageURL, $productID, $heroID){
      $this->db->query("UPDATE products SET name = '$name',
       price = '$price',
       quantity = '$quantity', 
       description = '$description',
       imageURL = '$imageURL',
       heroesID = '$heroID'
       WHERE productID = '$productID'");
      
      return true;
    }
  }
?>
