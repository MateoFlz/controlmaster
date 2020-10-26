<?php


namespace Database\Models;


use Database\abstractModel;

class Aulas extends abstractModel

{
    private $id;
    private $sede;
    private $nombre;
    private $estado;
    private $activo;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'aulas';
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

    public function getSede()
    {
        return $this->sede;
    }

    public function setSede($sede): void
    {
        $this->sede = $sede;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre): void
    {
        $this->nombre = $nombre;
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

    public function getActivo()
    {
        return $this->activo;
    }

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

    public function get_aula(){
        $this->getInstance();
        $sql = "SELECT * FROM aulas WHERE id LIKE '%" . $this->nombre . "%' OR nombre LIKE '%" . $this->nombre . "%';";
        $query = $this->Connection->query($sql);
        return $query;
    }

    public function add(){
        $this->getInstance();
        $query = $this->Connection->prepare("INSERT INTO aulas VALUES(null,?,?,?,?)");
        $query->bindParam(1, $this->sede);
        $query->bindParam(2, $this->nombre);
        $query->bindParam(3, $this->estado);
        $query->bindParam(4, $this->activo);
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function get_forId(){
        $this->getInstance();
        $id = $this->clean_string($this->id);
        $query = $this->Connection->prepare("SELECT * FROM aulas WHERE id = ?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query;
    }

    public function get_aulas_sede(){
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT * FROM aulas WHERE sede = ? AND activo = 1");
        $query->bindParam(1, $this->sede);
        $query->execute();
        return $query;
    }

    public function edit(){
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE aulas SET sede = ?, nombre = ?, estado = ?, activo = ? WHERE id = ?");
        $query->bindParam(1, $this->sede);
        $query->bindParam(2, $this->nombre);
        $query->bindParam(3, $this->estado);
        $query->bindParam(4, $this->activo);
        $query->bindParam(5, $this->id);
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function delete(){
        $this->getInstance();
        $id = $this->clean_string($this->id);
        $query = $this->Connection->prepare("DELETE FROM aulas WHERE id= ?");
        $query->bindParam(1, $id);
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

}


?>