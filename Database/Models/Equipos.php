<?php

namespace Database\Models\Siret;

use Database\abstractModel;

class Equipos extends abstractModel
{

    private $id;
    private $serial;
    private $etiqueta;
    private $marca;
    private $modelo;
    private $descripcion;
    private $ubicacion;
    private $estado;
    private $activo;


    public function __construct()
    {
        parent::__construct();
        $this->Table = 'equipos';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getSerial()
    {
        return $this->serial;
    }

    public function setSerial($serial)
    {
        $this->serial = $serial;
    }

    public function getEtiqueta()
    {
        return $this->etiqueta;
    }

    public function setEtiqueta($etiqueta)
    {
        $this->etiqueta = $etiqueta;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
    }

    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    public function getUbicacion()
    {
        return $this->ubicacion;
    }

    public function setUbicancion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
    }

    public function getFecha()
    {
        return $this->estado;
    }

    public function setFecha($estado)
    {
        $this->estado = $estado;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
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
        $query = $this->Connection->prepare("SELECT * FROM equipos WHERE idutilida = ?");
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
            $query = $this->Connection->prepare("INSERT INTO equipos VALUES (null,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->getSerial());
            $query->bindParam(2, $this->getEtiqueta());
            $query->bindParam(3, $this->getMarca());
            $query->bindParam(4, $this->getModelo());
            $query->bindParam(5, $this->getDescripcion());
            $query->bindParam(6, $this->getUbicacion());
            $query->bindParam(7, $this->getEstado());
            $query->bindParam(8, $this->getActivo());

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
