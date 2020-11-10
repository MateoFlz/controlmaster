<?php

namespace Database\Models;

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
    private $fecha;


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

    public function setUbicacion($ubicacion)
    {
        $this->ubicacion = $ubicacion;
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

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }


    public function getById()
    {
        $this->getInstance();
        $id = $this->clean_string($this->id);
        $query = $this->Connection->prepare("SELECT * FROM equipos WHERE id = ?");
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
        $this->query = "SELECT e.*, a.nombre, t.descripcion FROM equipos e
        INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON e.etiqueta_id = t.id WHERE e.activo = 1";
        $data = $this->return_query($this->query);
        return  $data;
    }

    public function getEquipoById()
    {
        
        $query = $this->Connection->prepare("SELECT e.*, a.sede, a.nombre, t.descripcion as tipo FROM equipos e
        INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON
         e.etiqueta_id = t.id WHERE e.activo = 1 AND e.id = ?");
        $query->bindParam(1, $this->id);
        $query->execute();
        $this->closeConnection();
        return $query;
    }

    public function getEquipoByEtiqueta()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT e.*, t.id as ideti, a.nombre, t.descripcion as tipo FROM equipos e
         INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON
         e.etiqueta_id = t.id WHERE e.activo = 1 AND t.descripcion = ?");
        $query->bindParam(1, $this->descripcion);
        $query->execute();
        $this->closeConnection();
        return $query;
    }

    public function getEquipoByactivo()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT e.*, et.descripcion as tipo, t.activo, e.estado as estado_equipo FROM equipos e LEFT JOIN tmp_equipo_id t ON e.id = t.id_equipo 
        JOIN etiquetas et ON e.etiqueta_id = et.id WHERE (t.activo IS NULL OR t.activo = 0) AND et.descripcion = ?");
        $query->bindParam(1, $this->descripcion);
        $query->execute();
        $this->closeConnection();
        return $query;
    }

    public function getEquipoByEtiquetaId()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT e.*, t.id as ideti, a.nombre, t.descripcion as tipo FROM equipos e
         INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON
         e.etiqueta_id = t.id WHERE e.activo = 1 AND e.id = ?");
        $query->bindParam(1, $this->id);
        $query->execute();
        $this->closeConnection();
        return $query;
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
        try{
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE equipos SET serial = ?,
            etiqueta_id = ?, marca = ?, modelo = ?, descripcion = ?, 
            ubicacion = ?, estado = ?, activo = ? WHERE id = ?");
            $query->bindParam(1, $this->getSerial());
            $query->bindParam(2, $this->getEtiqueta());
            $query->bindParam(3, $this->getMarca());
            $query->bindParam(4, $this->getModelo());
            $query->bindParam(5, $this->getDescripcion());
            $query->bindParam(6, $this->getUbicacion());
            $query->bindParam(7, $this->getEstado());
            $query->bindParam(8, $this->getActivo());
            $query->bindParam(9, $this->getId());

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


    public function existePrestamoById()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT e.*, t.id as ideti, a.nombre, t.descripcion as tipo FROM equipos e
         INNER JOIN aulas a ON a.id = e.ubicacion JOIN etiquetas t ON
         e.etiqueta_id = t.id WHERE e.activo = 1 AND t.descripcion = ?");
        $query->bindParam(1, $this->descripcion);
        $result = $query->execute();
        $this->closeConnection();
        if($result){
            return true;
        }
        return false;
    }

    public function create_temporal()
    {
        try {
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO tmp_equipo VALUES (null,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->id);
            $query->bindParam(2, $this->serial);
            $query->bindParam(3, $this->marca);
            $query->bindParam(4, $this->descripcion);
            $query->bindParam(5, $this->etiqueta);
            $query->bindParam(6, $this->fecha);
            $query->bindParam(7, $_SESSION['id']);

            $result = $query->execute();
            $this->closeConnection();
            return true;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function getTable()
    {
        $fecha = date('yy-m-d');
        $this->query = "SELECT * FROM tmp_equipo WHERE fecha = '$fecha' AND admin = " .$_SESSION['id']. "";
        $data = $this->return_query($this->query);
        return  $data;
    }

    

    
}
