<?php 

namespace Database\Models;

class Administrativo extends Usuario{

    private $idadministrativo;
    private $dependencia;


    public function __construct()
    {
        parent::__construct();
        $this->Table = 'administrativo';
    }



    /**
     * @return mixed
     */
    public function getDependencia()
    {
        return $this->dependencia;
    }

    /**
     * @param mixed $correo
     */
    public function setDependencia($dependencia): void
    {
        $this->dependencia = $dependencia;
    }

    public function create()
    {
        try {
            $this->getInstance();
            $this->Connection->beginTransaction();

            $query = $this->Connection->prepare("INSERT INTO usuarios VALUES (null,?,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->getCedula());
            $query->bindParam(2, $this->getPnombre());
            $query->bindParam(3, $this->getSnombre());
            $query->bindParam(4, $this->getPapellido());
            $query->bindParam(5, $this->getSapellido());
            $query->bindParam(6, $this->getTelefono());
            $query->bindParam(7, $this->getCorreo());
            $query->bindParam(8, $this->getDireccion());
            $query->bindParam(9, $this->getEstado());
            $query->execute();

            $query = $this->Connection->prepare("INSERT INTO administrativo VALUES (null,?,?)");
            $query->bindParam(1, $this->getId());
            $query->bindParam(2, $this->getDependencia());
            $result = $query->execute();
            $this->Connection->commit();
            return $result;


        }catch (\Exception $e){
            $this->Connection->rollBack();
            echo "Fallo: " . $e->getMessage();
            return false;
        }
    }

    public function edit(){
        try {
            $this->getInstance();
            $this->Connection->beginTransaction();

            $query = $this->Connection->prepare("UPDATE usuarios SET pnombre = ?, snombre = ?, papellido = ?, sapellido = ?,
                                                telefono = ?, correo = ?, direccion = ? WHERE cedula = ?");
            $query->bindParam(1, $this->getPnombre());
            $query->bindParam(2, $this->getSnombre());
            $query->bindParam(3, $this->getPapellido());
            $query->bindParam(4, $this->getSapellido());
            $query->bindParam(5, $this->getTelefono());
            $query->bindParam(6, $this->getCorreo());
            $query->bindParam(7, $this->getDireccion());
            $query->bindParam(8, $this->getId());
            $query->execute();

            $query = $this->Connection->prepare("UPDATE administrativo SET dependencia = ?  WHERE usuarios_cedula = ?");
            $query->bindParam(1, $this->getDependencia());
            $query->bindParam(2, $this->getId());
            $result = $query->execute();
            $this->Connection->commit();
            return $result;


        }catch (\Exception $e){
            $this->Connection->rollBack();
            echo "Fallo: " . $e->getMessage();
            return $e->getMessage();
        }
    }

    public function get_data_administrativo(){
        $query = "SELECT a.id, a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, a.telefono,
        d.nombre_dependencia FROM usuarios a INNER JOIN administrativo e ON e.id = a.id JOIN dependencia d
        ON e.dependencia = d.id WHERE a.Estado = 1;";
        $result = $this->return_query($query);
        return $result;    
    }

    public function getForCedula(){
        $sql = "SELECT a.*, e.dependencia FROM usuarios a INNER JOIN administrativo e
                ON e.usuarios_cedula = a.cedula WHERE a.id = ".$this->getId()."";
        $result = $this->return_query($sql);
        return $result;

    }

    public function delete_administrivo()
    {
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE usuarios SET Estado = ? WHERE cedula = ?");
        $query->bindParam(1, $this->getEstado());
        $query->bindParam(2, $this->getId());
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }

    public function get_by_search()
    {
        $query = "SELECT a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, a.telefono,
        d.nombre_dependencia FROM usuarios a INNER JOIN administrativo e ON e.usuarios_cedula = a.cedula JOIN dependencia d
        ON e.dependencia = d.id WHERE a.Estado = 1 AND a.cedula LIKE '%". $this->pnombre ."%' OR
	              CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) LIKE '%". $this->pnombre ."%'";
        $result = $this->return_query($query);
        return $result; 
    }

}