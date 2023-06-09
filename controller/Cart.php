<?php

class Cart extends BaseController
{

    function index()
    {
        $modal = $this->loadModel('CartModel');
        $data['carts'] = $modal->get();
        
        $this->loadView("cart","Cart", $data);
    }

    function addToCart(){
        $idProduct = $_POST['idProduct'];
        $quantity = $_POST['quantity'];
        if(isset($_SESSION['user_id'])){
            $idUser = $_SESSION['user_id'];

            $cartModel = $this->loadModel('CartModel');
            $cartModel->insertToCart($idUser, $idProduct, $quantity);
        } else {
            header("Location: " . BASEURL);
            exit;
        }
    }

    function deleteCart() {
        $id_product = $_GET['id_product'];

        if(isset($_SESSION['user_id'])){
            $idUser = $_SESSION['user_id'];

            $cartModel = $this->loadModel('CartModel');
            $cartModel->delete($idUser, $id_product);
        } else {
            header("Location: " . BASEURL);
            exit;
        }

        echo $id_product;
    }

    function checkout() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }

        $modal = $this->loadModel('CartModel');
        $data['carts'] = $modal->get();
        
        $this->loadView("checkout","Form Checkout", $data);
    }

    function proccess_checkout() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }

        $address = $this->loadModel('AddressModel');
        $address->save($_POST);
    }

    function payment() {
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }

        $address_id = $_GET['address_id'];
        
        $modal = $this->loadModel('CartModel');
        $data['carts'] = $modal->get();
        
        $this->loadView("payment","Form Payment", $data);
    }

    function proccess_payment() {

        // echo "ID: $";
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }

        $Payment = $this->loadModel('PaymentModel');
        $Payment->save($_POST);
    }

}