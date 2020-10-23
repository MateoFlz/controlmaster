<?php


namespace Database\Models;


use Database\abstractModel;

class Ubicaciones extends abstractModel

{
    private $id;
    private $etiqueta;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'siret_laboratorios';
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

}