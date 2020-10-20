<?php

namespace Database\Models\Siret;

use Database\abstractModel;

class Utilidad extends abstractModel
{

    private $id;
    private $codigo;
    private $descripcion;
    private $cantidad;
    private $fecha;
    private $activo;


    public function __construct()
    {
        parent::__construct();
        $this->Table = 'utilidades';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getCodigo()
    {
        return $this->codigo;
    }

    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getCantidad()
    {
        return $this->cantidad;
    }

    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function setActivo($activo)
    {
        $this->activo = $activo;
    }


    public function getById()
    {
        $this->getInstance();
        $id = $this->clean_string($this->id);
        $query = $this->Connection->prepare("SELECT * FROM utilidades WHERE idutilida = ?");
        $query->bindParam(1, $id);
        $query->execute();
        return $query;
    }

    public function getAll()
    {
        $this->query = "SELECT * FROM " . $this->Table . " WHERE activo = 1;";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function create()
    {

        try {
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO utilidades VALUES (null, ?,?,?,?,?)");
            $query->bindParam(1, $this->getCodigo());
            $query->bindParam(2, $this->getDescripcion());
            $query->bindParam(3, $this->getCantidad());
            $query->bindParam(4, $this->getFecha());
            $query->bindParam(5, $this->getActivo());

            $result = $query->execute();
            $this->closeConnection();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function update()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE utilidades SET codigo = ?,
         descripcion = ?, cantidad = ?, fecha = ?, activo = ? WHERE idutilida = ?");
        $query->bindParam(1, $this->getCodigo());
        $query->bindParam(2, $this->getDescripcion());
        $query->bindParam(3, $this->getCantidad());
        $query->bindParam(4, $this->getFecha());
        $query->bindParam(5, $this->getActivo());
        $query->bindParam(6, $this->getId());

        $result = $query->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE utilidades SET activo = ? WHERE idutilida = ?");
        $query->bindParam(1, $this->getActivo());
        $query->bindParam(2, $this->getId());
        $result = $query->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
