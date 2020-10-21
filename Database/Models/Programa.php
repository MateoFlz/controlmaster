<?php


namespace Database\Models;


use Database\abstractModel;

class Programa extends abstractModel
{

    private $id;
    private $programa;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'programas';
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @param mixed $programa
     */
    public function setPrograma($programa): void
    {
        $this->programa = $programa;
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

    public function get_program(){
        $this->getInstance();
        $sql = "SELECT * FROM programas WHERE id LIKE '%" . $this->programa . "%' OR nombreprograma LIKE '%" . $this->programa . "%';";
        $query = $this->Connection->query($sql);
        return $query;
    }

    public function add_program(){
        $this->getInstance();
        $nameprogramclean = $this->clean_string($this->programa);
        $query = $this->Connection->prepare("INSERT INTO programas VALUES(null, ?)");
        $query->bindParam(1, $nameprogramclean);
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }


    public function delete_program(){
        $this->getInstance();
        $id = $this->clean_string($this->id);
        $query = $this->Connection->prepare("DELETE FROM programas WHERE id = ?");
        $query->bindParam(1, $id);
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
        $query = $this->Connection->prepare("SELECT * FROM programas WHERE id = ?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query;
    }

    public function program_edit(){
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE programas SET nombreprograma = ? WHERE id = ?");
        $query->bindParam(1, $this->programa);
        $query->bindParam(2, $this->id);
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
}