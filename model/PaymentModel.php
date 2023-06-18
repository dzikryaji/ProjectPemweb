<?php

class PaymentModel extends BaseModel
{
    function save($data)
    {
        var_dump($data);

        $sql = "INSERT INTO payment (
            user_id,
            address_id,
            name,
            number,
            month,
            year,
            cvc
            )

            VALUES ({$_SESSION['user_id']}, {$data['address_id']}, '{$data['name']}', '{$data['number']}', '{$data['month']}', '{$data['year']}', '{$data['cvc']}')";
        echo $sql;

        try {
            $stmt = $this->conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->execute();

            $sql = "SELECT id FROM payment order by id desc limit 1";
            $result = $this->conn->query($sql);
            $address = $result->fetch_assoc();
        } catch (Exception $e) {
            var_dump($e);
            echo $this->conn->error;
        }
    }
}