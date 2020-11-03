<?php

namespace Database\Models;

use Database\abstractModel;
use Database\Models\Usuario;

class Usuarios extends Usuario {


    private $ids;
    private $usuario;
    private $password;
    private $state;
    private $tipo;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'usuarios';
    }

    /**
     * @return mixed
     */
    public function getIds()
    {
        return $this->ids;
    }

    /**
     * @param mixed $id
     */
    public function setIds($ids): void
    {
        $this->ids = $ids;
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

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
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

    public function create()
    {
        try {
            $this->getInstance();
            $this->Connection->beginTransaction();

            $query = $this->Connection->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->getCedula());
            $query->bindParam(2, $this->getPnombre());
            $query->bindParam(3, $this->getSnombre());
            $query->bindParam(4, $this->getPapellido());
            $query->bindParam(5, $this->getSapellido());
            $query->bindParam(6, $this->getTelefono());
            $query->bindParam(7, $this->getCorreo());
            $query->bindParam(8, $this->getDireccion());
            $query->bindParam(9, $this->getEstado());
            $query->execute();

            $id = $this->Connection->lastInsertId();

            $query = $this->Connection->prepare("INSERT INTO acceso VALUES (null,?,?,?,?)");
            $query->bindParam(1, $id);
            $query->bindParam(2, $this->getPassword());
            $query->bindParam(3, $this->getState());
            $query->bindParam(4, $this->getTipo());
            $result = $query->execute();
            $this->Connection->commit();
            return $result;


        }catch (\Exception $e){
            $this->Connection->rollBack();
            echo "Fallo: " . $e->getMessage();
            return false;
        }


    }

    public function edit(){
        try {
            $this->getInstance();
            $this->Connection->beginTransaction();

            $query = $this->Connection->prepare("UPDATE usuarios SET pnombre = ?, snombre = ?, papellido = ?, sapellido = ?,
                                                telefono = ?, correo = ?, direccion = ?, estado = ? WHERE id = ?");
            $query->bindParam(1, $this->getPnombre());
            $query->bindParam(2, $this->getSnombre());
            $query->bindParam(3, $this->getPapellido());
            $query->bindParam(4, $this->getSapellido());
            $query->bindParam(5, $this->getTelefono());
            $query->bindParam(6, $this->getCorreo());
            $query->bindParam(7, $this->getDireccion());
            $query->bindParam(8, $this->getEstado());
            $query->bindParam(9, $this->getId());
            $query->execute();

            $query = $this->Connection->prepare("UPDATE acceso SET contraseña = ?, estado = ?, tipo = ? WHERE usuarios_id = ?");
            $query->bindParam(1, $this->getPassword());
            $query->bindParam(2, $this->getState());
            $query->bindParam(3, $this->getTipo());
            $query->bindParam(4, $this->getId());
            $result = $query->execute();
            $this->Connection->commit();
            return $result;


        }catch (\Exception $e){
            $this->Connection->rollBack();
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }


    public function getById()
    {
        $query = "SELECT a.*, cc.id AS ids, cc.tipo, cc.estado AS estadoc, cc.contraseña FROM usuarios a
         INNER JOIN acceso cc ON a.id = cc.usuarios_id WHERE a.id = $this->id;";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }

    public function getAll()
    {
        $query = "SELECT a.id, a.cedula, CONCAT(a.pnombre, a.snombre,' ', a.papellido,' ', a.sapellido) AS nombre,
                  cc.tipo, a.telefono, a.correo, cc.id AS ids FROM usuarios a INNER JOIN acceso cc ON a.id = cc.usuarios_id WHERE a.estado = 1 AND cc.estado = 1;";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }

    public function getforSearch()
    {
        $query = "SELECT a.id, a.cedula, CONCAT(a.pnombre, a.snombre,' ', a.papellido,' ', a.sapellido) AS nombre,
                  cc.tipo, a.telefono, a.correo FROM usuarios a INNER JOIN acceso cc ON a.id = cc.usuarios_id WHERE a.cedula LIKE '%". $this->usuario ."%' OR
	              CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) LIKE '%". $this->usuario ."%'";
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


    public function delete_administradores()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE acceso SET estado = ? WHERE usuarios_id = ?");
        $query->bindParam(1, $this->getState());
        $query->bindParam(2, $this->getId());
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function getPermisos()
    {
        $query = "SELECT a.id, p.id AS idp FROM acceso a INNER JOIN acceso_permiso ap ON ap.id_acceso = a.id
        JOIN permisos p ON p.id = ap.id_permiso WHERE ap.estado = 1 AND p.estado = 1 AND a.id = $this->ids";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }

    public function getPermisosExiste()
    {
        $query = "SELECT COUNT(*) FROM acceso_permiso WHERE id_acceso = $this->ids";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }
    



}