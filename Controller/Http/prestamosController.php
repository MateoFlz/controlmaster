<?php

namespace Controller\Http;

use Controller\Redirecter\Redirect;
use Database\Models\Usuario;
use Database\Models\Etiquetas;
use Database\Models\Equipos;
use Database\Models\PrestamoEquipo;
use Database\Models\Utilidades;
use Dompdf\Dompdf;
use Dompdf\Options;
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

        return $this->view('prestamos/index', $this->prestamo_equipo->get_prestamos()->fetchAll(\PDO::FETCH_ASSOC));
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
                    'id' => $row['id'],
                    'cedula' => $row['cedula'],
                    'nombre' => $row['nombre']
                );
            }
            echo json_encode($json);
            die();
        }
    }

    public function editar($id = '')
    {
        $this->equipos->setDescripcion('Video');
        $data_uno = $this->equipos->getEquipoByactivo()->fetchAll(\PDO::FETCH_ASSOC);
        $this->equipos->setDescripcion('Portatil');
        $data_dos = $this->equipos->getEquipoByactivo()->fetchAll(\PDO::FETCH_ASSOC);
        $data_tres = $this->utilidad->getUtilidaByactivo()->fetchAll(\PDO::FETCH_ASSOC);

        $this->prestamo_equipo->setId($this->prestamo_equipo->clean_string($id));
        $datos_equipos = $this->prestamo_equipo->get_prestado_activo()->fetchAll(\PDO::FETCH_ASSOC);
        $datos_utilidad = $this->prestamo_equipo->get_prestado_activo2()->fetchAll(\PDO::FETCH_ASSOC);

        $data = [
            'video' => $data_uno,
            'portatil' => $data_dos,
            'utilidad' => $data_tres,
            'activo_equipo' => $datos_equipos,
            'activo_utilidad' => $datos_utilidad
        ];
        return $this->view('prestamos/editar', $data);
    }

    public function show($id = '')
    {
        
        $this->prestamo_equipo->setId($this->prestamo_equipo->clean_string($id));
        $datos_equipos = $this->prestamo_equipo->get_prestado_activo()->fetchAll(\PDO::FETCH_ASSOC);
        $datos_utilidad = $this->prestamo_equipo->get_prestado_activo2()->fetchAll(\PDO::FETCH_ASSOC);

        $data = [
            'activo_equipo' => $datos_equipos,
            'activo_utilidad' => $datos_utilidad
        ];
        return $this->view('prestamos/show', $data);
    }

    public function delete_item($id = '')
    {
        if($id){
            $this->prestamo_equipo->setFechaDevolucion(date('yy-m-d'));
            $this->prestamo_equipo->setHoraFinal(date('H:i:s A'));
            $this->prestamo_equipo->setRecive($_SESSION['name']);
            $this->prestamo_equipo->setActivo('0');
            $this->prestamo_equipo->setId($id);
            $response = $this->prestamo_equipo->delete_prestamo_equipo();
            if($response){
                Redirect::redirect('prestamos/editar/' .$id.'?delete=true');
            }else{
                Redirect::redirect('prestamos/editar/' .$id.'?delete=false');
            }
        }
        


    }

    public function delete($id = '')
    {
        
        
    }

    public function reservarEquipo()
    {
        $this->prestamo_equipo->setActivo('1');
        $this->prestamo_equipo->setEquipoId($this->prestamo_equipo->clean_string($_POST['id']));
        $this->equipos->setId($this->equipos->clean_string($_POST['id']));
        $equipoprestado = $this->prestamo_equipo->equipoPrestado()->fetchAll(\PDO::FETCH_ASSOC);
        if (empty($equipoprestado)) {
            $this->prestamo_equipo->create_tmp_equipo();
            $data = $this->equipos->getEquipoByEtiquetaId()->fetchAll(\PDO::FETCH_ASSOC);
            $this->equipos->setId($data[0]['id']);
            $this->equipos->setSerial($data[0]['serial']);
            $this->equipos->setMarca($data[0]['marca']);
            $this->equipos->setDescripcion($data[0]['descripcion']);
            $this->equipos->setEtiqueta($data[0]['tipo']);
            $this->equipos->setFecha(date('yy-m-d'));
            $this->equipos->create_temporal();
            echo true;
        } else {
            $this->prestamo_equipo->update_tmp_equipo();
            $data = $this->equipos->getEquipoByEtiquetaId()->fetchAll(\PDO::FETCH_ASSOC);
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


        if (isset($_POST['id'])) {
            $this->prestamo_equipo->setActivo('1');
            $this->prestamo_equipo->setUtilidadId($_POST['id']);
            $this->utilidad->setId($_POST['id']);


            $data = $this->utilidad->getUtilidaById()->fetchAll(\PDO::FETCH_ASSOC);

            $this->utilidad->setMarca($data[0]['marca']);
            $this->utilidad->setDescripcion($data[0]['descripcion']);
            $this->utilidad->setEtiqueta($data[0]['tipo']);
            $this->utilidad->setFecha(date('yy-m-d'));

            if (empty($this->prestamo_equipo->utilidadPrestado()->fetchAll(\PDO::FETCH_ASSOC))) {

                if (empty($this->utilidad->getUtilidaBycantidad()->fetchAll(\PDO::FETCH_ASSOC))) {
                    $this->prestamo_equipo->create_tmp_utilidad();
                    $this->utilidad->setCantidad('1');
                    $this->utilidad->setCantidad2(($data[0]['cantidad'] - 1));
                    $response = $this->utilidad->create_temporal();
                    echo $response;
                } else {
                    echo "No Ingreso 1: <br>";
                }
            } else {
                $tmp_utilidad = $this->utilidad->getUtilidaBycantidad()->fetchAll(\PDO::FETCH_ASSOC);
                if (!empty($tmp_utilidad)) {
                    $this->prestamo_equipo->update_tmp_utilidad();
                    $this->utilidad->setCantidad(($tmp_utilidad[0]['cantidad'] + 1));
                    $this->utilidad->setCantidad2(($data[0]['cantidad'] - 1));
                    $response = $this->utilidad->update_temporal();
                    echo $response;
                } else {
                    $this->prestamo_equipo->update_tmp_utilidad();
                    $this->utilidad->setCantidad('1');
                    $this->utilidad->setCantidad2(($data[0]['cantidad'] - 1));
                    $response = $this->utilidad->create_temporal();
                    echo $response;
                }
            }
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

    public function get_all_utilidades()
    {
        $data = $this->utilidad->getUtilidaByactivo();
        $json = array();
        foreach ($data->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $json[] = array(
                'id' => $row['id'],
                'marca' => $row['marca'],
                'descripcion' => $row['descripcion'],
                'cantidad' => $row['cantidad'],
                'estado_equipo' => $row['estado'],
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

    public function temporal_utilidad()
    {
        $json = array();
        $data = $this->utilidad->getTableutilidad();
        foreach ($data->fetchAll(\PDO::FETCH_ASSOC) as $row) {
            $json[] = array(
                'id_utilidad' => $row['id_utilidad'],
                'marca' => $row['marca'],
                'descripcion' => $row['descripcion'],
                'cantidad' => $row['cantidad'],
                'tipo' => $row['tipo']
            );
        }
        echo json_encode($json);
        die();
    }

    public function delete_temporal()
    {
        if (isset($_POST['id'])) {

            $this->prestamo_equipo->setEquipoId($this->prestamo_equipo->clean_string($_POST['id']));
            $this->prestamo_equipo->setActivo('0');
            $response = $this->prestamo_equipo->delete_tmp_equipo();
            $id_tmp = $this->prestamo_equipo->delete_tmp_id_equipo();
            if ($response && $id_tmp) {
                echo true;
            } else {
                echo false;
            }

            die();
        }
    }

    public function delete_temporal_utilidad()
    {
        if (isset($_POST['id'])) {
            $this->prestamo_equipo->setUtilidadId($this->prestamo_equipo->clean_string($_POST['id']));
            $this->prestamo_equipo->setActivo('0');
            $this->utilidad->setId($_POST['id']);

            $tmp_utilidad = $this->utilidad->getUtilidaBycantidad()->fetchAll(\PDO::FETCH_ASSOC);
            $data = $this->utilidad->getUtilidaById()->fetchAll(\PDO::FETCH_ASSOC);

            if ($tmp_utilidad) {
                if ($tmp_utilidad[0]['cantidad'] != 0) {
                    $this->utilidad->setCantidad(($tmp_utilidad[0]['cantidad'] - 1));
                    $this->utilidad->setCantidad2(($data[0]['cantidad'] + 1));
                    $response = $this->utilidad->update_temporal();
                    $tmp_utilidad = $this->utilidad->getUtilidaBycantidad()->fetchAll(\PDO::FETCH_ASSOC);
                    if ($tmp_utilidad[0]['cantidad'] == 0) {
                        $this->prestamo_equipo->update_tmp_utilidad();
                        $response = $this->prestamo_equipo->delete_tmp_utilidad();
                    }
                    echo $response;
                }
            }
        }
        die();
    }


    public function insert_prestamo()
    {
        if (isset($_POST['cod2']) && isset($_POST['iduser'])) {
            $this->prestamo_equipo->setObservacion($this->prestamo_equipo->clean_string($_POST['observacion']));
            $this->prestamo_equipo->setUbicacion($this->prestamo_equipo->clean_string($_POST['ubicacionprestamo']));
            $this->prestamo_equipo->setCedula($this->prestamo_equipo->clean_string($_POST['iduser']));
            $this->prestamo_equipo->setFecha(date('yy-m-d'));
            $this->prestamo_equipo->setHoraEntrega(date('H:i:s A'));
            $this->prestamo_equipo->setEstado('1');
            $this->prestamo_equipo->setHoraFinal('');
            $this->prestamo_equipo->setRecive('');
            $this->prestamo_equipo->setFechaDevolucion('');

            $data = $this->prestamo_equipo->getTable()->fetchAll(\PDO::FETCH_ASSOC);
            $utilidad = $this->prestamo_equipo->getTableutilidad()->fetchAll(\PDO::FETCH_ASSOC);
            $response = $this->prestamo_equipo->create_prestamo();
            if($data){
                
               if($response){
                    $this->prestamo_equipo->setId($response);
                    foreach($data as $row){
                        $this->prestamo_equipo->setEquipoId($row['id_equipo']);
                        $result = $this->prestamo_equipo->create_prestamo_equipo();
                        $this->prestamo_equipo->delete_tmp_equipo();
                    }
                    if($result){
                        
                        Redirect::redirect('prestamos/create?response=true');
                    }
                }else{

                }
                    
            }
            if($utilidad){
                if($response){
                    $this->prestamo_equipo->setId($response);
                    foreach($utilidad as $row){
                        $this->prestamo_equipo->setUtilidadId($row['id_utilidad']);
                        $this->prestamo_equipo->setCantidad($row['cantidad']);
                        $result = $this->prestamo_equipo->create_prestamo_utilidad();
                        $this->prestamo_equipo->delete_tmp_utilidad();
                    }
                    if($result){
                        
                        Redirect::redirect('prestamos/create?response=true');
                    }
                }else{

                }
            }
            if(empty($utilidad) && empty($data)){
                Redirect::redirect('prestamos/create?response=false');
            }
        }
    }

    public function ReportePrestamo($id = '')
    {

        $this->prestamo_equipo->setId($this->prestamo_equipo->clean_string($id));
        $datos_equipos = $this->prestamo_equipo->get_prestado_activo()->fetchAll(\PDO::FETCH_ASSOC);
        $datos_utilidad = $this->prestamo_equipo->get_prestado_activo2()->fetchAll(\PDO::FETCH_ASSOC);
        require_once '../controlmaster/dompdf/autoload.inc.php';

        ob_start();
        include 'Public/view/prestamos/pdf.prestamo.php';

        //$html = file_get_contents(URL. 'Public/view/estudiantes/pdf.php');
        $html = ob_get_clean();
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $pdf = new Dompdf($options);
        
 
        // Instanciamos un objeto de la clase DOMPDF.
      
        // Definimos el tamaño y orientación del papel que queremos.
        $pdf->setPaper("A4", "landscape");
        //$pdf->set_paper(array(0,0,104,250));
        
        // Cargamos el contenido HTML.
        $pdf->loadHtml($html);
        
        // Renderizamos el documento PDF.
        $pdf->render();
        
        // Enviamos el fichero PDF al navegador.
        $pdf->stream('reporte_presstamos.pdf', array("Attachment" => 0));
    
    }
}
