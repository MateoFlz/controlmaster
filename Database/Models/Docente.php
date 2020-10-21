<?php


namespace Database\Models;


class Docente extends Usuario
{

    private $tipo;

    public function __construct()
    {
        parent::__construct();
        $this->Table = 'docente';
    }


     /**
     * @return mixed
     */
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * @param mixed $correo
     */
    public function setTipo($tipo): void
    {
        $this->tipo = $tipo;
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

            $query = $this->Connection->prepare("INSERT INTO docente VALUES (null,?,?)");
            $query->bindParam(1, $id);
            $query->bindParam(2, $this->getTipo());
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

            $query = $this->Connection->prepare("UPDATE docente SET tipo = ? WHERE usuario_id = ?");
            $query->bindParam(1, $this->getTipo());
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

    public function getForCedula(){
        $sql = "SELECT a.*, e.tipo FROM usuarios a INNER JOIN docente e
                ON e.usuario_id = a.id WHERE a.id = ".$this->getId()."";
        $result = $this->return_query($sql);
        return $result;

    }

    public function get_data_docente(){
        $query = "SELECT a.id, a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, a.telefono,
        e.tipo FROM usuarios a INNER JOIN docente e ON e.usuario_id = a.id WHERE a.estado = 1;";
        $result = $this->return_query($query);
        return $result;    
    }

    public function get_by_search()
    {
        $query = "SELECT a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, a.telefono,
        e.tipo FROM usuarios a INNER JOIN docente e
        ON e.usuario_id = a.id WHERE a.estado = 1 AND a.cedula LIKE '%". $this->pnombre ."%' OR
	              CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) LIKE '%". $this->pnombre ."%'";
        $result = $this->return_query($query);
        return $result; 
    }

    public function delete()
    {
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
