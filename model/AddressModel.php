<?php

class AddressModel extends BaseModel
{
    function save($data)
    {
        try {
            if ($this->get()) {
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
            }
            $stmt->execute();
        } catch (Exception $e) {
            var_dump($e);
            echo $this->conn->error;
        }
    }

    function get()
    {
        $sql = "SELECT * FROM address WHERE id_user = {$_SESSION['user_id']}";

        $result = $this->conn->query($sql);

        $address = $result->fetch_assoc();

        return $address;
    }
}
