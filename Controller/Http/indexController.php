<?php

namespace Controller\Http;

use Controller\Http\Controller as Controller;
use Controller\Redirecter\Redirect;
use Core\Sessions;
use Database\Models\Usuarios;




class indexController extends Controller{

    private $usuarios;

    public function __construct()
    {
        parent::__construct();
        $this->usuarios =  new Usuarios();
    }

    public function index()
    {
        return $this->view('index/index');
    }

    public function login(){

        if(isset($_POST)){

            $opciones = [
                'cost' => 16,
            ];
            
            $this->usuarios->setUsuario($_POST['login_email']);
            $this->usuarios->setPassword(md5($this->usuarios->clean_string($_POST['login_password']) . '$%2'));

            //echo $this->usuarios->getPassword();
            $result = $this->usuarios->actionLogin();

    
            $id = $result[0];
            $name = $result[1];

            if($result != null){
                $this->session->add('id', $id);
                $this->session->add('name', $name);
                Redirect::redirect('index?login=true');
            }else{
                Redirect::redirect('index?login=false');

            }
        }
    }

    public function logout(){
        $this->session->close();
        Redirect::redirect('index');
    }

    public function get_usuarios(){
        $result = $this->usuarios->getAll();
        foreach ($result->fetchAll(\PDO::FETCH_ASSOC) AS $row){
            $json[] = array(
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