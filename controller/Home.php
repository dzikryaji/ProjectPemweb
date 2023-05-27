<?php

class Home extends BaseController{

    function index(){
        $this->loadView("index", "Home");
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