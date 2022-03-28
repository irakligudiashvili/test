<?php

class Db {

    private $host;
    private $username;
    private $password;
    private $dbname;

    public function connect(){
        $this->host = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "scandiweb";

        try{
            $conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            echo "Connected successfully";
        } catch(PDOException $e){
            echo "Connection failed: " . $e->getMessage();
        }
    }

}