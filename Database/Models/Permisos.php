<?php


namespace Database\Models;


use Database\abstractModel;

class Permisos extends abstractModel

{
    private $id;
    private $descripcion;
    private $state;
    private $idp;
    private $ida;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'permisos';
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

     /**
     * @param mixed $programa
     */
    public function setDescripcion($descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

     /**
     * @param mixed $state
     */
    public function setState($state): void
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getIdp()
    {
        return $this->idp;
    }

    /**
     * @param mixed $id
     */
    public function setIdp($idp): void
    {
        $this->idp = $idp;
    }

    /**
     * @return mixed
     */
    public function getIda()
    {
        return $this->ida;
    }

    /**
     * @param mixed $id
     */
    public function setIda($ida): void
    {
        $this->ida = $ida;
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
            $query = $this->Connection->prepare("INSERT INTO acceso_permiso VALUES (null,?,?,?)");
            $query->bindParam(1, $this->getIdp());
            $query->bindParam(2, $this->getIda());
            $query->bindParam(3, $this->getState());
            $result = $query->execute();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function update()
    {
        try {
            
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE acceso_permiso set estado = ? WHERE id_permiso = ? AND id_acceso = ?");
            $query->bindParam(1, $this->state);
            $query->bindParam(2, $this->idp);
            $query->bindParam(3, $this->ida);
            $result = $query->execute();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function getPermisos()
    { 
        $this->query = "SELECT *, ap.estado as activo FROM acceso_permiso ap INNER JOIN permisos p 
        ON p.id = ap.id_permiso WHERE ap.id_acceso = $this->ida";
        $data = $this->return_query($this->query);
        return  $data;
    }
}