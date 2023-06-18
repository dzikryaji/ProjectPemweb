<?php

class AddressModel extends BaseModel
{
    function save($data)
    {

        $sql = "INSERT INTO address (
            name,
            address,
            contact_number,
            city,
            province)

            VALUES ('{$data['name']}', '{$data['address']}', '{$data['contact_number']}', '{$data['city']}', '{$data['province']}')";

        try {
            $stmt = $this->conn->stmt_init();
            
            $stmt->prepare($sql);

            $stmt->execute();

            $sql = "SELECT id FROM address order by id desc limit 1";
            $result = $this->conn->query($sql);
            $address = $result->fetch_assoc();

        } catch (Exception $e) {
            var_dump($e);
            echo $this->conn->error;
        }
    }

    function get()
    {

    }
}