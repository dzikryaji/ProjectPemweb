<?php

class Cart extends BaseController
{

    function index()
    {
        $modal = $this->loadModel('CartModel');
        $data['carts'] = $modal->get();

        $this->loadView("cart", "Cart", $data);
    }

    function addToCart()
    {
        $idProduct = $_POST['idProduct'];
        $quantity = $_POST['quantity'];
        if (isset($_SESSION['user_id'])) {
            if($_SESSION['user_email'] == 'admin@vegan.org'){
                $msg = "Login As A User to Add Product to Cart";
                Flasher::setFlash($msg, 'danger');

                header("Location: " . BASEURL . "c=Product&m=productDetails&p=" . $idProduct);
                exit;
            } else{
                $idUser = $_SESSION['user_id'];
                $productModel = $this->loadModel('ProductModel');
                $product = $productModel->getProductbyId($idProduct);

            if($quantity < $product['stock']){
                $cartModel = $this->loadModel('CartModel');
                $cartModel->insertToCart($idUser, $idProduct, $quantity);
            } else {
                $msg = "Quantity must less than stock";
                Flasher::setFlash($msg, 'danger');

                header("Location: " . BASEURL . "c=Product&m=productDetails&p=" . $idProduct);
                exit;
            }
            }
        } else {
            $msg = "Login to Add Product to Cart";
            Flasher::setFlash($msg, 'danger');

            header("Location: " . BASEURL . "c=Product&m=productDetails&p=" . $idProduct);
            exit;
        }
    }

    function deleteCart()
    {
        $id_product = $_GET['id_product'];

        if (isset($_SESSION['user_id'])) {
            $idUser = $_SESSION['user_id'];

            $cartModel = $this->loadModel('CartModel');
            $cartModel->delete($idUser, $id_product);
        } else {
            header("Location: " . BASEURL);
            exit;
        }

        echo $id_product;
    }

    function checkout()
    {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['saveContactCheck'])) {
                $address = $this->loadModel('AddressModel');
                $address->save($_POST);
            }

            header('Location: ' . BASEURL . 'c=Cart&m=payment');
            exit;
        } else {
            $modal = $this->loadModel('CartModel');
            $address = $this->loadModel('AddressModel');
            $data['carts'] = $modal->get();
            $data['address'] = $address->get();

            $this->loadView("checkout", "Form Checkout", $data);
        }
    }

    function payment()
    {
        $Payment = $this->loadModel('PaymentModel');
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['saveCardCheck'])) {
                $Payment->save($_POST);
            }
            $Cart = $this->loadModel('CartModel');
            $Cart->clear();
            
            header('Location: ' . BASEURL . 'c=Cart&m=payment');
            exit;
        } else {
            $modal = $this->loadModel('CartModel');
            $data['carts'] = $modal->get();
            $data['card'] = $Payment->get();

            $this->loadView("payment", "Form Payment", $data);
        }
    }
}
