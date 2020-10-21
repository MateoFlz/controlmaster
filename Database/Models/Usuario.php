<?php
namespace Database\Models;

use Database\abstractModel;
use Exception;

class Usuario extends abstractModel{


    protected $id;
    protected $cedula;
    protected $pnombre;
    protected $snombre;
    protected $papellido;
    protected $sapellido;
    protected $telefono;
    protected $correo;
    protected $direccion;
    protected $estado;


    public function __construct()
    {
        parent::__construct();
    }

    public function __construct_two($table)
    {
        parent::__construct();
        $this->Table = $table;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }


    /**
     * @return mixed
     */
    public function getCedula()
    {
        return $this->cedula;
    }

    /**
     * @param mixed $idcedula
     */
    public function setCedula($cedula): void
    {
        $this->cedula = $cedula;
    }


    /**
     * @return mixed
     */
    public function getPnombre()
    {
        return $this->pnombre;
    }

    /**
     * @param mixed $pnombre
     */
    public function setPnombre($pnombre): void
    {
        $this->pnombre = $pnombre;
    }

    /**
     * @return mixed
     */
    public function getSnombre()
    {
        return $this->snombre;
    }

    /**
     * @param mixed $snombre
     */
    public function setSnombre($snombre): void
    {
        $this->snombre = $snombre;
    }

    /**
     * @return mixed
     */
    public function getPapellido()
    {
        return $this->papellido;
    }

    /**
     * @param mixed $papellido
     */
    public function setPapellido($papellido): void
    {
        $this->papellido = $papellido;
    }

    /**
     * @return mixed
     */
    public function getSapellido()
    {
        return $this->sapellido;
    }

    /**
     * @param mixed $sapellido
     */
    public function setSapellido($sapellido): void
    {
        $this->sapellido = $sapellido;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }
    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }


    public function getById()
    {
        // TODO: Implement getById() method.
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM " . $this->Table . ";";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function getForCedula(){
        $this->getInstance();
        $sql = "SELECT * FROM usuarios WHERE id = ".$this->getId()."";
        $result = $this->return_query($sql);
        return $result;

    }

    public function getEspecifico()
    {
        $query = "SELECT a.cedula, CONCAT(a.pnombre, ' ', a.snombre,' ', a.papellido,' ', a.sapellido) AS nombre,
                   a.telefono FROM usuarios a WHERE a.Estado = 1";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }

    public function getEspecifico2()
    {
        $query = "SELECT a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre FROM  usuarios a WHERE a.Estado = 1 AND a.cedula LIKE '%". $this->pnombre ."%' OR
        CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) LIKE '%". $this->pnombre ."%'";
        $result = $this->return_query($query);
        $this->closeConnection();
        return $result;
    }

    public function edit(){

        try{
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE usuarios SET pnombre = ?, snombre = ?, papellido = ?, sapellido = ?,
                                                telefono = ?, correo = ?, direccion = ? WHERE cedula = ?");
            
            $query->bindParam(1, $this->getPnombre());
            $query->bindParam(2, $this->getSnombre());
            $query->bindParam(3, $this->getPapellido());
            $query->bindParam(4, $this->getSapellido());
            $query->bindParam(5, $this->getTelefono());
            $query->bindParam(6, $this->getCorreo());
            $query->bindParam(7, $this->getDireccion());
            $query->bindParam(8, $this->getCedula());
            $result = $query->execute();
            return $result;
            
        }catch(\Exception $e){
            echo "Fallo: " . $e->getMessage();
            return $e->getMessage();
        }
    }


}