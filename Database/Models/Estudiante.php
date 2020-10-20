<?php


namespace Database\Models;


use Database\abstractModel;

class Estudiante extends abstractModel
{

    private $idcedula;
    private $pnombre;
    private $snombre;
    private $papellido;
    private $sapellido;
    private $telefono;
    private $correo;
    private $direccion;
    private $estado;
    private $semestre;
    private $programa;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return mixed
     */
    public function getIdcedula()
    {
        return $this->idcedula;
    }

    /**
     * @param mixed $idcedula
     */
    public function setIdcedula($idcedula): void
    {
        $this->idcedula = $idcedula;
    }


    /**
     * @return mixed
     */
    public function getPnombre()
    {
        return $this->pnombre;
    }

    /**
     * @param mixed $pnombre
     */
    public function setPnombre($pnombre): void
    {
        $this->pnombre = $pnombre;
    }

    /**
     * @return mixed
     */
    public function getSnombre()
    {
        return $this->snombre;
    }

    /**
     * @param mixed $snombre
     */
    public function setSnombre($snombre): void
    {
        $this->snombre = $snombre;
    }

    /**
     * @return mixed
     */
    public function getPapellido()
    {
        return $this->papellido;
    }

    /**
     * @param mixed $papellido
     */
    public function setPapellido($papellido): void
    {
        $this->papellido = $papellido;
    }

    /**
     * @return mixed
     */
    public function getSapellido()
    {
        return $this->sapellido;
    }

    /**
     * @param mixed $sapellido
     */
    public function setSapellido($sapellido): void
    {
        $this->sapellido = $sapellido;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono): void
    {
        $this->telefono = $telefono;
    }

    /**
     * @return mixed
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * @param mixed $correo
     */
    public function setCorreo($correo): void
    {
        $this->correo = $correo;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion): void
    {
        $this->direccion = $direccion;
    }
    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado): void
    {
        $this->estado = $estado;
    }


    /**
     * @return mixed
     */
    public function getSemestre()
    {
        return $this->semestre;
    }

    /**
     * @param mixed $semestre
     */
    public function setSemestre($semestre): void
    {
        $this->semestre = $semestre;
    }


    /**
     * @return mixed
     */
    public function getPrograma()
    {
        return $this->programa;
    }

    /**
     * @param mixed $programa
     */
    public function setPrograma($programa): void
    {
        $this->programa = $programa;
    }

    public function getBySearch(){

        $query = "SELECT a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, p.nombreprograma,
                  e.semestre,  a.telefono FROM  usuarios a INNER JOIN estudiante e ON e.usuarios_cedula  = a.cedula
                  INNER JOIN programas p ON p.idProgramas = e.programas_idProgramas WHERE a.Estado = 1 AND a.cedula LIKE '%". $this->pnombre ."%' OR
	              CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) LIKE '%". $this->pnombre ."%'";
        $result = $this->return_query($query);
        return $result;
    }

    public function getAll()
    {
        $query = "SELECT a.cedula, CONCAT(a.pnombre,' ', a.papellido,' ', a.sapellido) AS nombre, p.nombreprograma,
                  e.semestre,  a.telefono FROM usuarios a INNER JOIN estudiante e
                  ON e.usuarios_cedula  = a.cedula INNER JOIN programas p ON p.idProgramas = e.programas_idProgramas WHERE a.Estado = 1;";
        $result = $this->return_query($query);
        return $result;
    }
    protected function getById()
    {
        // TODO: Implement getById() method.
    }

    public function getForCedula(){
        $sql = "SELECT a.*, p.nombreprograma, e.semestre FROM usuarios a INNER JOIN estudiante e
                ON e.usuarios_cedula  = a.cedula INNER JOIN programas p 
                ON p.idProgramas = e.programas_idProgramas WHERE a.cedula = ".$this->getIdcedula()."";
        $result = $this->return_query($sql);
        return $result;

    }

    public function create()
    {
        try {
            $this->getInstance();
            $this->Connection->beginTransaction();

            $query = $this->Connection->prepare("INSERT INTO usuarios VALUES (?,?,?,?,?,?,?,?,?)");
            $query->bindParam(1, $this->getIdcedula());
            $query->bindParam(2, $this->getPnombre());
            $query->bindParam(3, $this->getSnombre());
            $query->bindParam(4, $this->getPapellido());
            $query->bindParam(5, $this->getSapellido());
            $query->bindParam(6, $this->getTelefono());
            $query->bindParam(7, $this->getCorreo());
            $query->bindParam(8, $this->getDireccion());
            $query->bindParam(9, $this->getEstado());
            $query->execute();

            $query = $this->Connection->prepare("INSERT INTO estudiante VALUES (?,?,?)");
            $query->bindParam(1, $this->getIdcedula());
            $query->bindParam(2, $this->getPrograma());
            $query->bindParam(3, $this->getSemestre());
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
                                                telefono = ?, correo = ?, direccion = ?, Estado = ? WHERE cedula = ?");
            $query->bindParam(1, $this->getPnombre());
            $query->bindParam(2, $this->getSnombre());
            $query->bindParam(3, $this->getPapellido());
            $query->bindParam(4, $this->getSapellido());
            $query->bindParam(5, $this->getTelefono());
            $query->bindParam(6, $this->getCorreo());
            $query->bindParam(7, $this->getDireccion());
            $query->bindParam(8, $this->getEstado());
            $query->bindParam(9, $this->getIdcedula());
            $query->execute();

            $query = $this->Connection->prepare("UPDATE estudiante SET programas_idProgramas = ?, semestre = ? WHERE usuarios_cedula = ?");
            $query->bindParam(1, $this->getPrograma());
            $query->bindParam(2, $this->getSemestre());
            $query->bindParam(3, $this->getIdcedula());
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
        $query = $this->Connection->prepare("UPDATE usuarios SET Estado = ? WHERE cedula = ?");
        $query->bindParam(1, $this->getEstado());
        $query->bindParam(2, $this->getIdcedula());
        $result = $query->execute();
        if($result){
            return true;
        }else{
            return false;
        }
    }
}