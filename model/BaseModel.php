<?php 

class BaseModel {

    protected $conn;

    function __construct(){

        $host = "127.0.0.1";
        $username = "root";
        $password = "";
        $dbname = "project_pemweb";

        $this->conn = new mysqli(
            $host,
            $username,
            $password,
            $dbname
        );

        if ($this->conn->connect_errno) {
            die("Connection error: " . $this->conn->connect_error);
        }
    }

}
