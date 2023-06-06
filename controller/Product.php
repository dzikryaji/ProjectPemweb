<?php 

class Product extends BaseController {
    function addProduct() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $productModel = $this->loadModel('ProductModel');
            $allowTypes = array('jpg','png','jpeg');
        
            $uniqueNum = date("ymdHis");
        
            $productName = $_POST['productName'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $stock = $_POST['stock'];
            $description = $_POST['description'];
            $fileName = $uniqueNum . "_" . basename($_FILES["productImage"]["name"]);
            $targetFilePath = UPLOADDIR. "/" . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
        
            if(!is_dir("asset/".UPLOADDIR)){
                mkdir("asset/".UPLOADDIR);
            }
        
            if(in_array($fileType, $allowTypes)){
                $productModel->insertProduct($productName, $category, $price, $stock, $description, $fileName, $targetFilePath);
            } else {
                $msg = 'Only JPG, JPEG, PNG files are allowed to upload.';
                Flasher::setFlash($msg, 'danger');
                header("Location: " . BASEURL . "c=product&m=addproduct");
                exit;
            }
        } else {
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
    }

    function productDetails(){
        $productModel = $this->loadModel('ProductModel');
        $id = $_GET['p'];

        $product = $productModel->getProductbyId($id);

        $this->loadView("productDetails", "Product Details", ['product' => $product]);
    }

}