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
    private $cedula;
    private $observacion;
    private $ubicacion;
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

    public function getUtilidadId()
    {
        return $this->utilidad_id;
    }

    public function setUtilidadId($utilidad_id)
    {
        $this->utilidad_id = $utilidad_id;
    }

    public function getEquipoId()
    {
        return $this->equipo_id;
    }

    public function setEquipoId($equipo_id)
    {
        $this->equipo_id = $equipo_id;
    }

    public function getObservacion()
    {
        return $this->observacion;
    }

    public function setObservacion($observacion)
    {
        $this->observacion = $observacion;
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

    public function getCedula()
    {
        return $this->cedula;
    }

    public function setCedula($cedula)
    {
        $this->cedula = $cedula;
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

    public function get_prestamos()
    {
        $this->query = "SELECT p.id, u.cedula, CONCAT(u.pnombre,' ', u.papellido,' ', u.sapellido) AS nombre, 
        CONCAT(a.sede,' - ', a.nombre) as ubicacion, p.observaciones, p.fecha FROM usuarios u
         INNER JOIN prestamo p ON p.id_usuario = u.id JOIN aulas a ON a.id = p.ubicacion WHERE activo = 1;";
        $data = $this->return_query($this->query);
        return  $data;
    }
    
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
        $query = $this->Connection->prepare("SELECT * FROM utilidades u INNER JOIN tmp_utilidad_id ti ON ti.id_utilidad = u.id WHERE ti.id_utilidad  = ?");
        $query->bindParam(1, $this->utilidad_id);
        $query->execute();
        $this->closeConnection();
        return $query;
      
    }


    public function get_prestado_activo()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("SELECT p.id, p.observaciones, u.cedula, e.serial, e.marca, e.modelo, et.descripcion AS tipo,
        e.descripcion, CONCAT(u.pnombre,' ', u.papellido,' ', u.sapellido) AS nombre, pe.fecha_entrega,  CONCAT(a.sede , ' - ', a.nombre) AS ubicacion,
        pe.hora_entrega FROM prestamo p INNER JOIN prestamo_equipo pe ON pe.prestamo_id = p.id
         JOIN equipos e ON e.id = pe.equipo_id JOIN usuarios u ON p.id_usuario = u.id JOIN etiquetas et 
         ON et.id = e.etiqueta_id JOIN aulas a ON a.id = e.ubicacion WHERE p.id = ?");
        $query->bindParam(1, $this->id);
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

    public function delete_tmp_utilidad()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("DELETE FROM tmp_utilidad WHERE id_utilidad = ?");
        $query->bindParam(1, $this->utilidad_id);
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

    public function delete_tmp_id_utilidad()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE tmp_utilidad_id SET activo = ? WHERE id_utilidad = ?");
        $query->bindParam(1, $this->activo);
        $query->bindParam(2, $this->utilidad_id);
        $result = $query->execute();
        if ($result) {
            return true;
        } else {
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

    public function getTableutilidad()
    {
        $fecha = date('yy-m-d');
        $this->query = "SELECT * FROM tmp_utilidad WHERE fecha = '$fecha' AND admin = " .$_SESSION['id']. " AND cantidad > 0";
        $data = $this->return_query($this->query);
        return  $data;
    }


    public function create_prestamo()
    {
        try {
            $this->getInstance();

            $query = $this->Connection->prepare("INSERT INTO prestamo VALUES (null,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->ubicacion);
            $query->bindParam(2, $this->observacion);
            $query->bindParam(3, $this->fecha);
            $query->bindParam(4, $this->estado);
            $query->bindParam(5, $this->cedula);
            $query->bindParam(6, $_SESSION['id']);
            $query->bindParam(7, $this->estado);
            $query->execute();

            $result = $this->Connection->lastInsertId();
            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function create_prestamo_equipo()
    {
        try {
            $this->getInstance();

            $query = $this->Connection->prepare("INSERT INTO prestamo_equipo VALUES (null,?,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->id);
            $query->bindParam(2, $this->equipo_id);
            $query->bindParam(3, $this->fecha);
            $query->bindParam(4, $this->fecha_devolucion);
            $query->bindParam(5, $this->hora_entrega);
            $query->bindParam(6, $this->hora_final);
            $query->bindParam(7, $this->recive);
            $query->bindParam(8, $this->estado);
            $query->bindParam(9, $this->estado);
            $result = $query->execute();

            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function create_prestamo_utilidad()
    {
        try {
            $this->getInstance();

            $query = $this->Connection->prepare("INSERT INTO prestamo_utilidad VALUES (null,?,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->id);
            $query->bindParam(2, $this->utilidad_id);
            $query->bindParam(3, $this->fecha);
            $query->bindParam(4, $this->fecha_devolucion);
            $query->bindParam(5, $this->hora_entrega);
            $query->bindParam(6, $this->hora_final);
            $query->bindParam(7, $this->recive);
            $query->bindParam(8, $this->estado);
            $query->bindParam(9, $this->estado);
            $result = $query->execute();

            return $result;
        } catch (\Exception $e) {
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }



}
