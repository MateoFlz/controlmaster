<?php
namespace Database;
use Config\Dataconnection;
use helpers\backups\Backdescarga;
use ZipArchive;

abstract class  abstractModel extends Dataconnection
{
    private $drive, $host, $user, $password, $database, $charset;
    protected $Connection;
    protected $query;
    protected $Table;
    protected $stmt;
    protected $param;

    public function __construct()
    {
        $this->drive = self::$DRIVE;
        $this->host = self::$HOST;
        $this->user = self::$USERNAME;
        $this->password = self::$PASSWORD;
        $this->database = self::$DATABASE;
        $this->charset = self::$CHARSET;


        $this->Connection = null;
        $this->query = null;
        $this->Table = null;
        $this->stmt = null;
        $this->param = null;

    }

    private function openConection(){
        try {
            if($this->drive == 'mysql' || $this->drive == null){
                $option = [\PDO::ATTR_PERSISTENT => true, \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION, \PDO::ATTR_EMULATE_PREPARES => false];
                $this->Connection = new \PDO('mysql:host=' . $this->host . ';dbname=' . $this->database . ';charset=' . $this->charset, $this->user, $this->password, $option);
                if($this->Connection != null){
                    return $this->Connection;
                }else{
                    echo 'Error en la conexon';
                }
            }
        }catch (\PDOException $e){
            echo 'Error en el metodo openConection' . $e->getMessage();
            die();
        }
    }

    public static function actionbackup()
    {
        echo backup_tables(self::$HOST, self::$USERNAME, self::$PASSWORD, self::$DATABASE);
        $fecha=date("Y-m-d");
        header("Content-disposition: attachment; filename=db-backup-".$fecha.".sql");
        header("Content-type: MIME");
        readfile("backups/db-backup-".$fecha.".sql");
        return true;
    }

    public function createbackup()
    {
        $fecha = date('Ymd-His');
        $salida = $fecha.'.sql';

        $dump = 'mysqldump -h$this->host -u$this->user -p$this->password --opt
        $this->database';
        system($dump, $dump);

        $zip = new ZipArchive();
        $salida_zip = $fecha.'.zip';
        if($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true){
            $zip->addFile($salida);
            $zip->close();
            \unlink($salida);

            \header('Location: '.$salida_zip);
            return true;
        }else{
            return false;
        }
    }

    public function getInstance(){
        $this->openConection();
    }

    public function getLastId()
    {
        return $this->Connection->lastInsertId();
    }

    public function clean_string($string){

        $string = trim($string);
        $string = stripslashes($string);
        $string = str_ireplace("<script>", "", $string);
        $string = str_ireplace("</script>", "", $string);
        $string = str_ireplace("<script src>", "", $string);
        $string = str_ireplace("<script type>", "", $string);
        $string = str_ireplace("SELECT * FROM", "", $string);
        $string = str_ireplace("DELETE FROM", "", $string);
        $string = str_ireplace("INSERT INTO", "", $string);
        $string = str_ireplace("--", "", $string);
        $string = str_ireplace("^", "", $string);
        $string = str_ireplace("[", "", $string);
        $string = str_ireplace("]", "", $string);
        $string = str_ireplace("==", "", $string);
        $string = str_ireplace(";", "", $string);

        return $string;
    }

    abstract protected function getById();
    abstract protected function getAll();

    public function simple_query($sql){
        $this->openConection();
        $query = $this->Connection->query($sql);
    }

    public function return_query($sql){
        $this->getInstance();
        $query = $this->Connection->query($sql);
        return $query;
    }

    /**
     * @return null
     */
    public function getStmt()
    {
        return $this->stmt;
    }

    protected function closeConnection() {
        /* METODO PARA CERRAR LA CONEXION Y DESPEJAR DE LA MEMORIA */
        $this->Connection = null;
        $this->Table = null;
        $this->query = null;
        $this->stmt = null;
        $this->rst = null;
        $this->parametros = null;
    }

    public function setTable($table){
        $this->Table = $table;
    }

    public function getTable(){
        return $this->Table;
    }

    function __destruct() {
        $this->closeConnection();
    }


    

}