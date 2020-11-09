<?php

namespace Database\Models;

use Database\abstractModel;

class Utilidades extends abstractModel
{

    private $id;
    private $etiqueta;
    private $marca;
    private $descripcion;
    private $ubicacion;
    private $cantidad;
    private $fecha;
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

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
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
        $query = $this->Connection->prepare("SELECT * FROM utilidades WHERE id = ?");
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
    

    public function getFull()
    {
        $this->query = "SELECT e.*, a.nombre, t.descripcion as descrip FROM utilidades e
        INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON e.etiqueta_id = t.id WHERE e.activo = 1";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function getUtilidaById()
    {
        $query = $this->Connection->prepare("SELECT e.*, a.sede, a.nombre, t.descripcion as tipo FROM utilidades e
        INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON
         e.etiqueta_id = t.id WHERE e.activo = 1 AND e.id = ?");
        $query->bindParam(1, $this->id);
        $query->execute();
        $this->closeConnection();
        return $query;
    }

    public function getUtilidaByEtiqueta()
    {
        $this->query = "SELECT e.*, a.nombre, t.descripcion as descrip FROM utilidades e
        INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON e.etiqueta_id = t.id WHERE e.activo = 1";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function create()
    {

        try {
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO utilidades VALUES (null,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->getEtiqueta());
            $query->bindParam(2, $this->getMarca());
            $query->bindParam(3, $this->getDescripcion());
            $query->bindParam(4, $this->getUbicacion());
            $query->bindParam(5, $this->getCantidad());
            $query->bindParam(6, $this->getEstado());
            $query->bindParam(7, $this->getActivo());

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
        try{
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE utilidades SET etiqueta_id = ?, 
            marca = ?, descripcion = ?, 
            ubicacion = ?, cantidad = ?, estado = ?, activo = ? WHERE id = ?");
            $query->bindParam(1, $this->getEtiqueta());
            $query->bindParam(2, $this->getMarca());
            $query->bindParam(3, $this->getDescripcion());
            $query->bindParam(4, $this->getUbicacion());
            $query->bindParam(5, $this->getCantidad());
            $query->bindParam(6, $this->getEstado());
            $query->bindParam(7, $this->getActivo());
            $query->bindParam(8, $this->getId());

            $result = $query->execute();
            if ($result) {
                return true;
            } else {
                return false;
            }
        }catch(\Exception $e){
            echo "Fallo: " . $e->getMessage();
            return false;
        }
        
    }

    public function getUtilidaByactivo()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT * FROM utilidades u LEFT JOIN tmp_utilidad_id t ON u.id = t.id_utilidad 
        JOIN etiquetas et ON u.etiqueta_id = et.id WHERE (t.activo IS NULL OR t.activo = 0) AND u.activo = 1 AND u.cantidad > 0");
        $query->bindParam(1, $this->descripcion);
        $query->execute();
        $this->closeConnection();
        return $query;
    }

    public function delete()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE equipos SET activo = ? WHERE id = ?");
        $query->bindParam(1, $this->getActivo());
        $query->bindParam(2, $this->getId());
        $result = $query->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function create_temporal()
    {
        try {
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO tmp_utilidad VALUES (null,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->id);
            $query->bindParam(2, $this->marca);
            $query->bindParam(3, $this->descripcion);
            $query->bindParam(4, $this->cantidad);
            $query->bindParam(5, $this->etiqueta);
            $query->bindParam(6, $this->fecha);
            $query->bindParam(7, $_SESSION['id']);
            $query->execute();

            $query = $this->Connection->prepare("UPDATE utilidades SET cantidad = ? WHERE id = ?");
            $query->bindParam(1, $this->cantidad);
            $query->bindParam(2, $this->id);

            $this->closeConnection();
            return true;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }
}
