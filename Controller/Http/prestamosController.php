<?php

namespace Controller\Http;

use Controller\Redirecter\Redirect;
use Database\Models\Siret\Portatil;
use Database\Models\Siret\Sonido;
use Database\Models\Siret\Utilidad;
use Database\Models\Siret\Video;
use Database\Models\Usuario;


class prestamosController extends Controller
{

    private $usuario;
    private $portatil;
    private $videobeam;
    private $sonido;
    private $utilidades;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->portatil = new Portatil();
        $this->videobeam = new Video();
        $this->sonido = new Sonido();
        $this->utilidades =  new Utilidad();
        parent::__construct();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
  
        return $this->view('prestamos/index');
    }

    public function create()
    {
      
        return $this->view('prestamos/create');
    }

    public function getUser(){
        $search = $_POST['search'];

        $json = array();
        if(!empty($search)){
            $this->usuario->setPnombre($this->usuario->clean_string($search));
            $result = $this->usuario->getEspecifico2();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'cedula' => $row['cedula'],
                    'nombre' => $row['nombre']
                );
            }
            echo json_encode($json);
            die();

        }
    }

}    