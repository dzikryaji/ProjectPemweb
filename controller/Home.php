<?php

class Home extends BaseController{

    function index(){
        $productModel = $this->loadModel("ProductModel");
        $data = array();

        if (isset($_GET['p'])){
            $category = $_GET['p'];

            $products = $productModel->getProductbyCategory($category);

            $data['category'] = $category;
        } else {
            $products = $productModel->getAllProduct();
        }
        $data['products'] = $products;
        $this->loadView("index", "Home", $data);
    }

    function login(){
        if (isset($_SESSION["user_id"])) {
            $this->index();
        } else {
            $this->loadView("login", "Login");
        }
    }

    function signUp(){
        if (isset($_SESSION["user_id"])) {
            $this->index();
        } else {
            $this->loadView("signup", "Sign Up");
        }
    }

    function loggingIn(){
        $homeModel = $this->loadModel('HomeModel');

        $email = $_POST['email'];
        $password = $_POST['password'];

        $homeModel->loggingIn($email, $password);
    }

    function signingUp(){
        $homeModel = $this->loadModel('HomeModel');

        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $password_confirmation = $_POST['password_confirmation'];

        $homeModel->insertUser($name, $email, $password, $password_confirmation);
    }

    function logout(){
        session_start();

        session_destroy();

        header("Location: " . BASEURL);
        exit;
    }

}