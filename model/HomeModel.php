<?php

class HomeModel extends BaseModel{
    
    function getUser($userId) {
        $sql = "SELECT * FROM user
                WHERE id = $userId";
        
        $result = $this->conn->query($sql);
        
        $user = $result->fetch_assoc();

        return $user;
    }

    function insertUser($name, $email, $password, $password_confirmation){

        if (empty($name)) {
            die("Name is required");
        } else if ( ! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Valid email is required");
        } else if (strlen($password) < 8) {
            die("Password must be at least 8 characters");
        } else if ($password !== $password_confirmation) {
            die("Passwords must match");
        }
        
        $password_hash = password_hash($password, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO user (name, email, password_hash)
                VALUES (?, ?, ?)";
                
        $stmt = $this->conn->stmt_init();
        
        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $this->conn->error);
        }
        
        $stmt->bind_param("sss",
                          $name,
                          $email,
                          $password_hash);
                          
        if ($stmt->execute()) {

            $this->loggingIn($email, $password);
            
        } else {
            
            if ($this->conn->errno === 1062) {
                die("email already taken");
            } else {
                die($this->conn->error . " " . $this->conn->errno);
            }
        }        
    }

    function loggingIn($email, $password){
            
        $sql = sprintf("SELECT * FROM user
                        WHERE email = '%s'",
                        $this->conn->real_escape_string($email));
        
        $result = $this->conn->query($sql);
        
        $user = $result->fetch_assoc();
        
        if ($user) {
            
            if (password_verify($password, $user["password_hash"])) {
                
                session_start();
                
                session_regenerate_id();
                
                $_SESSION["user_id"] = $user["id"];
                
                header("Location: " . BASEURL);
                exit;
            }
        }
    }

}