<?php


namespace Controller\Http;


use Controller\Redirecter\Redirect;
use Database\Models\Administrativo;
use Database\Models\Dependencia;
use Database\Models\Loggback;
use PDO;
use Helpers;
use helpers\FPDF;

class backController extends Controller
{

    private $loggbackups;

    public function __construct()
    {
        parent::__construct();
        $this->loggbackups = new Loggback();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        return $this->view('back/index');
    }



    public function insert()
    {
        header('Location: ' . URL . 'helpers/backups/descargar.php');
        Redirect::redirect('index?session=false');
    }
    
    
}