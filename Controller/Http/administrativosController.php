<?php


namespace Controller\Http;


use Controller\Redirecter\Redirect;
use Database\Models\Administrativo;
use Database\Models\Dependencia;
use Dompdf\Dompdf;
use Dompdf\Options;
use PDO;
use Helpers;
use helpers\FPDF;

class administrativosController extends Controller
{

    private $dependencias;
    private $adminstrativos;
    public function __construct()
    {
        parent::__construct();
        $this->dependencias = new Dependencia();
        $this->adminstrativos = new Administrativo();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        $result = $this->adminstrativos->get_data_administrativo();
        return $this->view('administrativos/index', $result);
    }

    public function create()
    {
        return $this->view('administrativos/create', $this->get_allDependence());
    }

    public function insert_administrativo(){

        if(isset($_POST['idcedula'])){
            $this->adminstrativos->setCedula($this->adminstrativos->clean_string($_POST['idcedula']));
            $this->adminstrativos->setPnombre($this->adminstrativos->clean_string($_POST['idnombre1']));
            $this->adminstrativos->setSnombre($this->adminstrativos->clean_string($_POST['idnombre2']));
            $this->adminstrativos->setPapellido($this->adminstrativos->clean_string($_POST['idapellido1']));
            $this->adminstrativos->setSapellido($this->adminstrativos->clean_string($_POST['idapellido2']));
            $this->adminstrativos->setTelefono($this->adminstrativos->clean_string($_POST['idtelefono']));
            $this->adminstrativos->setCorreo($this->adminstrativos->clean_string($_POST['idcorreo']));
            $this->adminstrativos->setDireccion($this->adminstrativos->clean_string($_POST['iddireccion']));
            $this->adminstrativos->setEstado($this->adminstrativos->clean_string("1"));
            $this->adminstrativos->setDependencia($this->adminstrativos->clean_string($_POST['condiciones']));


            $response = $this->adminstrativos->create();

            if($response==true){
                Redirect::redirect('administrativos/create?response=true');
            }else{
                Redirect::redirect('administrativos/create?response=false');
            }
        }
        
    }

    public function edit_administrativo(){

        if(isset($_POST['idcedulaedit']) && isset($_POST['id'])){
            $this->adminstrativos->setCedula($this->adminstrativos->clean_string($_POST['idcedulaedit']));
            $this->adminstrativos->setPnombre($this->adminstrativos->clean_string($_POST['idnombre1edit']));
            $this->adminstrativos->setSnombre($this->adminstrativos->clean_string($_POST['idnombre2edit']));
            $this->adminstrativos->setPapellido($this->adminstrativos->clean_string($_POST['idapellido1edit']));
            $this->adminstrativos->setSapellido($this->adminstrativos->clean_string($_POST['idapellido2edit']));
            $this->adminstrativos->setTelefono($this->adminstrativos->clean_string($_POST['idtelefonoedit']));
            $this->adminstrativos->setCorreo($this->adminstrativos->clean_string($_POST['idcorreoedit']));
            $this->adminstrativos->setDireccion($this->adminstrativos->clean_string($_POST['iddireccionedit']));
            $this->adminstrativos->setDependencia($this->adminstrativos->clean_string($_POST['condicionesedit']));
            $this->adminstrativos->setEstado($this->adminstrativos->clean_string($_POST['condiciones2']));
            $this->adminstrativos->setId($this->adminstrativos->clean_string($_POST['id']));
            $response = $this->adminstrativos->edit();

            if($response){
                Redirect::redirect('administrativos/editar/'.$_POST['id'].'?responsedit=true');
            }else{
                Redirect::redirect('administrativos/editar/'.$_POST['id'].'?responsedit=false');
            }
        }
    }

    private function get_allDependence(){
        $result = $this->dependencias->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'nombre_dependencia' => $row['nombre_dependencia'],
                'id' => $row['id']
            );
        }
        return $json;
    }

    public function editar($id = ''){
        $this->adminstrativos->setId($id);
        $response['administrativo'] = $this->adminstrativos->getForCedula()->fetch(\PDO::FETCH_ASSOC);
        $response['dependencia'] = $this->get_allDependence();
        return $this->view('administrativos/editar', $response);
    }

    public function show($id = ''){
        $this->adminstrativos->setId($id);
        $response['administrativo'] = $this->adminstrativos->getForCedula()->fetch(\PDO::FETCH_ASSOC);
        $response['dependencia'] = $this->get_allDependence();
        return $this->view('administrativos/show', $response);
    }

    public function delete($id = '')
    {
        $this->adminstrativos->setId($this->adminstrativos->clean_string($id));
        $this->adminstrativos->setEstado('0');
        $response = $this->adminstrativos->delete_administrivo();
        if($response){
            Redirect::redirect('administrativos?response=true');
        }else{
            Redirect::redirect('administrativos?response=false');
        }
    }

    public function get_all_administrativo(){
        $json = array();
        $result = $this->adminstrativos->get_data_administrativo();
        foreach($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'id' => $row['id'],
                'cedula' => $row['cedula'],
                'nombre_completo' => $row['nombre'],
                'telefono' => $row['telefono'],
                'dependencia' => $row['nombre_dependencia'],
            );
        }

        echo json_encode($json);
        die();
    }

    
    public function get_search_administrativo()
    {

        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->adminstrativos->setPnombre($this->adminstrativos->clean_string($search));
            $result = $this->adminstrativos->get_by_search();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'cedula' => $row['cedula'],
                    'nombre_completo' => $row['nombre'],
                    'telefono' => $row['telefono'],
                    'dependencia' => $row['nombre_dependencia'],
                );
            }
            echo json_encode($json);
            die();

        }

    }


    public function ReporteAdministrativos()
    {

        $datos = $this->adminstrativos->get_data_administrativo()->fetchAll(\PDO::FETCH_ASSOC);
        require_once '../controlmaster/dompdf/autoload.inc.php';

        ob_start();
        include 'Public/view/administrativos/pdf.php';

        //$html = file_get_contents(URL. 'Public/view/estudiantes/pdf.php');
        $html = ob_get_clean();
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $pdf = new Dompdf($options);
        
 
        // Instanciamos un objeto de la clase DOMPDF.
      
        // Definimos el tamaño y orientación del papel que queremos.
        $pdf->setPaper("A4", "portrait");
        //$pdf->set_paper(array(0,0,104,250));
        
        // Cargamos el contenido HTML.
        $pdf->loadHtml($html);
        
        // Renderizamos el documento PDF.
        $pdf->render();
        
        // Enviamos el fichero PDF al navegador.
        $pdf->stream('reporte_administrativo.pdf', array("Attachment" => 0));
    
    }
    
}