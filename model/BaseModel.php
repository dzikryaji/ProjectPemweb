<?php 

class BaseModel {

    protected $conn;

    function __construct(){

        $this->conn = new mysqli(
            DBHOST,
            DBUSERNAME,
            DBPASSWORD,
            DBNAME
        );

        if ($this->conn->connect_errno) {
            die("Connection error: " . $this->conn->connect_error);
        }
    }
    
    function getUser($userId) {
        $sql = "SELECT * FROM user
                WHERE id = $userId";
        
        $result = $this->conn->query($sql);
        
        $user = $result->fetch_assoc();

        return $user;
    }
}
