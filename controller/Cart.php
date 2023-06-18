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
            $idUser = $_SESSION['user_id'];

            $cartModel = $this->loadModel('CartModel');
            $cartModel->insertToCart($idUser, $idProduct, $quantity);
        } else {
            header("Location: " . BASEURL);
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
        if (!isset($_SESSION['user_id'])) {
            header("Location: " . BASEURL);
            exit;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($_POST['saveContactCheck']) {
                $Payment = $this->loadModel('PaymentModel');
                $Payment->save($_POST);
            }
            $Cart = $this->loadModel('CartModel');
            $Cart->clear();

            header('Location: ' . BASEURL . 'c=Cart&m=payment');
            exit;
        } else {
            $modal = $this->loadModel('CartModel');
            $data['carts'] = $modal->get();

            $this->loadView("payment", "Form Payment", $data);
        }
    }
}
