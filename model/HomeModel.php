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
            header("Location: " . BASEURL . "c=home&m=signup");
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
                header("Location: " . BASEURL . "c=home&m=signup");
                exit;
            } else {
                $msg =  $this->conn->error . " " . $this->conn->errno;
                Flasher::setFlash($msg, 'danger');
                header("Location: " . BASEURL . "c=home&m=signup");
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

            $sql = "SELECT COUNT(id_user) AS cart_count FROM cart WHERE id_user = " . $user['id'];
            $result = $this->conn->query($sql);
            $cart = $result->fetch_assoc();

            $_SESSION["cart_count"] = $cart["cart_count"];
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["user_email"] = $user["email"];
            $_SESSION["user_name"] = $user["name"];

            header("Location: " . BASEURL);
            exit;
        }
        $msg =  "Incorrect Password or Email";
        Flasher::setFlash($msg, 'danger');
        header("Location: " . BASEURL . "c=home&m=login");
        exit;
    }

    function getAccount()
    {
        $sql = "SELECT name, email FROM user WHERE id = {$_SESSION['user_id']}";
        $result = $this->conn->query($sql);
        $user = $result->fetch_assoc();


        $sql = "SELECT address, contact_number, city, province FROM address WHERE id_user = {$_SESSION['user_id']}";
        $result = $this->conn->query($sql);
        $address = $result->fetch_assoc();

        if ($address) {
            $account = array_merge($user, $address);
        } else {
            $account = $user;
        }
        return $account;
    }

    function updateAccount($data)
    {
        try {
            $this->conn->begin_transaction();

            $sql = "UPDATE user SET
                            name = ?,
                            email = ?
                        WHERE id = ?";

            $stmt = $this->conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->bind_param(
                "ssi",
                $data['name'],
                $data['email'],
                $_SESSION['user_id']
            );
            $stmt->execute();

            $sql = "SELECT * FROM address WHERE id_user = {$_SESSION['user_id']}";
            $result = $this->conn->query($sql);
            $address = $result->fetch_assoc();

            if($address){
                $sql = "UPDATE address SET
                            name = ?,
                            address = ?,
                            contact_number = ?,
                            city = ?,
                            province = ?
                        WHERE id_user = ?";

                $stmt = $this->conn->stmt_init();
                $stmt->prepare($sql);
                $stmt->bind_param(
                    "sssssi",
                    $data['name'],
                    $data['address'],
                    $data['contact_number'],
                    $data['city'],
                    $data['province'],
                    $_SESSION['user_id']
                );
                $stmt->execute();   
            } else {
                $sql = "INSERT INTO address (
                            id_user,
                            name,
                            address,
                            contact_number,
                            city,
                            province
                        )
                        VALUES (?, ?, ?, ?, ?, ?)";

                $stmt = $this->conn->stmt_init();
                $stmt->prepare($sql);
                $stmt->bind_param(
                    "isssss",
                    $_SESSION['user_id'],
                    $data['name'],
                    $data['address'],
                    $data['contact_number'],
                    $data['city'],
                    $data['province']
                );
                $stmt->execute();
            }
            $this->conn->commit();

            header('Location: ' . BASEURL . 'c=Home&m=index');
            exit;
        } catch (Exception $e) {
            $this->conn->rollback();
            echo $e;
            echo $this->conn->error;
        }
    }
}
