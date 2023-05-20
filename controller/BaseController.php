<?php

class BaseController {

    function loadModel($modelName) {
        include_once "model/BaseModel.php";
        include_once "model/$modelName.php";
        return new $modelName;
    }

    function loadView($viewName, $data = array()){
        foreach($data as $key => $value) {
            $$key = $value;
        }

        include_once "view/$viewName.php";
    }

}