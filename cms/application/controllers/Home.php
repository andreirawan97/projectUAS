<?php
  class Home extends CI_Controller{
    public function __construct(){
      parent::__construct();

      // Load the model
      $this->load->model('HomeModel');
    }

    public function index(){
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['js'] = $this->load->view('includes/home/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/home/css.php', NULL, TRUE);
      
      $data['navbar'] = $this->load->view('components/general/navbar.php', NULL, TRUE);

      $this->load->view('pages/home.php', $data);
    }

    public function getAllProducts(){
      $allProducts = $this->HomeModel->getAllProducts();

      echo json_encode(array('status' => 'ok', 'datas' => $allProducts));
    }

    public function getIdHeroes(){
      $idHeroes = $this->HomeModel->getIdHeroes();

      echo json_encode(array('status' => 'ok', 'datas' => $idHeroes));
    }

    public function getSearchedProducts(){
      $searchKeyword = $this->input->post('searchKeyword');

      $response = $this->HomeModel->getSearchedProducts($searchKeyword);
      
      echo json_encode(array('status' =>'ok', 'datas' => $response));
    }

    public function addNewProduct(){
      $name = $this->input->post('name');
      $price = $this->input->post('price');
      $quantity = $this->input->post('quantity');
      $description = $this->input->post('description');
<<<<<<< HEAD
<<<<<<< HEAD
      $imageURL = $this->input->post('imageURL');
      $heroID = $this->input->post('heroID');

      $response = $this->HomeModel->addNewProduct($name, $price, $quantity, $description, $imageURL, $heroID);
=======
      $link = $this->input->post('link');
      $heroesID = $this->input->post('heroID');

      $response = $this->HomeModel->addNewProduct($name, $price, $quantity, $description, $link, $heroesID);
>>>>>>> fixing search feature, adding upload image feature
=======
      $imageURL = $this->input->post('imageURL');
      $heroID = $this->input->post('heroID');

      $response = $this->HomeModel->addNewProduct($name, $price, $quantity, $description, $imageURL, $heroID);
>>>>>>> fixing confused code
    
      if($response){
        echo json_encode(array('status' => 'ok', 'message' => 'The product has been successfully added!'));
      }
    }

    public function deleteProduct(){
      $productID = $this->input->post('productID');

      $response = $this->HomeModel->deleteProduct($productID);

      if($response){
        echo json_encode(array('status' => 'ok', 'message' => 'The product has been successfully deleted!'));
      }
    }

    public function updateProduct(){
      $productID = $this->input->post('productID');
      $name = $this->input->post('name');
      $price = $this->input->post('price');
      $quantity = $this->input->post('quantity');
      $description = $this->input->post('description');
<<<<<<< HEAD
<<<<<<< HEAD
      $imageURL = $this->input->post('imageURL');
      $heroesID = $this->input->post('heroesID');

      $response = $this->HomeModel->updateProduct($name, $price, $quantity, $description, $imageURL,$productID, $heroesID);
=======
      $link = $this->input->post('link');
      $heroID = $this->input->post('heroID');

      $response = $this->HomeModel->updateProduct($name, $price, $quantity, $description, $link,$productID, $heroID);
    
>>>>>>> fixing search feature, adding upload image feature
=======
      $imageURL = $this->input->post('imageURL');
      $heroesID = $this->input->post('heroesID');

      $response = $this->HomeModel->updateProduct($name, $price, $quantity, $description, $imageURL,$productID, $heroesID);
>>>>>>> fixing confused code
      if($response){
        echo json_encode(array('status' => 'ok', 'message' => 'The product has been successfully updated!'));
      }
    }
  }
?>
