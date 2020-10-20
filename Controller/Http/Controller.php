<?php

namespace Controller\Http;

use Controller\Method\DefaulMethod;
use Controller\Redirecter\Redirect;
use Core\Sessions;

class Controller extends DefaulMethod{

    protected $session;

    public function __construct()
    {
       $this->session = new Sessions();
       $this->session->init();
        $innativity = 600;
        if(isset($_SESSION['timeout'])){
            $sessionTTL = time() - $_SESSION['timeout'];
            if($sessionTTL > $innativity){
                $this->session->close();
                Redirect::redirect('index');
            }
        }
    }

    protected function view($Method = '', $datos = []){
        if(file_exists(_ROOT_ . 'Public\view\\' . $Method . '.php')){
            require_once _ROOT_ . 'Public\view\\' . $Method . '.php';
        }else{
            die('PAGINA NO ENCONTRADA');
        }
    }

    public function index()
    {
        // TODO: Implement index() method.
    }

    public function create()
    {
        // TODO: Implement create() method.
    }

    public function store()
    {
        // TODO: Implement store() method.
    }

    public function show()
    {
        // TODO: Implement show() method.
    }

    public function edit()
    {
        // TODO: Implement edit() method.
    }

    public function update()
    {
        // TODO: Implement update() method.
    }

    public function destroy()
    {
        // TODO: Implement destroy() method.
    }
}
