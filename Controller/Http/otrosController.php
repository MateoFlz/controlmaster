<?php


namespace Controller\Http;


use Controller\Redirecter\Redirect;

class otrosController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        return $this->view('otros/index');
    }
}