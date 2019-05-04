<?php
  class HomeModel extends CI_Model{
    // Function to get all product
    function getAllProducts(){
      $query = $this->db->query('SELECT * FROM products ORDER BY name');

      return $query->result_array();
    }

    function getAllHeroes(){
      $query = $this->db->query('SELECT * FROM heroes ORDER BY heroesName');

      return $query->result_array();
    }

    function getSearchedProducts($searchKeyword){
      $query = $this->db->query("SELECT * FROM products WHERE name LIKE '%$searchKeyword%' ORDER BY name");

      return $query->result_array();
    }

    function addNewProduct($name, $price, $quantity, $description, $link, $heroesID){
      $this->db->query("INSERT INTO products VALUES (null, '$name', '$price', '$quantity', '$description', '$link', '$heroesID')");
      
      return true;
    }

    function deleteProduct($productID){
      $this->db->query("DELETE FROM products WHERE productID = '$productID'");

      return true;
    }

    function updateProduct($name, $price, $quantity, $description, $link, $productID, $heroID){
      $this->db->query("UPDATE products SET name = '$name',
       price = '$price',
       quantity = '$quantity', 
       description = '$description',
       imageURL = '$link',
       heroesID = '$heroID'
       WHERE productID = '$productID'");
      
      return true;
    }
  }
?>
