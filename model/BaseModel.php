<?php 

class BaseModel {

    protected $conn;

    function __construct(){
        $this->conn = new mysqli(
            "127.0.0.1",
            "root",
            "root",
            "post"
        );
    }

}