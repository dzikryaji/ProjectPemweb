<?php

class ProductModel extends BaseModel
{
    function insertProduct($productName, $category, $price, $stock, $description, $fileName, $targetFilePath)
    {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFilePath)) {

            $sql = "INSERT INTO product (product_name, category, price, stock, description, product_image_name)
                VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->stmt_init();

            try {
                $stmt->prepare($sql);

                $stmt->bind_param(
                    "ssiiss",
                    $productName,
                    $category,
                    $price,
                    $stock,
                    $description,
                    $fileName
                );

                $stmt->execute();
            } catch (Exception $e) {
                $msg = "SQL error: " . $this->conn->error;
            }
        } else {
            $msg = "Sorry, there was an error uploading your file.";
        }

        if (isset($msg)) {
            Flasher::setFlash($msg, 'danger');
        } else {
            $msg = "Product has been added successfully";
            Flasher::setFlash($msg, 'success');
        }
        header("Location: " . BASEURL . "c=product&m=addproduct");
        exit;
    }

    function getAllProduct()
    {
        $sql = "SELECT * FROM product ORDER BY product_name";
        
        $result = $this->conn->query($sql);
        
        $products = $result->fetch_all(MYSQLI_ASSOC);

        return $products;
    }

    function getProductbyCategory($category)
    {
        $sql = "SELECT * FROM product WHERE category = '$category' ORDER BY product_name";
        
        $result = $this->conn->query($sql);
        
        $products = $result->fetch_all(MYSQLI_ASSOC);

        return $products;
    }

    function getProductbyId($id)
    {
        $sql = "SELECT * FROM product WHERE id_product = '$id'";
        
        $result = $this->conn->query($sql);
        
        $product = $result->fetch_assoc();

        return $product;
    }

}
