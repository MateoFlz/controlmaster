<?php


namespace Controller\Http;


use Controller\Redirecter\Redirect;
use Database\Models\Docente;

class docentesController extends Controller
{
    private $docente;
    public function __construct()
    {
        parent::__construct();
        $this->docente = new Docente();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        $result = $this->docente->get_data_docente();
        return $this->view('docentes/index', $result);
    }

    public function create_steacher(){
        return $this->view('docentes/create');
    }

    public function insert_docente(){
        if(isset($_POST['idcedula'])){
            $this->docente->setCedula($this->docente->clean_string($_POST['idcedula']));
            $this->docente->setPnombre($this->docente->clean_string($_POST['idnombre1']));
            $this->docente->setSnombre($this->docente->clean_string($_POST['idnombre2']));
            $this->docente->setPapellido($this->docente->clean_string($_POST['idapellido1']));
            $this->docente->setSapellido($this->docente->clean_string($_POST['idapellido2']));
            $this->docente->setTelefono($this->docente->clean_string($_POST['idtelefono']));
            $this->docente->setCorreo($this->docente->clean_string($_POST['idcorreo']));
            $this->docente->setDireccion($this->docente->clean_string($_POST['iddireccion']));
            $this->docente->setEstado($this->docente->clean_string("1"));
            $this->docente->setTipo($this->docente->clean_string($_POST['condiciones']));

            $response = $this->docente->create();

            if($response==true){
                Redirect::redirect('docentes/create?response=true');
            }else{
                Redirect::redirect('docentes/create?response=false');
            }
        }  
    }

    public function edit_docente(){

        if(isset($_POST['idcedula']) && isset($_POST['id'])){
            $this->docente->setId($this->docente->clean_string($_POST['id']));
            $this->docente->setCedula($this->docente->clean_string($_POST['idcedula']));
            $this->docente->setPnombre($this->docente->clean_string($_POST['idnombre1']));
            $this->docente->setSnombre($this->docente->clean_string($_POST['idnombre2']));
            $this->docente->setPapellido($this->docente->clean_string($_POST['idapellido1']));
            $this->docente->setSapellido($this->docente->clean_string($_POST['idapellido2']));
            $this->docente->setTelefono($this->docente->clean_string($_POST['idtelefono']));
            $this->docente->setCorreo($this->docente->clean_string($_POST['idcorreo']));
            $this->docente->setDireccion($this->docente->clean_string($_POST['iddireccion']));
            $this->docente->setEstado($this->docente->clean_string($_POST['condiciones2']));
            $this->docente->setTipo($this->docente->clean_string($_POST['condiciones']));
    
           

            $response = $this->docente->edit();


            if($response){
                Redirect::redirect('docentes/editar/'.$_POST['id'].'?responsedit=true');
            }else{
                Redirect::redirect('docentes/editar/'.$_POST['id'].'?responsedit=false');
            }
        }
    }

    public function get_all_docente(){
        $json = array();
        $result = $this->docente->get_data_docente();
        foreach($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'cedula' => $row['cedula'],
                'nombre_completo' => $row['nombre'],
                'telefono' => $row['telefono'],
                'tipo' => $row['tipo'],
            );
        }

        echo json_encode($json);
        die();
    }

    public function editar($id = ''){
        $this->docente->setId($id);
        $response = $this->docente->getForCedula();
        return $this->view('docentes/editar', $response);
    }

    public function show($id = ''){
        $this->docente->setId($id);
        $response = $this->docente->getForCedula();
        return $this->view('docentes/show', $response);
    }


    public function get_search_docente()
    {

        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->docente->setPnombre($this->docente->clean_string($search));
            $result = $this->docente->get_by_search();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'cedula' => $row['cedula'],
                    'nombre_completo' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'tipo' => $row['tipo'],
                );
            }
            echo json_encode($json);
            die();

        }

    }

    public function delete($id = '')
    {
        $this->docente->setId($this->docente->clean_string($id));
        $this->docente->setEstado('0');
        $response = $this->docente->delete();
        if($response){
            Redirect::redirect('docentes?response=true');
        }else{
            Redirect::redirect('docentes?response=false');
        }
    }

    
}