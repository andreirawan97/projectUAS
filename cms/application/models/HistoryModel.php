<?php
    class HistoryModel extends CI_Model{
        function fetchHistory(){
            $query = $this->db->query('
            SELECT * 
            FROM `shoppinglog` 
            INNER JOIN products ON products.productID = shoppingLog.productID
            ORDER BY shoppingLog.datePurchase DESC;
            ');

            return $query->result_array();
        }
    }
?>