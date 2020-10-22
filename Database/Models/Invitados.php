<?php


namespace Database\Models;


class Invitados extends Usuario
{

    private $detalles;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getDetalles()
    {
        return $this->detalles;
    }

    /**
     * @param mixed $semestre
     */
    public function setDetalles($detalles): void
    {
        $this->detalles = $detalles;
    }


    public function getBySearch(){

        $query = "SELECT a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, p.nombreprograma,
                  e.semestre,  a.telefono FROM  usuarios a INNER JOIN estudiante e ON e.usuario_id  = a.id
                  INNER JOIN programas p ON p.id = e.programa WHERE a.estado = 1 AND a.cedula LIKE '%". $this->pnombre ."%' OR
	              CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) LIKE '%". $this->pnombre ."%'";
        $result = $this->return_query($query);
        return $result;
    }

    public function getAll()
    {
        $query = "SELECT a.id, a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre,
                  a.telefono, i.detalles FROM usuarios a INNER JOIN invitados i
                  ON i.usuario_id = a.id WHERE a.estado = 1;";
        $result = $this->return_query($query);
        return $result;
    }

    public function getForCedula(){
        $sql = "SELECT a.*, i.detalles FROM usuarios a INNER JOIN invitados i
                ON i.usuario_id  = a.id WHERE a.id = ".$this->getId()."";
        $result = $this->return_query($sql);
        return $result;

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

            $id = $this->Connection->lastInsertId();

            $query = $this->Connection->prepare("INSERT INTO invitados VALUES (null,?,?)");
            $query->bindParam(1, $id);
            $query->bindParam(2, $this->getDetalles());
            $result = $query->execute();
            $this->Connection->commit();
            return $result;


        }catch (\Exception $e){
            $this->Connection->rollBack();
            echo "Fallo: " . $e->getMessage();
            return $e->getMessage();
        }


    }

    public function edit(){
        try {
            $this->getInstance();
            $this->Connection->beginTransaction();

            $query = $this->Connection->prepare("UPDATE usuarios SET pnombre = ?, snombre = ?, papellido = ?, sapellido = ?,
                                                telefono = ?, correo = ?, direccion = ?, estado = ? WHERE id = ?");
            $query->bindParam(1, $this->getPnombre());
            $query->bindParam(2, $this->getSnombre());
            $query->bindParam(3, $this->getPapellido());
            $query->bindParam(4, $this->getSapellido());
            $query->bindParam(5, $this->getTelefono());
            $query->bindParam(6, $this->getCorreo());
            $query->bindParam(7, $this->getDireccion());
            $query->bindParam(8, $this->getEstado());
            $query->bindParam(9, $this->getId());
            $query->execute();

            $query = $this->Connection->prepare("UPDATE invitados SET detalles = ? WHERE usuario_id = ?");
            $query->bindParam(1, $this->getDetalles());
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

    public function delete(){
        $this->getInstance();
        $query = $this->Connection->prepare("UPDATE usuarios SET estado = ? WHERE id = ?");
        $query->bindParam(1, $this->getEstado());
        $query->bindParam(2, $this->getId());
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
}