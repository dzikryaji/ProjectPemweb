<?php

$controller = $_GET['c'] ?? "Home";
$method = $_GET['m'] ?? "index";

include_once "controller/BaseController.php";
include_once "controller/$controller.php";
include_once "config.php";

(new $controller)->$method();