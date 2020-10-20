<?php


namespace Controller\Http;

use Controller\Http\Controller as Controller;
use Controller\Redirecter\Redirect;
use Core\Sessions;

class dashboardController extends Controller
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
        return $this->view('dashboard/index');
    }


    public function userlist()
    {
        return $this->view('dashboard/userlist');
    }

}