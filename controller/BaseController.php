<?php
include_once "model/BaseModel.php";

class BaseController {

    protected $Model;

    function __construct(){
        $this->Model = new BaseModel;
    }

    function loadModel($modelName) {
        include_once "model/$modelName.php";
        return new $modelName;
    }

    function loadView($viewName, $title, $data = array()){
        if (isset($_SESSION["user_id"])) {
            $userId = $_SESSION["user_id"];
            $user = $this->Model->getUser($userId);
        } else {
            $user = null;
        }

        foreach($data as $key => $value) {
            $$key = $value;
        }

        include_once "view/templates/header.php";
        include_once "view/$viewName.php";
        include_once "view/templates/footer.php";
    }

}