<?php

namespace Core;

class Autoload
{

    public static function Run(){
        spl_autoload_register(function ($class){
            $path = str_replace('\\', '/', $class) . '.php';
            if(is_readable($path)){
                require_once $path;
            }
        });
    }

    public static function Run__1() {
        spl_autoload_register(function($clase) {
            $ruta = '../Database/Models/' . str_replace("\\", "/", $clase) . ".php";
            if (is_readable($ruta)) {
                require_once $ruta;
            }
        });
    }
}