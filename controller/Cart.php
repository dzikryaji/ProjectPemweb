<?php

class Cart extends BaseController
{

    function index()
    {
        $this->loadView("cart","Cart");
    }
}