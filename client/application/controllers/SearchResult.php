<?php
  defined('BASEPATH') OR exit('No direct script access allowed');

  class SearchResult extends CI_Controller {
    public function __construct(){
      parent::__construct();
      $this->load->model('SearchResultModel');
    }

    public function index(){
      $data['library'] = $this->load->view('includes/general/library.php', NULL, TRUE);
      $data['localStorageHelper'] = $this->load->view('includes/general/localStorageHelper.php', NULL, TRUE);

      $data['js'] = $this->load->view('includes/searchResult/js.php', NULL, TRUE);
      $data['css'] = $this->load->view('includes/searchResult/css.php', NULL, TRUE);
      
      $this->load->view('pages/searchResult.php', $data);
    }

    public function fetchSearchResult(){
      $query = $this->input->post('searchQuery');

      $response = $this->SearchResultModel->fetchSearchResult($query);
      echo json_encode(array('count' => count($response), 'datas' => $response));
    }

    public function goToHome(){
      redirect('home');
    }
  }
?>
