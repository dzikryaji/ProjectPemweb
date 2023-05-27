<?php 

class ProductModel extends BaseModel {
    function insertProduct($productName, $price, $stock, $description, $fileName, $targetFilePath){
        if(move_uploaded_file($_FILES["productImage"]["tmp_name"], $targetFilePath)){

            $sql = "INSERT INTO product (product_name, price, stock, description, product_image_name)
                VALUES (?, ?, ?, ?, ?)";

        } else {
            echo "Sorry, there was an error uploading your file.";
        }

        $stmt = $this->conn->stmt_init();
        
        if ( ! $stmt->prepare($sql)) {
            die("SQL error: " . $this->conn->error);
        }
        
        $stmt->bind_param("siiss",
                          $productName,
                          $price,
                          $stock,
                          $description,
                          $fileName);
                          
        if ($stmt->execute()) {

            header("Location: " . BASEURL);
            
        } else {
            die($this->conn->error . " " . $this->conn->errno);
        }
    }
}