<?php
namespace Controller\Http;

use Controller\Http\Controller as Controller;
use Controller\Redirecter\Redirect;
use Core\Sessions;
use Database\Models\Dependencia;
use Database\Models\Programa;
use Database\Models\Etiquetas;
use Database\Models\Aulas;

class configuracionController extends Controller{


    private $program;
    private $dependenc;
    private $etiqueta;
    private $aula;

    public function __construct()
    {

        parent::__construct();
        $this->program = new Programa();
        $this->dependenc = new Dependencia();
        $this->etiqueta =  new Etiquetas();
        $this->aula = new Aulas();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        return $this->view('configuracion/index');
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
                    'idProgramas' => $row['id']
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

    public function get_etiquetas(){
        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->etiqueta->setEtiqueta($this->etiqueta->clean_string($search));
            $result = $this->etiqueta->get_etiqueta();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'nametiqueta' => $row['descripcion'],
                    'id' => $row['id']
                );
            }

            echo json_encode($json);
            die();
        }
    }

    public function get_aula(){
        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->aula->setNombre($this->aula->clean_string($search));
            $result = $this->aula->get_aula();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['id'],
                    'sede' => $row['sede'],
                    'nombre' => $row['nombre'],
                    'estado' => $row['estado'],
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

    public function insert_etiqueta(){
        if(isset($_POST['nametiqueta'])){
            $namedependence = $_POST['nametiqueta'];
            $this->etiqueta->setEtiqueta($namedependence);
            $result = $this->etiqueta->add();
            echo $result;
            die();
        }
    }

    public function insert_aula(){
        if(isset($_POST['nameaula'])){
            $this->aula->setSede($this->aula->clean_string($_POST['sedes']));
            $this->aula->setNombre($this->aula->clean_string($_POST['nameaula']));
            $this->aula->setEstado($this->aula->clean_string($_POST['estado']));
            $this->aula->setActivo('1');
            $result = $this->aula->add();
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
                'idProgramas' => $row['id']
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

    public function get_etiqueta(){
        $result = $this->etiqueta->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'nametiqueta' => $row['descripcion'],
                'id' => $row['id']
            );
        }
        echo json_encode($json);
        die();
    }

    public function get_aulas(){
        $result = $this->aula->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'id' => $row['id'],
                'sede' => $row['sede'],
                'nombre' => $row['nombre'],
                'estado' => $row['estado'],
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

    public function edit_etiqueta(){
        if(isset($_POST['id'])){
            $this->etiqueta->setId($_POST['id']);
            $this->etiqueta->setEtiqueta($_POST['nametiqueta']);
            $result = $this->etiqueta->edit();
            echo $result;
            die();
        }
    }

    public function edit_aula(){
        if(isset($_POST['id'])){
            $this->aula->setId($this->aula->clean_string($_POST['id']));
            $this->aula->setSede($this->aula->clean_string($_POST['sedes']));
            $this->aula->setNombre($this->aula->clean_string($_POST['nameaula']));
            $this->aula->setEstado($this->aula->clean_string($_POST['estado']));
            $this->aula->setActivo($this->aula->clean_string($_POST['activo']));
            $result = $this->aula->edit();
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
    public function get_aulaId(){
        $json = array();
        if(isset($_POST['id'])){
            $this->aula->setId($_POST['id']);
            $result = $this->aula->get_forId();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['id'],
                    'sede' => $row['sede'],
                    'nombre' => $row['nombre'],
                    'estado' => $row['estado'],
                    'activo' => $row['activo']
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

    public function get_etiquetaId(){
        $json = array();
        if(isset($_POST['id'])){
            $this->etiqueta->setId($_POST['id']);
            $result = $this->etiqueta->get_forId();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['id'],
                    'nametiqueta' => $row['descripcion'],
                );
            }
            echo json_encode($json);
            die();
        }
    }

}