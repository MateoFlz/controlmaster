<?php


namespace Database\Models;


use Database\abstractModel;

class Loggback extends abstractModel

{
    private $id;
    private $detalles;
    private $fecha;
    private $activo;
    private $idu;
   

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'loggback';
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
    public function getDetalles()
    {
        return $this->detalles;
    }

     /**
     * @param mixed $programa
     */
    public function setDetalles($detalles): void
    {
        $this->detalles = $detalles;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

     /**
     * @param mixed $state
     */
    public function setFecha($fecha): void
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getIdu()
    {
        return $this->idu;
    }

    /**
     * @param mixed $id
     */
    public function setIdu($idu): void
    {
        $this->idu = $idu;
    }

       /**
     * @return mixed
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * @param mixed $id
     */
    public function setActivo($activo): void
    {
        $this->activo = $activo;
    }


    public function getById()
    {
        // TODO: Implement getById() method.
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM " . $this->Table . " WHERE activo = 1;";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function get_detalle()
    {
        $this->query = "SELECT a.*, CONCAT(u.pnombre, u.snombre,' ', u.papellido,' ', u.sapellido) AS nombre
         FROM loggback a INNER JOIN usuarios u ON u.id = a.id_usuario WHERE activo = 1;";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function create()
    {
        try {
            
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO loggback VALUES (null,?,?,?,?)");
            $query->bindParam(1, $this->detalles);
            $query->bindParam(2, $this->fecha);
            $query->bindParam(3, $this->idu);
            $query->bindParam(4, $this->activo);
            $result = $query->execute();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function delete()
    {
        try {
            
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE loggback SET activo = ? WHERE id = ?");
            $query->bindParam(1, $this->activo);
            $query->bindParam(2, $this->id);
            $result = $query->execute();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    
}