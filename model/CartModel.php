<?php

class CartModel extends BaseModel
{
    function insertToCart($idUser, $idProduct, $quantity)
    {
        $sql = "SELECT * FROM cart WHERE id_user = ? AND id_product = ?;";

        try {
            $stmt = $this->conn->prepare($sql);

            $stmt->bind_param(
                "ii",
                $idUser,
                $idProduct
            );

            $stmt->execute();
            $result = $stmt->get_result()->fetch_assoc();

            if ($result) {
                $sql = "UPDATE cart SET quantity = ? WHERE id_user = ? AND id_product = ?;";

                $stmt = $this->conn->prepare($sql);

                $stmt->bind_param(
                    "iii",
                    $quantity,
                    $idUser,
                    $idProduct
                );

                $stmt->execute();
            } else {
                $sql = "INSERT INTO cart (id_user, id_product, quantity)
                VALUES (?, ?, ?)";

                $stmt = $this->conn->prepare($sql);

                $stmt->bind_param(
                    "iii",
                    $idUser,
                    $idProduct,
                    $quantity
                );

                $stmt->execute();
                $_SESSION['cart_count']++;
            }

            header('Location: ' . BASEURL . 'c=cart&m=index');
            exit;
        } catch (Exception $e) {
            echo $this->conn->error;
        }
    }

    function get()
    {
        $sql = "SELECT * FROM `cart` a
        left join user b on b.id = a.id_user
        left join product c on c.id_product = a.id_product;";

        $result = $this->conn->query($sql);

        $carts = $result->fetch_all(MYSQLI_ASSOC);

        return $carts;
    }

    function delete($id_user, $id_product)
    {

        $sql = "DELETE FROM cart WHERE id_user = $id_user and id_product = $id_product";


        try {
            $stmt = $this->conn->stmt_init();

            $stmt->prepare($sql);

            $stmt->execute();
            $_SESSION['cart_count']--;

            header('Location: ' . BASEURL . 'c=cart&m=index');
            exit;
        } catch (Exception $e) {
            echo $this->conn->error;
        }
    }

    function clear()
    {
        try {
            $carts = $this->get();

            $this->conn->begin_transaction();

            foreach ($carts as $cart) {
                $sql = "UPDATE product 
                        SET stock = stock - {$cart['quantity']}
                        WHERE id_product = {$cart['id_product']}";
                $this->conn->query($sql);
            }

            $sql = "DELETE FROM cart WHERE id_user = {$_SESSION['user_id']}";
            $this->conn->query($sql);

            $this->conn->commit();

            $_SESSION['cart_count'] = 0;

            header('Location: ' . BASEURL . 'c=Home&m=index');
            exit;
        } catch (Exception $e) {
            $this->conn->rollback();
            echo $this->conn->error;
        }
    }
}
