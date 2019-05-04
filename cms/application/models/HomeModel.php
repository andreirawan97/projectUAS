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
      FROM `products` 
      JOIN heroes ON products.heroesID = heroes.heroesID
      ORDER BY products.name');

      return $query->result_array();
    }

    function getIdHeroes(){
      $query = $this->db->query('SELECT heroesID,heroesName FROM heroes ORDER BY heroesName');

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
      FROM `products` 
      JOIN heroes ON products.heroesID = heroes.heroesID 
      WHERE name LIKE '%$searchKeyword%' 
      ORDER BY products.name");

      return $query->result_array();
    }

<<<<<<< HEAD
    function addNewProduct($name, $price, $quantity, $description, $imageURL, $heroID){
      $this->db->query("INSERT INTO products VALUES (null, '$name', '$price', '$quantity', '$description', '$imageURL', '$heroID')");
=======
    function addNewProduct($name, $price, $quantity, $description, $link, $heroesID){
      $this->db->query("INSERT INTO products VALUES (null, '$name', '$price', '$quantity', '$description', '$link', '$heroesID')");
>>>>>>> fixing search feature, adding upload image feature
      
      return true;
    }

    function deleteProduct($productID){
      $this->db->query("DELETE FROM products WHERE productID = '$productID'");

      return true;
    }

<<<<<<< HEAD
    function updateProduct($name, $price, $quantity, $description, $imageURL, $productID, $heroesID){
=======
    function updateProduct($name, $price, $quantity, $description, $link, $productID, $heroID){
>>>>>>> fixing search feature, adding upload image feature
      $this->db->query("UPDATE products SET name = '$name',
       price = '$price',
       quantity = '$quantity', 
       description = '$description',
<<<<<<< HEAD
       imageURL = '$imageURL',
       heroesID = '$heroesID'
=======
       imageURL = '$link',
       heroesID = '$heroID'
>>>>>>> fixing search feature, adding upload image feature
       WHERE productID = '$productID'");
      
      return true;
    }
  }
?>
