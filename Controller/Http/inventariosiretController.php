<?php

namespace Controller\Http;

use Controller\Http\Controller;
use Controller\Redirecter\Redirect;
use Database\Models\Siret\Equipos;

class inventariosiretController extends Controller
{

    private $equipos;

    public function __construct()
    {
        $this->equipos = new Equipos();
        parent::__construct();
        if ($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))) {
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        return $this->view('inventarios/index');
    }

    public function equipos()
    {
        return $this->view('inventarios/equipos');
    }

    public function insert()
    {
        if(isset($_POST['serial']))
        {

        }
    }



    
}
