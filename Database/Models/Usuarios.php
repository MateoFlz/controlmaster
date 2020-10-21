<?php

namespace Database\Models;

use Database\abstractModel;

class Usuarios extends abstractModel {


    private $usuario;
    private $password;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'usuarios';
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    public function actionLogin(){

        if(!empty($this->usuario) || !empty($this->password)){

            $this->getInstance();
            $query = $this->Connection->prepare('CALL login(?,?)');
            $query->bindParam(1, $this->usuario);
            $query->bindParam(2, $this->password);
            $query->execute();
            $this->closeConnection();
            return $query->fetch(\PDO::FETCH_NUM);

        }
    }


    public function getById()
    {
        // TODO: Implement getById() method.
    }

    public function getAll()
    {
        $query = "SELECT a.cedula, CONCAT(a.pnombre, a.snombre,' ', a.papellido,' ', a.sapellido) AS nombre,
                  cc.tipo, a.telefono, a.correo FROM usuarios a INNER JOIN acceso cc ON a.cedula = cc.usuarios_cedula;";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }

    

    public function get_forpassword(){
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT contraseña FROM acceso WHERE contraseña = ?");
        $query->bindParam(1, $this->password);
        $query->execute();
        return $query->fetch(\PDO::FETCH_ASSOC);
    }


    public function changepassword(){
        try{
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE acceso SET contraseña = ? WHERE usuarios_cedula = ?");
            $query->bindParam(1, $this->password);
            $query->bindParam(2, $this->usuario);
            $result = $query->execute();
            $this->closeConnection();
            return $result;

        }catch(\Exception $e){
            echo "Fallo: " . $e->getMessage();
            return $e->getMessage();
        }
    }







}