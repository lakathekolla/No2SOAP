<?php
/**
 * ==========================================================
 * Server Class - No2NOSOAP Project
 * ==========================================================
 * Author: R M Lakruwan@Noone
 * Description: This class handles SOAP server operations:
 * - getAllProducts(): Returns array of all products
 * - getProduct(): Returns single product by ID
 * ==========================================================
 */

require_once(__DIR__ . '/models/Product.php');

class server{
    private $db_handle;

    public function __construct(){
        $this->connect();
    }

    private function connect(){
        try {
            $this->db_handle = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        } catch (Exception $ex) {
            exit($ex->getMessage());
        }
    }

    public function getAllProducts(){
        $query = mysqli_query($this->db_handle, "SELECT * FROM " . TABLE);
        $products = [];

        while ($row = mysqli_fetch_array($query, MYSQLI_ASSOC)) {
            array_push($products, new Product($row['id'], $row['title'], $row['description'], $row['price']));
        }

        return $products;
    }
    
    public function getProduct($params){
        $query = mysqli_query($this->db_handle, "SELECT * FROM " . TABLE . " WHERE id='{$params['id']}'");
        $row = mysqli_fetch_array($query, MYSQLI_ASSOC);

        if ($row) {
            return new Product($row['id'], $row['title'], $row['description'], $row['price']); 
        }

        return "no such product";
    }

}
