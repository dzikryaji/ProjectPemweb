<?php

class PaymentModel extends BaseModel
{
    function save($data)
    {

        $sql = "INSERT INTO card (
            user_id,
            address_id,
            name,
            number,
            month,
            year,
            cvc
            )

            VALUES ({$_SESSION['user_id']}, {$data['address_id']}, '{$data['name']}', '{$data['number']}', '{$data['month']}', '{$data['year']}', '{$data['cvc']}')";

        try {
            $stmt = $this->conn->stmt_init();
            $stmt->prepare($sql);
            $stmt->execute();

            $sql = "SELECT id FROM card order by id desc limit 1";
            $result = $this->conn->query($sql);
            $address = $result->fetch_assoc();
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