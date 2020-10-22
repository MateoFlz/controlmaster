<?php


namespace Controller\Http;


use Controller\Redirecter\Redirect;
use Database\Models\Invitados;

class invitadosController extends Controller
{
    private $invitado;

    public function __construct()
    {
        $this->invitado = new Invitados();
        parent::__construct();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {

        $data = $this->invitado->getAll()->fetchAll(\PDO::FETCH_ASSOC);
        return $this->view('invitados/index', $data);
    }


    public function insert_invitado(){

        if(isset($_POST['idcedula'])){
            
            $this->invitado->setCedula($this->invitado->clean_string($_POST['idcedula']));
            $this->invitado->setPnombre($this->invitado->clean_string($_POST['idnombre1']));
            $this->invitado->setSnombre($this->invitado->clean_string($_POST['idnombre2']));
            $this->invitado->setPapellido($this->invitado->clean_string($_POST['idapellido1']));
            $this->invitado->setSapellido($this->invitado->clean_string($_POST['idapellido2']));
            $this->invitado->setCorreo($this->invitado->clean_string($_POST['idCorreo']));
            $this->invitado->setEstado($this->invitado->clean_string("1"));
            $this->invitado->setTelefono($this->invitado->clean_string($_POST['idtelefono']));
            $this->invitado->setDireccion($this->invitado->clean_string($_POST['idDireccion']));
            $this->invitado->setDetalles($this->invitado->clean_string($_POST['descripcion']));
            

            $response = $this->invitado->create();


            if($response){
                Redirect::redirect('invitados/create?response=true');
            }else{
                Redirect::redirect('invitados/create?response=true');
            }
        }
    }

    public function edit(){

        if(isset($_POST['idcedulaedit']) && isset($_POST['id'])){

            $this->invitado->setId($this->invitado->clean_string($_POST['id']));
            $this->invitado->setCedula($this->invitado->clean_string($_POST['idcedulaedit']));
            $this->invitado->setPnombre($this->invitado->clean_string($_POST['idnombre1edit']));
            $this->invitado->setSnombre($this->invitado->clean_string($_POST['idnombre2edit']));
            $this->invitado->setPapellido($this->invitado->clean_string($_POST['idapellido1edit']));
            $this->invitado->setSapellido($this->invitado->clean_string($_POST['idapellido2edit']));
            $this->invitado->setCorreo($this->invitado->clean_string($_POST['idCorreoedit']));
            $this->invitado->setEstado($this->invitado->clean_string($_POST['condiciones2edit']));
            $this->invitado->setTelefono($this->invitado->clean_string($_POST['idtelefonoedit']));
            $this->invitado->setDireccion($this->invitado->clean_string($_POST['idDireccionedit']));
            $this->invitado->setDetalles($this->invitado->clean_string($_POST['descripcionedit']));
            

            $response = $this->invitado->edit();


            if($response){
                Redirect::redirect('invitados/editar/'.$_POST['id'].'?responsedit=true');
            }else{
                Redirect::redirect('invitados/editar/'.$_POST['id'].'?responsedit=true');
            }
        }
    }

    public function editar($id = ''){
        $this->invitado->setId($id);
        $response = $this->invitado->getForCedula();
        return $this->view('invitados/editar', $response);
    }

    public function delete($id = ''){
        $this->invitado->setId($this->invitado->clean_string($id));
        $this->invitado->setEstado('0');
        $response = $this->invitado->delete();
        if($response){
            Redirect::redirect('invitados?response=true');
        }else{
            Redirect::redirect('invitados?response=false');
        }
}
}