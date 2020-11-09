<?php

namespace Controller\Http;

use Controller\Redirecter\Redirect;
use Database\Models\Usuario;
use Database\Models\Etiquetas;
use Database\Models\Equipos;
use Database\Models\PrestamoEquipo;
use Database\Models\Utilidades;
use PDO;

class prestamosController extends Controller
{

    private $usuario;
    private $equipos;
    private $etiqueta;
    private $prestamo_equipo;
    private $utilidad;

    public function __construct()
    {
        $this->usuario = new Usuario();
        $this->etiqueta = new Etiquetas();
        $this->equipos = new Equipos();
        $this->utilidad = new Utilidades();
        $this->prestamo_equipo = new PrestamoEquipo();
        parent::__construct();
        if ($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))) {
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {

        return $this->view('prestamos/index');
    }

    public function create()
    {
        $this->equipos->setDescripcion('Video');
        $data_uno = $this->equipos->getEquipoByactivo()->fetchAll(\PDO::FETCH_ASSOC);
        $this->equipos->setDescripcion('Portatil');
        $data_dos = $this->equipos->getEquipoByactivo()->fetchAll(\PDO::FETCH_ASSOC);
        $data_tres = $this->utilidad->getUtilidaByactivo()->fetchAll(\PDO::FETCH_ASSOC);
        $data = [
            'video' => $data_uno,
            'portatil' => $data_dos,
            'utilidad' => $data_tres
        ];

        return $this->view('prestamos/create', $data);
    }

    public function getUser()
    {
        $search = $_POST['search'];

        $json = array();
        if (!empty($search)) {
            $this->usuario->setPnombre($this->usuario->clean_string($search));
            $result = $this->usuario->getEspecifico2();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) as $row) {
                $json[] = array(
                    'cedula' => $row['cedula'],
                    'nombre' => $row['nombre']
                );
            }
            echo json_encode($json);
            die();
        }
    }

    public function reservarEquipo()
    {
        $this->prestamo_equipo->setActivo('1');
        $this->prestamo_equipo->setEquipoId($this->prestamo_equipo->clean_string($_POST['id']));
        $this->equipos->setId($this->equipos->clean_string($_POST['id']));
        $equipoprestado = $this->prestamo_equipo->equipoPrestado()->fetchAll(PDO::FETCH_ASSOC);
        if(empty($equipoprestado)){
            $this->prestamo_equipo->create_tmp_equipo();
            $data = $this->equipos->getEquipoByEtiquetaId()->fetchAll(PDO::FETCH_ASSOC);
            $this->equipos->setId($data[0]['id']);
            $this->equipos->setSerial($data[0]['serial']);
            $this->equipos->setMarca($data[0]['marca']);
            $this->equipos->setDescripcion($data[0]['descripcion']);
            $this->equipos->setEtiqueta($data[0]['tipo']);
            $this->equipos->setFecha(date('yy-m-d'));
            $this->equipos->create_temporal();
            echo true;
        }else{
            $this->prestamo_equipo->update_tmp_equipo();
            $data = $this->equipos->getEquipoByEtiquetaId()->fetchAll(PDO::FETCH_ASSOC);
            $this->equipos->setId($data[0]['id']);
            $this->equipos->setSerial($data[0]['serial']);
            $this->equipos->setMarca($data[0]['marca']);
            $this->equipos->setDescripcion($data[0]['descripcion']);
            $this->equipos->setEtiqueta($data[0]['tipo']);
            $this->equipos->setFecha(date('yy-m-d'));
            $this->equipos->create_temporal();
           echo true;
        }
        die();
    }

    public function reservarUtilidad()
    {


        $this->prestamo_equipo->setActivo('1');
        $this->prestamo_equipo->setEquipoId($this->prestamo_equipo->clean_string($_POST['id']));
        $this->utilidad->setId($this->utilidad->clean_string($_POST['id']));
        $equipoprestado = $this->prestamo_equipo->utilidadPrestado()->fetchAll(PDO::FETCH_ASSOC);
        if(empty($equipoprestado)){
            $this->prestamo_equipo->create_tmp_utilidad();
            $data = $this->equipos->getEquipoByEtiquetaId()->fetchAll(PDO::FETCH_ASSOC);
            $this->utilidad->setId($data[0]['id']);
            $this->utilidad->setMarca($data[0]['marca']);
            $this->utilidad->setDescripcion($data[0]['descripcion']);
            $this->utilidad->setCantidad($data[0]['cantidad']);
            $this->utilidad->setEtiqueta($data[0]['tipo']);
            $this->utilidad->setFecha(date('yy-m-d'));
            $this->utilidad->create_temporal();
            echo true;
        }else{
            $this->prestamo_equipo->update_tmp_equipo();
            $data = $this->utilidad->getUtilidaByactivo()->fetchAll(PDO::FETCH_ASSOC);
            $this->utilidad->setId($data[0]['id']);
            $this->utilidad->setMarca($data[0]['marca']);
            $this->utilidad->setDescripcion($data[0]['descripcion']);
            $this->utilidad->setCantidad($data[0]['cantidad']);
            $this->utilidad->setEtiqueta($data[0]['tipo']);
            $this->utilidad->setFecha(date('yy-m-d'));
            $this->utilidad->create_temporal();
           echo true;
        }
        die();
    }

    public function get_equipos_video()
    {
        $this->equipos->setDescripcion('Video');
        $data = $this->equipos->getEquipoByactivo();
        $json = array();
        foreach ($data->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $json[] = array(
                'id' => $row['id'],
                'serial' => $row['serial'],
                'marca' => $row['marca'],
                'descripcion' => $row['descripcion'],
                'estado_equipo' => $row['estado_equipo'],
                'tipo' => $row['tipo']
            );
        }
        echo json_encode($json);
        die();
    }

    public function get_equipos_portatil()
    {
        $this->equipos->setDescripcion('Portatil');
        $data = $this->equipos->getEquipoByactivo();
        $json = array();
        foreach ($data->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $json[] = array(
                'id' => $row['id'],
                'serial' => $row['serial'],
                'marca' => $row['marca'],
                'descripcion' => $row['descripcion'],
                'estado_equipo' => $row['estado_equipo'],
                'tipo' => $row['tipo']
            );
        }
        echo json_encode($json);
        die();
    }

    public function temporalTable()
    {
        $json = array();
        $data = $this->equipos->getTable();
        foreach ($data->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $json[] = array(
                'id_equipo' => $row['id_equipo'],
                'serial' => $row['serial'],
                'marca' => $row['marca'],
                'descripcion' => $row['descripcion'],
                'tipo' => $row['tipo']
            );
        }
        echo json_encode($json);
        die();
    }

    public function delete_temporal()
    {
        if(isset($_POST['id'])){

            $this->prestamo_equipo->setEquipoId($this->prestamo_equipo->clean_string($_POST['id']));
            $this->prestamo_equipo->setActivo('0')  ;
            $response = $this->prestamo_equipo->delete_tmp_equipo();
            $id_tmp = $this->prestamo_equipo->delete_tmp_id_equipo();
            if($response && $id_tmp){
                echo true;
            }else{
                echo false;
            }
           
            die();
        }
    }
}
