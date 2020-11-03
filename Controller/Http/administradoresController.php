<?php
namespace Controller\Http;
use Controller\Http\Controller as Controller;
use Controller\Redirecter\Redirect;
use Core\Sessions;
use Database\Models\Usuarios;
use Database\Models\Usuario;
use Database\Models\Permisos;

class administradoresController extends Controller{

    private $usuarios;
    private $permisos;
    private $admin;
    private $pass;
    private $ids = '';

    public function __construct()
    {

        parent::__construct();
        $this->usuarios = new Usuarios();
        $this->permisos = new Permisos();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }

    public function index()
    {
        return $this->view('administradores/index', $this->usuarios->getAll()->fetchAll(\PDO::FETCH_ASSOC));
    }

    public function admin($id = '')
    {   
        $this->usuarios->setIds($id);
        $data = array(
            'idw' => $id,
            'permiso' => $this->permisos->getAll()->fetchAll(\PDO::FETCH_ASSOC),
            'activos' => $this->usuarios->getPermisos()->fetchAll(\PDO::FETCH_ASSOC),
            'existe' => $this->usuarios->getPermisosExiste()->fetchAll(\PDO::FETCH_NUM)
        );
        return $this->view('administradores/admin', $data);
    }

    public function get_usuarios(){
        $result = $this->usuarios->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
                'id' => $row['id'],
                'cedula' => $row['cedula'],
                'nombre' => $row['nombre'],
                'tipo' => $row['tipo'],
                'telefono' => $row['telefono'],
                'correo' => $row['correo']
            );
        }

        echo json_encode($json);
        die();
    }


    public function get_adminstradores(){
        if(isset($_POST['search'])){
            $this->usuarios->setUsuario($this->usuarios->clean_string($_POST['search']));
            $result = $this->usuarios->getforSearch();
            foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
                $json[] = array(
                    'id' => $row['id'],
                    'cedula' => $row['cedula'],
                    'nombre' => $row['nombre'],
                    'tipo' => $row['tipo'],
                    'telefono' => $row['telefono'],
                    'correo' => $row['correo']
                );
            }
            echo json_encode($json);
            die();
        }
        
    }


    public function insert_administrador(){

        if(isset($_POST['idcedula'])){
            $this->usuarios->setCedula($this->usuarios->clean_string($_POST['idcedula']));
            $this->usuarios->setPnombre($this->usuarios->clean_string($_POST['idnombre1']));
            $this->usuarios->setSnombre($this->usuarios->clean_string($_POST['idnombre2']));
            $this->usuarios->setPapellido($this->usuarios->clean_string($_POST['idapellido1']));
            $this->usuarios->setSapellido($this->usuarios->clean_string($_POST['idapellido2']));
            $this->usuarios->setTelefono($this->usuarios->clean_string($_POST['idtelefono']));
            $this->usuarios->setCorreo($this->usuarios->clean_string($_POST['idcorreo']));
            $this->usuarios->setDireccion($this->usuarios->clean_string($_POST['iddireccion']));
            $this->usuarios->setEstado($this->usuarios->clean_string("1"));
            $this->usuarios->setDireccion($this->usuarios->clean_string($_POST['iddireccion']));
            $this->usuarios->setTipo($this->usuarios->clean_string($_POST['idcondiciones2']));
            $this->usuarios->setPassword(md5($this->usuarios->clean_string($_POST['idpasswords'])));
            $this->usuarios->setState($this->usuarios->clean_string("1"));

            $response = $this->usuarios->create();

            if($response==true){
                Redirect::redirect('administradores/create?response=true');
            }else{
                Redirect::redirect('administradores/create?response=false');
            }
        }
        
    }

    public function editar($id = ''){
        $this->usuarios->setId($id);
        $response = $this->usuarios->getById()->fetch(\PDO::FETCH_ASSOC);
        $this->pass = $response['contraseña'];
        return $this->view('administradores/editar', $response);
    }


    public function edit_administrador(){

        if(isset($_POST['idcedulaedit']) && isset($_POST['id'])){
            $this->usuarios->setId($this->usuarios->clean_string($_POST['id']));
            $this->usuarios->setCedula($this->usuarios->clean_string($_POST['idcedulaedit']));
            $this->usuarios->setPnombre($this->usuarios->clean_string($_POST['idnombre1edit']));
            $this->usuarios->setSnombre($this->usuarios->clean_string($_POST['idnombre2edit']));
            $this->usuarios->setPapellido($this->usuarios->clean_string($_POST['idapellido1edit']));
            $this->usuarios->setSapellido($this->usuarios->clean_string($_POST['idapellido2edit']));
            $this->usuarios->setTelefono($this->usuarios->clean_string($_POST['idtelefonoedit']));
            $this->usuarios->setCorreo($this->usuarios->clean_string($_POST['idcorreoedit']));
            $this->usuarios->setDireccion($this->usuarios->clean_string($_POST['iddireccionedit']));
            $this->usuarios->setEstado($this->usuarios->clean_string($_POST['condiciones2']));

            $this->usuarios->setTipo($this->usuarios->clean_string($_POST['idcondiciones3']));
            if(!empty($_POST['idpasswords'])){
                $this->usuarios->setPassword(md5($this->usuarios->clean_string($_POST['idpasswords'])));
            }else{
                $this->usuarios->setPassword($this->usuarios->clean_string($_POST['idpass']));
            }
            $this->usuarios->setState($this->usuarios->clean_string($_POST['condiciones4']));

            $response = $this->usuarios->edit();

            if($response){
                Redirect::redirect('administradores/editar/'.$_POST['id'].'?responsedit=true');
            }else{  
                Redirect::redirect('administradores/editar/'.$_POST['id'].'?responsedit=false');
            }
        }
    }

    public function delete($id = '')
    {
        $this->usuarios->setId($this->usuarios->clean_string($id));
        $this->usuarios->setState('0');
        $response = $this->usuarios->delete_administradores();
        if($response){
            Redirect::redirect('administradores?response=true');
        }else{
            Redirect::redirect('administradores?response=false');
        }
    }

    public function insert_permisos($ids = '')
    {
        $state = false;
        $this->permisos->setIda($this->usuarios->clean_string($ids));
        $permiso = $this->permisos->getAll()->fetchAll(\PDO::FETCH_ASSOC);

        foreach($permiso as $rowt){
            $this->permisos->setState('0');
            foreach($_POST['permisos'] as $row){

                if($row == $rowt['id']){
                    $this->permisos->setIdp($this->usuarios->clean_string($row));
                    $this->permisos->setState('1');

                }else{
                    $this->permisos->setIdp($this->usuarios->clean_string($rowt['id']));
                } 
                
             }
             $response = $this->permisos->create();
            
        }

        if($response){
            Redirect::redirect('administradores');
        }else{
            Redirect::redirect('administradores');
        }
        
    }

    public function update_permisos($ids = '')
    {

        $permiso = $this->permisos->getAll()->fetchAll(\PDO::FETCH_ASSOC);
        $this->permisos->setIda($this->permisos->clean_string($ids));
      if(isset($_POST['permisos'])){
       
        foreach($permiso as $row){
            $this->permisos->setState('0');
            foreach($_POST['permisos'] as $activo){
                if($activo == $row['id']){
                    $this->permisos->setIdp($this->permisos->clean_string($activo));
                    $this->permisos->setState('1'); 
                }else{
                    $this->permisos->setIdp($this->permisos->clean_string($row['id']));
                }
            }
            $response = $this->permisos->update();
            
        }
      }else{
        foreach ($permiso as $row) { 
            $this->permisos->setState('0');
            $this->permisos->setIdp($this->permisos->clean_string($row['id']));
            $response = $this->permisos->update();
            echo $response;
        }

      }

      if($response){
            Redirect::redirect('administradores');
        }else{
            Redirect::redirect('administradores');
        }

        
    }

}