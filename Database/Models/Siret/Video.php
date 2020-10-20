<?php

namespace Database\Models\Siret;

use Database\abstractModel;

class Video extends abstractModel
{

    private $id;
    private $codigo;
    private $serial;
    private $descripcion;
    private $estado;
    private $fecha;
    private $activo;


    public function __construct()
    {
        parent::__construct();
        $this->Table = 'video';
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

    public function getSerial()
    {
        return $this->serial;
    }

    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
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
        $query = $this->Connection->prepare("SELECT * FROM video WHERE idvideo = ?");
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
            $query = $this->Connection->prepare("INSERT INTO video VALUES (null, ?,?,?,?,?,?)");
            $query->bindParam(1, $this->getCodigo());
            $query->bindParam(2, $this->getSerial());
            $query->bindParam(3, $this->getDescripcion());
            $query->bindParam(4, $this->getEstado());
            $query->bindParam(5, $this->getFecha());
            $query->bindParam(6, $this->getActivo());

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
        $query = $this->Connection->prepare("UPDATE video SET codigo = ?, serial = ?,
         descripcion = ?, estado = ?, fecha = ?, activo = ? WHERE idvideo = ?");
        $query->bindParam(1, $this->getCodigo());
        $query->bindParam(2, $this->getSerial());
        $query->bindParam(3, $this->getDescripcion());
        $query->bindParam(4, $this->getEstado());
        $query->bindParam(5, $this->getFecha());
        $query->bindParam(6, $this->getActivo());
        $query->bindParam(7, $this->getId());

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
        $query = $this->Connection->prepare("UPDATE video SET activo = ? WHERE idvideo = ?");
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
