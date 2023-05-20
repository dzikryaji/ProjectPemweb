<?php

class Home extends BaseController{

    function index(){
        session_start();

        $homeModel = $this->loadModel('HomeModel');

        if (isset($_SESSION["user_id"])) {
            $userId = $_SESSION["user_id"];

            $user = $homeModel->getUser($userId);

            $this->loadView("index", ["user" => $user]);
        } else {
            header('Location: ' . BASEURL . '/index.php?c=Home&m=login');
        }
    }

    function login(){
        $this->loadView("login");
    }

    function signUp(){
        $this->loadView("signup");
    }

    function loggingIn(){
        $homeModel = $this->loadModel('HomeModel');

        $name = $_POST['name'];
        $email = $_POST['email'];

        $homeModel->loggingIn($name, $email);
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