<?php

class PaymentModel extends BaseModel
{
    function save($data)
    {
        try {
            if ($this->get()) {
                $sql = "UPDATE card SET
                            name = ?,
                            number = ?,
                            month = ?,
                            year = ?,
                            cvc = ?
                        WHERE id_user = ?";

                $stmt = $this->conn->stmt_init();

                $stmt->prepare($sql);

                $stmt->bind_param(
                    "sssssi",
                    $data['name'],
                    $data['number'],
                    $data['month'],
                    $data['year'],
                    $data['cvc'],
                    $_SESSION['user_id']
                );
            } else {
                $sql = "INSERT INTO card (
                            id_user,
                            name,
                            number,
                            month,
                            year,
                            cvc
                        )
                        VALUES (?, ?, ?, ?, ?, ?)";

                $stmt = $this->conn->stmt_init();

                $stmt->prepare($sql);

                $stmt->bind_param(
                    "isssss",
                    $_SESSION['user_id'],
                    $data['name'],
                    $data['number'],
                    $data['month'],
                    $data['year'],
                    $data['cvc']
                );
            }
            $stmt->execute();
        } catch (Exception $e) {
            var_dump($e);
            echo $this->conn->error;
        }
    }

    function get(){
        $sql = "SELECT * FROM card WHERE id_user = {$_SESSION['user_id']}";
        
        $result = $this->conn->query($sql);
        
        $card = $result->fetch_assoc();

        return $card;
    }
}