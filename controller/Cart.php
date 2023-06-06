<?php

class Cart extends BaseController
{

    function index()
    {
        $this->loadView("cart","Cart");
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
}