<?php

namespace Controller\Redirecter;
class Redirect
{

    public function __construct()
    {
    }

    public static function redirect($page){
        header('Location: ' . URL . $page);
    }
}