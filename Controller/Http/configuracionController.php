<?php
namespace Controller\Http;

use Controller\Http\Controller as Controller;
use Controller\Redirecter\Redirect;
use Core\Sessions;
use Database\Models\Dependencia;
use Database\Models\Programa;

class configuracionController extends Controller{


    private $program;
    private $dependenc;

    public function __construct()
    {

        parent::__construct();
        $this->program = new Programa();
        $this->dependenc = new Dependencia();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        //return $this->view('configuracion/index');
    }


    public function get_program(){
        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->program->setPrograma($this->program->clean_string($search));
            $result = $this->program->get_program();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'nombreprograma' => $row['nombreprograma'],
                    'idProgramas' => $row['idProgramas']
                );
            }

            echo json_encode($json);
            die();
        }
    }

    public function get_dependece(){
        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->dependenc->setDependencia($this->dependenc->clean_string($search));
            $result = $this->dependenc->get_dependencia();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'nombredependencia' => $row['nombre_dependencia'],
                    'id' => $row['id']
                );
            }

            echo json_encode($json);
            die();
        }
    }

    // METODOS PARA INSERTAR PROGRAMAS Y DEPENDENCIA
    public function insert_program(){
        if(isset($_POST['nameprogram'])){
            $nameprogram = $_POST['nameprogram'];
            $this->program->setPrograma($nameprogram);
            $result = $this->program->add_program();
            echo $result;
            die();
        }
    }

    public function insert_dependencia(){
        if(isset($_POST['namedependencia'])){
            $namedependence = $_POST['namedependencia'];
            $this->dependenc->setDependencia($namedependence);
            $result = $this->dependenc->add_dependence();
            echo $result;
            die();
        }
    }


    // METODO PARA TRAER TODOS LOS DATOS DE LAS TABLA PROGRAMA Y DEPENDENICA
    public function get_all(){
        $result = $this->program->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'nombreprograma' => $row['nombreprograma'],
                'idProgramas' => $row['idProgramas']
            );
        }

        echo json_encode($json);
        die();
    }

    public function get_dependencia(){
        $result = $this->dependenc->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'nombredependencia' => $row['nombre_dependencia'],
                'id' => $row['id']
            );
        }
        echo json_encode($json);
        die();
    }


    // METODOS PARA EDITAR PROGRAMAS Y DEPENDENCIA
    public function edit_program(){
        if(isset($_POST['id'])){
            $this->program->setId($_POST['id']);
            $this->program->setPrograma($_POST['nameprogram']);
            $result = $this->program->program_edit();
            echo $result;
            die();
        }
    }

    public function edit_dependencia(){
        if(isset($_POST['id'])){
            $this->dependenc->setId($_POST['id']);
            $this->dependenc->setDependencia($_POST['namedependencia']);
            $result = $this->dependenc->dependence_edit();
            echo $result;
            die();
        }
    }




    // METODOS PARA ELIMINAR PROGRAMAS Y DEPENDENCIA
    public function program_delete(){
        if(isset($_POST['id'])){
            $this->program->setId($_POST['id']);
            $result = $this->program->delete_program();
            echo $result;
            die();
        }
    }


    public function dependence_delete(){
        if(isset($_POST['id'])){
            $this->dependenc->setId($_POST['id']);
            $result = $this->dependenc->delete_dependence();
            echo $result;
            die();
        }
    }


    // METODOS PARA TRAER POR ID PARA EDITAR PROGRAMA O DEPENDENCIA
    public function get_programId(){
        $json = array();
        if(isset($_POST['id'])){
            $this->program->setId($_POST['id']);
            $result = $this->program->get_forId();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['idProgramas'],
                    'nombreprograma' => $row['nombreprograma'],
                );
            }
            echo json_encode($json);
            die();
        }
    }


    public function get_dependeciaId(){
        $json = array();
        if(isset($_POST['id'])){
            $this->dependenc->setId($_POST['id']);
            $result = $this->dependenc->get_forId();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['id'],
                    'nombredependencia' => $row['nombre_dependencia'],
                );
            }
            echo json_encode($json);
            die();
        }
    }

}