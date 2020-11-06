<?php


namespace Controller\Http;


use Controller\Redirecter\Redirect;
use Database\Models\Estudiante;
use Database\Models\Programa;
use Dompdf\Dompdf;
use Dompdf\Options;
use Helpers;
use helpers\FPDF;
use PDO;

class estudiantesController extends Controller
{
    private $program;
    private $estudiante;
    public function __construct()
    {
        $this->program = new Programa();
        $this->estudiante = new Estudiante();

        parent::__construct();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        $data = $this->estudiante->getAll()->fetchAll(\PDO::FETCH_ASSOC);
        return $this->view('estudiantes/index', $data);
    }

    public function getProgram()
    {
        $data = $this->program->getAll();
        return $data;
        //return $this->view('estudiantes/index');
    }

    public function create(){
        return $this->view('estudiantes/create');
    }

    public function insert_student(){
        if(isset($_POST['idcedula'])){
            $this->estudiante->setCedula($this->estudiante->clean_string($_POST['idcedula']));
            $this->estudiante->setPnombre($this->estudiante->clean_string($_POST['idnombre1']));
            $this->estudiante->setSnombre($this->estudiante->clean_string($_POST['idnombre2']));
            $this->estudiante->setPapellido($this->estudiante->clean_string($_POST['idapellido1']));
            $this->estudiante->setSapellido($this->estudiante->clean_string($_POST['idapellido2']));
            $this->estudiante->setTelefono($this->estudiante->clean_string($_POST['idtelefono']));
            $this->estudiante->setCorreo($this->estudiante->clean_string($_POST['idCorreo']));
            $this->estudiante->setDireccion($this->estudiante->clean_string($_POST['idDireccion']));
            $this->estudiante->setEstado($this->estudiante->clean_string("1"));
            $this->estudiante->setPrograma($this->estudiante->clean_string($_POST['condiciones2']));
            $this->estudiante->setSemestre($this->estudiante->clean_string($_POST['condiciones']));

            $response = $this->estudiante->create();

            if($response){
                Redirect::redirect('estudiantes/create?response=true');
            }else{
                Redirect::redirect('estudiantes/create?response=false');
            }
        }

    }


    public function edit_student(){

        if(isset($_POST['idcedulaedit']) && isset($_POST['id'])){
            $this->estudiante->setId($this->estudiante->clean_string($_POST['id']));
            $this->estudiante->setCedula($this->estudiante->clean_string($_POST['idcedulaedit']));
            $this->estudiante->setPnombre($this->estudiante->clean_string($_POST['idnombre1edit']));
            $this->estudiante->setSnombre($this->estudiante->clean_string($_POST['idnombre2edit']));
            $this->estudiante->setPapellido($this->estudiante->clean_string($_POST['idapellido1edit']));
            $this->estudiante->setSapellido($this->estudiante->clean_string($_POST['idapellido2edit']));
            $this->estudiante->setTelefono($this->estudiante->clean_string($_POST['idtelefonoedit']));
            $this->estudiante->setCorreo($this->estudiante->clean_string($_POST['idCorreoedit']));
            $this->estudiante->setDireccion($this->estudiante->clean_string($_POST['idDireccionedit']));
            $this->estudiante->setEstado($this->estudiante->clean_string($_POST['condiciones2edit']));
            $this->estudiante->setPrograma($this->estudiante->clean_string($_POST['condiciones3edit']));
            $this->estudiante->setSemestre($this->estudiante->clean_string($_POST['condiciones1edit']));

            $response = $this->estudiante->edit();


            if($response){
                Redirect::redirect('estudiantes/editar/'.$_POST['id'].'?responsedit=true');
            }else{
                Redirect::redirect('estudiantes/editar/'.$_POST['id'].'?responsedit=false');
            }
        }
    }


    public function delete($id = ''){
            $this->estudiante->setId($this->estudiante->clean_string($id));
            $this->estudiante->setEstado('0');
            $response = $this->estudiante->delete();
            if($response){
                Redirect::redirect('estudiantes?response=true');
            }else{
                Redirect::redirect('estudiantes?response=false');
            }
    }

    public function editar($id = ''){
        $this->estudiante->setId($id);
        $response = $this->estudiante->getForCedula();
        return $this->view('estudiantes/editar', $response);
    }

    public function show($id = ''){
        $this->estudiante->setId($id);
        $response = $this->estudiante->getForCedula();
        return $this->view('estudiantes/show', $response);
    }

    public function get_student(){
        $json = array();
        $result = $this->estudiante->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'id' => $row['id'],
                'cedula' => $row['cedula'],
                'nombre' => $row['nombre'],
                'nombreprograma' => $row['nombreprograma'],
                'semestre' => $row['semestre'],
                'telefono' => $row['telefono'],
            );
        }

        echo json_encode($json);
        die();
    }

    public function get_searchUsuario(){
        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->estudiante->setPnombre($this->estudiante->clean_string($search));
            $result = $this->estudiante->getBySearch();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'cedula' => $row['cedula'],
                    'nombre' => $row['nombre'],
                    'nombreprograma' => $row['nombreprograma'],
                    'semestre' => $row['semestre'],
                    'telefono' => $row['telefono']
                );
            }
            echo json_encode($json);
            die();

        }
    }

    

    public function ReporteEstudiantes()
    {

        $datos = $this->estudiante->getAll()->fetchAll(\PDO::FETCH_ASSOC);
        require_once '../controlmaster/dompdf/autoload.inc.php';

        ob_start();
        include 'Public/view/estudiantes/pdf.php';

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
        $pdf->stream('reporte_estudiantes.pdf', array("Attachment" => 0));
    
    }
}