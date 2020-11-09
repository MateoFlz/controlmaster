<?php

namespace Database\Models;

use Database\abstractModel;

class PrestamoEquipo extends abstractModel
{

    private $id;
    private $prestamo_id;
    private $equipo_id;
    private $utilidad_id;
    private $fecha;
    private $fecha_entrega;
    private $fecha_devolucion;
    private $cantidad;
    private $hora_entrega;
    private $hora_final;
    private $recive;
    private $estado;
    private $activo;


    public function __construct()
    {
        parent::__construct();
        $this->Table = 'prestamo_equipo';
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getPrestamoId()
    {
        return $this->prestamo_id;
    }

    public function setPrestamoId($prestamo_id)
    {
        $this->prestamo_id = $prestamo_id;
    }

    public function getEquipoId()
    {
        return $this->equipo_id;
    }

    public function setEquipoId($equipo_id)
    {
        $this->equipo_id = $equipo_id;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getFechaEntrega()
    {
        return $this->fecha_entrega;
    }

    public function setFechaEntrega($fecha_entrega)
    {
        $this->fecha_entrega = $fecha_entrega;
    }
    
    public function getFechaDevolucion()
    {
        return $this->fecha_devolucion;
    }

    public function setFechaDevolucion($fecha_devolucion)
    {
        $this->fecha_devolucion = $fecha_devolucion;
    }

    public function getHoraEntrega()
    {
        return $this->hora_entrega;
    }

    public function setHoraEntrega($hora_entrega)
    {
        $this->hora_entrega = $hora_entrega;
    }

    public function getHoraFinal()
    {
        return $this->hora_final;
    }

    public function setHoraFinal($hora_final)
    {
        $this->hora_final = $hora_final;
    }

    public function getRecive()
    {
        return $this->recive;
    }

    public function setRecive($recive)
    {
        $this->recive = $recive;
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
        $query = $this->Connection->prepare("SELECT * FROM prestamo_equipo WHERE id = ?");
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
    

    /*public function getFull()
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
    }*/

    public function create_tmp_equipo()
    {
        try {
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO tmp_equipo_id VALUES (null,?,?)");
            $query->bindParam(1, $this->equipo_id);
            $query->bindParam(2, $this->activo);

            $result = $query->execute();
            $this->closeConnection();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function create_tmp_utilidad()
    {
        try {
            $this->getInstance();
            $query = $this->Connection->prepare("INSERT INTO tmp_utilidad_id VALUES (null,?,?)");
            $query->bindParam(1, $this->utilidad_id);
            $query->bindParam(2, $this->activo);

            $result = $query->execute();
            $this->closeConnection();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function update_tmp_utilidad()
    {
        try {
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE tmp_utilidad_id SET activo = ? WHERE id_utilidad = ?");
            $query->bindParam(1, $this->activo);
            $query->bindParam(2, $this->utilidad_id);
            

            $result = $query->execute();
            $this->closeConnection();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function update_tmp_equipo()
    {
        try {
            $this->getInstance();
            $query = $this->Connection->prepare("UPDATE tmp_equipo_id SET activo = ? WHERE id_equipo = ?");
            $query->bindParam(1, $this->activo);
            $query->bindParam(2, $this->equipo_id);
            

            $result = $query->execute();
            $this->closeConnection();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }
    
    /*public function create()
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
        
    }*/



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
        $query = $this->Connection->prepare("SELECT * FROM prestamo_equipo pe INNER JOIN equipos e 
        ON e.id = pe.equipo_id WHERE pe.activo = 1 AND pe.estado = 1 AND pe.equipo_id = ?");
        $query->bindParam(1, $this->prestamo_id);
        $query->execute();
        $this->closeConnection();
        return $query;
    }


    public function equipoPrestado()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT * FROM equipos e INNER JOIN tmp_equipo_id te ON te.id_equipo = e.id WHERE e.id = ?");
        $query->bindParam(1, $this->equipo_id);
        $query->execute();
        $this->closeConnection();
        return $query; 
    }

    public function utilidadPrestado()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT * FROM utilidades e INNER JOIN tmp_utilidad_id te ON te.id_utilidad = e.id WHERE e.id = ?");
        $query->bindParam(1, $this->equipo_id);
        $query->execute();
        $this->closeConnection();
        return $query; 
    }

    public function delete_tmp_equipo()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("DELETE FROM tmp_equipo WHERE id_equipo = ?");
        $query->bindParam(1, $this->equipo_id);
        $result = $query->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function delete_tmp_id_equipo()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE tmp_equipo_id SET activo = ? WHERE id_equipo = ?");
        $query->bindParam(1, $this->activo);
        $query->bindParam(2, $this->equipo_id);
        $result = $query->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
