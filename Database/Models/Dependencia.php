<?php


namespace Database\Models;


use Database\abstractModel;

class Dependencia extends abstractModel

{
    private $id;
    private $dependencia;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'dependencia';
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
    public function getDependencia()
    {
        return $this->dependencia;
    }

     /**
     * @param mixed $programa
     */
    public function setDependencia($dependencia): void
    {
        $this->dependencia = $dependencia;
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

    public function get_dependencia(){
        $this->getInstance();
        $sql = "SELECT * FROM dependencia WHERE id LIKE '%" . $this->dependencia . "%' OR nombre_dependencia LIKE '%" . $this->dependencia . "%';";
        $query = $this->Connection->query($sql);
        return $query;
    }

    public function add_dependence(){
        $this->getInstance();
        $namedependencia = $this->clean_string($this->dependencia);
        $query = $this->Connection->prepare("INSERT INTO dependencia VALUES(null, ?)");
        $query->bindParam(1, $namedependencia);
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
        $query = $this->Connection->prepare("SELECT * FROM dependencia WHERE id = ?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query;
    }

    public function dependence_edit(){
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE dependencia SET nombre_dependencia = ? WHERE id = ?");
        $query->bindParam(1, $this->dependencia);
        $query->bindParam(2, $this->id);
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function delete_dependence(){
        $this->getInstance();
        $id = $this->clean_string($this->id);
        $query = $this->Connection->prepare("DELETE FROM dependencia WHERE id= ?");
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