<?php

include "Db.php";

class Product extends Db {

    protected $db;

    public function __construct(){
        $this->db = new Db();
    }
    
    public function addProduct($sku, $name, $price, $type, $attribute){
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT * FROM products WHERE sku = '$sku'");
        $stmt->execute();
        $row = $stmt->rowCount();

        if($row > 0){
            header("location: product-add.php?error=skuexists");
            $this->conn = null;
        } else {
            try {
                $conn = $this->db->connect();
                $sql = "INSERT INTO products (sku, name, price, type, attribute)
                VALUES ('$sku', '$name', '$price', '$type', '$attribute')";
                $conn->exec($sql);
                header("location: index.php");
              } catch(PDOException $e) {
                echo $sql . "<br>" . $e->getMessage();
              }
        }
    }

    public function getProducts(){
        $conn = $this->db->connect();
        $stmt = $conn->prepare("SELECT sku, name, price, type, attribute FROM products");
        $stmt->execute();

        $res = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $res = $stmt->fetchAll();

        return $res;
    }

    public function delete($sku){
        $conn = $this->db->connect();

        try {
            $sql = "DELETE FROM products WHERE sku='$sku'";
            $conn->exec($sql);
            echo "Record deleted successfully";
        } catch(PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
    }

}