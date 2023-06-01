<?php

class Home extends BaseController
{

    function index()
    {
        $productModel = $this->loadModel("ProductModel");
        $data = array();

        if (isset($_GET['p'])) {
            $category = $_GET['p'];

            $products = $productModel->getProductbyCategory($category);

            $data['category'] = $category;
        } else {
            $products = $productModel->getAllProduct();
        }
        $data['products'] = $products;
        $this->loadView("index", "Home", $data);
    }

    function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $homeModel = $this->loadModel('HomeModel');

            $email = $_POST['email'];
            $password = $_POST['password'];

            $homeModel->loggingIn($email, $password);
        } else {
            if (isset($_SESSION["user_id"])) {
                $this->index();
            } else {
                $this->loadView("login", "Login");
            }
        }
    }

    function signUp()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $homeModel = $this->loadModel('HomeModel');

            if (empty($_POST["name"])) {
                $msg = "Name is required";
            } else if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
                $msg = "Valid email is required";
            } else if (strlen($_POST["password"]) < 8) {
                $msg = "Password must be at least 8 characters";
            } else if ($_POST["password"] !== $_POST["password_confirmation"]) {
                $msg = "Passwords must match";
            }

            if (isset($msg)){
                Flasher::setFlash($msg, 'danger');
                header("Location: " . BASEURL . "/index.php?c=home&m=signup");
                exit;
            }

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];

            $homeModel->insertUser($name, $email, $password, $password_confirmation);
        } else {
            if (isset($_SESSION["user_id"])) {
                $this->index();
            } else {
                $this->loadView("signup", "Sign Up");
            }
        }
    }

    function logout()
    {
        session_destroy();

        header("Location: " . BASEURL);
        exit;
    }
}
