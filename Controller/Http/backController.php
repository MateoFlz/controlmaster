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
        return $this->view('back/index', $this->loggbackups->get_detalle()->fetchAll(\PDO::FETCH_ASSOC));
    }



    public function create_backup()
    {
        $this->loggbackups->setIdu($_SESSION['id']);
        $this->loggbackups->setFecha(date('yy-m-d'));
        $this->loggbackups->setActivo('1');
        $this->loggbackups->setDetalles('db-backup-'. date('yy-m-d') .'.sql creado ' . date('H:i:s A'));
        $response = $this->loggbackups->create();
        if($response){
            echo true;
        }else{
            echo false;
        }
        die();
    }
    
    public function delete($id = '')
    {
        $this->loggbackups->setId($this->loggbackups->clean_string($id));
        $this->loggbackups->setActivo('0');
        $response = $this->loggbackups->delete();
        if($response){
            Redirect::redirect('back?response=true');
        }else{
            Redirect::redirect('back?response=false');
        }
    }
}