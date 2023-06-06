<?php

class CartModel extends BaseModel
{
    function insertToCart($idUser, $idProduct, $quantity)
    {
        $sql = "INSERT INTO cart (id_user, id_product, quantity)
                VALUES (?, ?, ?)";


        try {
            $stmt = $this->conn->stmt_init();
            
            $stmt->prepare($sql);

            $stmt->bind_param(
                "iii",
                $idUser,
                $idProduct,
                $quantity
            );

            $stmt->execute();

            header('Location: ' . BASEURL . 'c=cart&m=index');
            exit;
        } catch (Exception $e) {
            echo $this->conn->error;
        }
    }
}
