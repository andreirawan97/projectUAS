<?php
  class HomeModel extends CI_Model{
    // Function to get all product
    function getAllProducts(){
      $query = $this->db->query('SELECT * FROM products ORDER BY name');

      return $query->result_array();
    }

    function addNewProduct($name, $price, $quantity, $description, $imageURL){
      $this->db->query("INSERT INTO products VALUES (null, '$name', '$price', '$quantity', '$description', '$imageURL')");
      
      return true;
    }

    function deleteProduct($productID){
      $this->db->query("DELETE FROM products WHERE productID = '$productID'");

      return true;
    }

    function updateProduct($name, $price, $quantity, $description, $imageURL, $productID){
      $this->db->query("UPDATE products SET name = '$name',
       price = '$price',
       quantity = '$quantity', 
       description = '$description',
       imageURL = '$imageURL'
       WHERE productID = '$productID'");
      
      return true;
    }
  }
?>
