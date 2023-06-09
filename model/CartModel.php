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

    function get() {
        $sql = "SELECT * FROM `cart` a
        left join user b on b.id = a.id_user
        left join product c on c.id_product = a.id_product;";
        
        $result = $this->conn->query($sql);
        
        $user = $result->fetch_all(MYSQLI_ASSOC);

        return $user;
    }

    function delete($id_user, $id_product)
    {

        $sql = "DELETE FROM cart WHERE id_user = $id_user and id_product = $id_product";


        try {
            $stmt = $this->conn->stmt_init();
            
            $stmt->prepare($sql);

            $stmt->execute();

            header('Location: ' . BASEURL . 'c=cart&m=index');
            exit;
        } catch (Exception $e) {
            echo $this->conn->error;
        }
    }
}
