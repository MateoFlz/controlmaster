<?php


namespace Database\Models;


use Database\abstractModel;

class Etiquetas extends abstractModel

{
    private $id;
    private $etiqueta;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'etiquetas';
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
    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

     /**
     * @param mixed $programa
     */
    public function setEtiqueta($etiqueta): void
    {
        $this->etiqueta = $etiqueta;
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

    public function get_etiqueta(){
        $this->getInstance();
        $sql = "SELECT * FROM etiquetas WHERE id LIKE '%" . $this->etiqueta . "%' OR descripcion LIKE '%" . $this->etiqueta . "%';";
        $query = $this->Connection->query($sql);
        return $query;
    }

    public function add(){
        $this->getInstance();
        $descripcion = $this->clean_string($this->etiqueta);
        $query = $this->Connection->prepare("INSERT INTO etiquetas VALUES(null, ?)");
        $query->bindParam(1, $descripcion);
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
        $query = $this->Connection->prepare("SELECT * FROM etiquetas WHERE id = ?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query;
    }

    public function edit(){
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE etiquetas SET descripcion = ? WHERE id = ?");
        $query->bindParam(1, $this->etiqueta);
        $query->bindParam(2, $this->id);
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
        $query = $this->Connection->prepare("DELETE FROM etiquetas WHERE id= ?");
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