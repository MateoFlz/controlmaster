<?php


namespace Database\Models;


use Database\abstractModel;

class Loggback extends abstractModel

{
    private $id;
    private $detalles;
    private $fecha;
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
    public function setDestalles($detalles): void
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


    public function create()
    {
        try {
            
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO loggback VALUES (null,?,?,?)");
            $query->bindParam(1, $this->getDestalles());
            $query->bindParam(2, $this->getFecha());
            $query->bindParam(3, $this->getIdu());
            $result = $query->execute();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    
}