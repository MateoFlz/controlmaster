<?php

namespace Core;

class Router{

    public static function Run(Request $request)
    {
        $controller = $request->getController() . 'Controller';
        $path = _ROOT_ . 'Controller' . _DS_ . 'Http' . _DS_ . $controller . '.php';

        $method = $request->getMothod();

        if ($method == 'index.php') {
            $method = 'index';
        }

        $argument = $request->getArgument();

        if (is_readable($path)) {
            require_once $path;

            $views = 'Controller' . _DS_ . 'Http' . _DS_ . $controller;
            $controller = new $views;
            if (!isset($argument)) {
                $data = call_user_func(array($controller, $method));
            } else {
          
                $data = call_user_func_array(array($controller, $method), $argument);

            }
        }

        $path = _ROOT_ . 'Public' . _DS_ . 'view' . _DS_ . $request->getController() . _DS_ . $request->getMothod() . '.php';
        if (is_readable($path)) {
            require_once $path;
        } else {
            if(!empty($request->getMothod()) != '' && !empty($argument)){
                if(is_readable(_ROOT_ . 'Public' . _DS_ . 'view' . _DS_ . $request->getController() . _DS_ . $request->getMothod() . '\\' . $argument[0] . '.php')){
                    require_once _ROOT_ . 'Public' . _DS_ . 'view' . _DS_ . $request->getController() . _DS_ . $request->getMothod() . '\\' . $argument[0] . '.php';
                }else{
                    require_once _ROOT_ . 'Public' . _DS_ . 'view' . _DS_ . 'Error/index.php';
                }
                
            }else{
                require_once _ROOT_ . 'Public' . _DS_ . 'view' . _DS_ . 'Error/index.php';
            }
            
        }

    }
}