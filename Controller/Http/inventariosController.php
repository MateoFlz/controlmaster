<?php

namespace Controller\Http;

use Controller\Http\Controller;
use Controller\Redirecter\Redirect;
use Database\Models\Etiquetas;
use Database\Models\Equipos;
use Database\Models\Aulas;
use Database\Models\Utilidades;
use Dompdf\Dompdf;
use Dompdf\Options;

class inventariosController extends Controller
{

    private $equipos;
    private $etiqueta;
    private $utilidades;
    private $aula;

    public function __construct()
    {
        parent::__construct();
        $this->etiqueta = new Etiquetas();
        $this->equipos = new Equipos();
        $this->aula =  new Aulas();
        $this->utilidades =  new Utilidades();
        if ($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))) {
            Redirect::redirect('index?session=false');
        }
    }


    public function index()
    {

        return $this->view('inventarios/index', $this->etiqueta->getAll()->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function equipo($name = '')
    {
        $this->equipos->setDescripcion($this->equipos->clean_string($name));
        $data = array(
            'utilidades' => $this->utilidades->getUtilidaByEtiqueta()->fetchAll(\PDO::FETCH_ASSOC),
            'equipos' =>  $this->equipos->getEquipoByEtiqueta()->fetchAll(\PDO::FETCH_ASSOC)
        ); 
 
        
        return $this->view('inventarios/equipo', $data);
    }

    public function equipos()
    {
        $data = array(
            'etiquetas' => $this->etiqueta->getAll()->fetchAll(\PDO::FETCH_ASSOC),
            'ubicacion' => $this->aula->getAll()->fetchAll(\PDO::FETCH_ASSOC),
            'equipos' => $this->equipos->getFull()->fetchAll(\PDO::FETCH_ASSOC)
        );
        return $this->view('inventarios/equipos', $data);
    }

    public function utilidades()
    {
        $data = array(
            'etiquetas' => $this->etiqueta->getAll()->fetchAll(\PDO::FETCH_ASSOC),
            'ubicacion' => $this->aula->getAll()->fetchAll(\PDO::FETCH_ASSOC),
            'utilidades' => $this->utilidades->getFull()->fetchAll(\PDO::FETCH_ASSOC)
        );
        return $this->view('inventarios/utilidades', $data);
    }

    public function insert()
    {
      
        if (isset($_POST['idserial'])) {

            $this->equipos->setSerial($this->equipos->clean_string($_POST['idserial']));
            $this->equipos->setEtiqueta($this->equipos->clean_string($_POST['tipo']));
            $this->equipos->setMarca($this->equipos->clean_string($_POST['idmarca']));
            $this->equipos->setModelo($this->equipos->clean_string($_POST['idmodelo']));
            $this->equipos->setDescripcion($this->equipos->clean_string($_POST['iddescripcion']));
            $this->equipos->setUbicacion($this->equipos->clean_string($_POST['ubicacion']));
            $this->equipos->setEstado($this->equipos->clean_string($_POST['estado']));
            $this->equipos->setActivo($this->equipos->clean_string('1'));

            $response =  $this->equipos->create();

            if ($response) {
                Redirect::redirect('inventarios/equipos?response=true');
            } else {
                Redirect::redirect('inventarios/equipos?response=false');
            }
        }
    }

    public function insert_utilidad()
    {
      
        if (isset($_POST['tipo'])) {

            $this->utilidades->setEtiqueta($this->utilidades->clean_string($_POST['tipo']));
            $this->utilidades->setMarca($this->utilidades->clean_string($_POST['idmarca']));
            $this->utilidades->setDescripcion($this->utilidades->clean_string($_POST['iddescripcion']));
            $this->utilidades->setUbicacion($this->utilidades->clean_string($_POST['ubicacion']));
            $this->utilidades->setCantidad($this->utilidades->clean_string($_POST['cantidad']));
            $this->utilidades->setEstado($this->utilidades->clean_string($_POST['estado']));
            $this->utilidades->setActivo($this->utilidades->clean_string('1'));

            $response =  $this->utilidades->create();

            if ($response) {
                Redirect::redirect('inventarios/utilidades?response=true');
            } else {
                Redirect::redirect('inventarios/utilidades?response=false');
            }
        }
    }

    public function editar($id = '')
    {
        if(isset($id)){
            $this->equipos->setId($this->equipos->clean_string($id));
            $data = array(
                'etiquetas' => $this->etiqueta->getAll()->fetchAll(\PDO::FETCH_ASSOC),
                'ubicacion' => $this->aula->getAll()->fetchAll(\PDO::FETCH_ASSOC),
                'equipos' => $this->equipos->getFull()->fetchAll(\PDO::FETCH_ASSOC),
                'equipo' => $this->equipos->getEquipoById()
            );
            return $this->view('inventarios/equipos', $data);
        }
    }

    public function editarutl($id = '')
    {
        if(isset($id)){
            $this->utilidades->setId($this->utilidades->clean_string($id));
            $data = array(
                'etiquetas' => $this->etiqueta->getAll()->fetchAll(\PDO::FETCH_ASSOC),
                'ubicacion' => $this->aula->getAll()->fetchAll(\PDO::FETCH_ASSOC),
                'utilidades' => $this->utilidades->getFull()->fetchAll(\PDO::FETCH_ASSOC),
                'utilidad' => $this->utilidades->getUtilidaById()
            );
            return $this->view('inventarios/utilidades', $data);
        }
    }

    public function update()
    {
      
        if (isset($_POST['idserial']) && isset($_POST['id'])) {
            $this->equipos->setId($this->equipos->clean_string($_POST['id']));
            $this->equipos->setSerial($this->equipos->clean_string($_POST['idserial']));
            $this->equipos->setEtiqueta($this->equipos->clean_string($_POST['tipo']));
            $this->equipos->setMarca($this->equipos->clean_string($_POST['idmarca']));
            $this->equipos->setModelo($this->equipos->clean_string($_POST['idmodelo']));
            $this->equipos->setDescripcion($this->equipos->clean_string($_POST['iddescripcion']));
            $this->equipos->setUbicacion($this->equipos->clean_string($_POST['ubicacion']));
            $this->equipos->setEstado($this->equipos->clean_string($_POST['estado']));
            $this->equipos->setActivo($this->equipos->clean_string($_POST['activo']));

            $response =  $this->equipos->update();

            if ($response) {
                Redirect::redirect('inventarios/equipos?responsedit=true');
            } else {
                Redirect::redirect('inventarios/equipos?responsedit=false');
            }
        }
    }
    public function updateutl()
    {
      
        if (isset($_POST['tipo']) && isset($_POST['id'])) {
            $this->utilidades->setId($this->utilidades->clean_string($_POST['id']));
            $this->utilidades->setEtiqueta($this->utilidades->clean_string($_POST['tipo']));
            $this->utilidades->setMarca($this->utilidades->clean_string($_POST['idmarca']));
            $this->utilidades->setDescripcion($this->utilidades->clean_string($_POST['iddescripcion']));
            $this->utilidades->setUbicacion($this->utilidades->clean_string($_POST['ubicacion']));
            $this->utilidades->setCantidad($this->utilidades->clean_string($_POST['cantidad']));
            $this->utilidades->setEstado($this->utilidades->clean_string($_POST['estado']));
            $this->utilidades->setActivo($this->utilidades->clean_string($_POST['activo']));

            $response =  $this->utilidades->update();

            if ($response) {
                Redirect::redirect('inventarios/utilidades?responsedit=true');
            } else {
                echo $response;
                //Redirect::redirect('inventarios/utilidades?responsedit=false');
            }
        }
    }

    public function delete($id = '')
    {

        $this->equipos->setId( $this->equipos->clean_string($id));
        $this->equipos->setActivo('0');
        $response = $this->equipos->delete();
        if ($response) {
            Redirect::redirect('inventarios/equipos?delete=true');
        } else {
            Redirect::redirect('inventarios/equipos?delete=false');
        }
    }

    public function get_sedes()
    {
        $search = $_POST['search'];
        $json = array();

        if(!empty($search)){
            $this->aula->setSede($this->aula->clean_string($search));
            $result = $this->aula->get_aulas_sede();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                );
            }

            echo json_encode($json);
            die();
        }
    }


    public function ReporteEquipos()
    {

        $datos = $this->equipos->getFull()->fetchAll(\PDO::FETCH_ASSOC);
        require_once '../controlmaster/dompdf/autoload.inc.php';

        ob_start();
        include 'Public/view/inventarios/siret/pdf.equipo.php';

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
        $pdf->stream('reporte_equipos.pdf', array("Attachment" => 0));
    
    }

    public function ReporteUtilidad()
    {

        $datos = $this->utilidades->getFull()->fetchAll(\PDO::FETCH_ASSOC);
        require_once '../controlmaster/dompdf/autoload.inc.php';

        ob_start();
        include 'Public/view/inventarios/siret/pdf.utilidad.php';

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
        $pdf->stream('reporte_utilidades.pdf', array("Attachment" => 0));
    
    }

}