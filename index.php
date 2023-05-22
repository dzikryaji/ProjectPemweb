<?php

define("BASEURL", "http://localhost/ProjectPemweb");

$controller = $_GET['c'] ?? "Home";
$method = $_GET['m'] ?? "index";

include_once "controller/BaseController.php";
include_once "controller/$controller.php";

(new $controller)->$method();