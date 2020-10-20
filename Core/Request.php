<?php

namespace Core;

class Request{

    private $Controller;
    private $Mothod;
    private $Argument;


    public function __construct(){
        if(isset($_GET['url'])){
            $path = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);
            $path = explode('/', rtrim($_GET['url'], '/'));
            $path = array_filter($path);

            if($path[0] == 'index.php'){
                $this->Controller = 'index';
            }else{
                $this->Controller = strtolower(array_shift($path));
            }

            $this->Mothod = strtolower(array_shift($path));

            if(!$this->Mothod){
                $this->Mothod = 'index';
            }

            $this->Argument = $path;

        }else{
            $this->Controller = 'index';
            $this->Mothod = 'index';
        }


    }

    /**
     * @return string
     */
    public function getController()
    {
        return $this->Controller;
    }

    /**
     * @return string
     */
    public function getMothod()
    {
        return $this->Mothod;
    }

    /**
     * @return mixed
     */
    public function getArgument()
    {
        return $this->Argument;
    }
}
