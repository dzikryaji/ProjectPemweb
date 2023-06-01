<?php

class HomeModel extends BaseModel
{

    function insertUser($name, $email, $password)
    {

        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user (name, email, password_hash)
                VALUES (?, ?, ?)";

        $stmt = $this->conn->stmt_init();

        if (!$stmt->prepare($sql)) {
            $msg =  "SQL error: " . $this->conn->error;
            Flasher::setFlash($msg, 'danger');
            header("Location: " . BASEURL . "/index.php?c=home&m=signup");
            exit;
        }

        $stmt->bind_param(
            "sss",
            $name,
            $email,
            $password_hash
        );

        try {
            $stmt->execute();
        } catch (Exception $e) {
            if ($this->conn->errno === 1062) {
                $msg =  "Email already taken";
                Flasher::setFlash($msg, 'danger');
                header("Location: " . BASEURL . "/index.php?c=home&m=signup");
                exit;
            } else {
                $msg =  $this->conn->error . " " . $this->conn->errno;
                Flasher::setFlash($msg, 'danger');
                header("Location: " . BASEURL . "/index.php?c=home&m=signup");
                exit;
            }
        }

        $this->loggingIn($email, $password);
    }

    function loggingIn($email, $password)
    {

        $sql = sprintf(
            "SELECT * FROM user
                        WHERE email = '%s'",
            $this->conn->real_escape_string($email)
        );

        $result = $this->conn->query($sql);

        $user = $result->fetch_assoc();

        if ($user && password_verify($password, $user["password_hash"])) {


            session_start();

            session_regenerate_id();

            $_SESSION["user_id"] = $user["id"];

            header("Location: " . BASEURL);
            exit;
        }
        $msg =  "Incorrect Password or Email";
        Flasher::setFlash($msg, 'danger');
        header("Location: " . BASEURL . "/index.php?c=home&m=login");
        exit;
    }
}
