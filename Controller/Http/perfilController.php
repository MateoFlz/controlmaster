<?php
namespace Controller\Http;

use Controller\Http\Controller;
use Controller\Redirecter\Redirect;
use Database\Models\Usuario;
use Database\Models\Usuarios;

class perfilController extends Controller{


    private $usuario;
    private $usuarios;

    public function __construct()
    {
        parent::__construct();
        $this->usuario = new Usuario();
        $this->usuarios = new Usuarios();
        if($this->session->getStatus() === PHP_SESSION_NONE || empty($this->session->get('name'))){
            Redirect::redirect('index?session=false');
        }
    }


    public function index(){
        $this->usuario->setId($this->session->getAll()['id']);
        $response = $this->usuario->getForCedula();
        return $this->view('perfil/index', $response->fetchAll(\PDO::FETCH_ASSOC));
    }


    // METODOS PARA TRAER POR ID PARA EDITAR PROGRAMA O DEPENDENCIA

    public function editar(){
        
        if(isset($_POST['iddcedula'])){
            $this->usuario->setCedula($this->usuario->clean_string($_POST['iddcedula']));
            $this->usuario->setPnombre($this->usuario->clean_string($_POST['iddnombre1']));
            $this->usuario->setSnombre($this->usuario->clean_string($_POST['iddnombre2']));
            $this->usuario->setPapellido($this->usuario->clean_string($_POST['iddapellido1']));
            $this->usuario->setSapellido($this->usuario->clean_string($_POST['iddapellido2']));
            $this->usuario->setTelefono($this->usuario->clean_string($_POST['idtelefono']));
            $this->usuario->setCorreo($this->usuario->clean_string($_POST['iddcorreo']));
            $this->usuario->setDireccion($this->usuario->clean_string($_POST['iddireccion1']));
           
            $response = $this->usuario->edit();

            if($response){
                Redirect::redirect('perfil?responsedit=true');
            }else{
                Redirect::redirect('perfil?responsedit=false');
            }
        }
    }

    public function edit_password(){

        if(isset($_POST['actual_contraseña']) && isset($_POST['nueva_contraseña'])){
    
            $this->usuarios->setUsuario($this->session->getAll()['id']);
            $this->usuarios->setPassword(md5($this->usuarios->clean_string($_POST['nueva_contraseña']) . '$%2'));
            $response = $this->usuarios->changepassword();
            if($response){
                Redirect::redirect('perfil?responspass=true');
            }else{
                Redirect::redirect('perfil?responspass=false');
            }
        }
    }



    public function validatePassword(){
        if(isset($_POST['actual_contraseña'])){
            $this->usuarios->setPassword(md5($this->usuarios->clean_string($_POST['actual_contraseña'])));
            $response = $this->usuarios->get_forpassword();
            if($response){
                echo true;
            }else{
                echo false;
            }
            die();
        }
    }
    
}