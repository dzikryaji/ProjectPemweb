<?php 

class Product extends BaseController {
    function addProduct() {
        if(isset($_SESSION['user_id'])){
            $user = $this->Model->getUser($_SESSION['user_id']);
            if ($user['name']=='Admin' && $user['email']=='admin@vegan.org') {
                $this->loadView('addProduct', 'Add Product');
            }else {
                $this->loadView('index', 'Home');
            }
        } else {
            $this->loadView('index', 'Home');
        }
    }

    function addingProduct() {
        $productModel = $this->loadModel('ProductModel');
        $allowTypes = array('jpg','png','jpeg');

        $date = new DateTime();
        $date->setTimezone(new DateTimeZone("Asia/Jakarta"));
        $uniqueNum = $date->format("ymdHis");

        $productName = $_POST['productName'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];
        $description = $_POST['description'];
        $fileName = $uniqueNum . "_" . basename($_FILES["productImage"]["name"]);
        $targetFilePath = UPLOADDIR. "/" . $fileName;
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

        if(!is_dir(UPLOADDIR)){
            mkdir(UPLOADDIR);
        }

        if(in_array($fileType, $allowTypes)){
            $productModel->insertProduct($productName, $price, $stock, $description, $fileName, $targetFilePath);
        } else {
            echo 'Sorry, only JPG, JPEG, PNG files are allowed to upload.';
        }

    }
}