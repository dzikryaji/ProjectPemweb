<?php

$controller = $_GET['c'] ?? "Home";
$method = $_GET['m'] ?? "index";

session_start();

include_once "controller/BaseController.php";
include_once "controller/checkout.php";
include_once "controller/$controller.php";
include_once "config.php";
include_once "Flasher.php";

(new $controller)->$method();