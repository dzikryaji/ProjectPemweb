<?php

class ProductModel extends BaseModel
{
    function insertProduct($productName, $category, $price, $stock, $description, $fileName, $targetFilePath)
    {
        if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFilePath)) {

            $sql = "INSERT INTO product (product_name, category, price, stock, description, product_image_name)
                VALUES (?, ?, ?, ?, ?, ?)";

            $stmt = $this->conn->stmt_init();

            if (!$stmt->prepare($sql)) {
                die("SQL error: " . $this->conn->error);
            }

            $stmt->bind_param(
                "ssiiss",
                $productName,
                $category,
                $price,
                $stock,
                $description,
                $fileName
            );

            if ($stmt->execute()) {

                header("Location: " . BASEURL);
            } else {
                die($this->conn->error . " " . $this->conn->errno);
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
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
}
