<?php
class Conexion{
    private $conect;

    public function __construct(){
        $connectionsString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=".DB_CHARSET;
        try {
            $this->conect = new PDO($connectionsString, DB_USER, DB_PASSWORD);
            $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "conexion exitosa";
        }catch(PDOException $e){
            $this->conect = 'Error de la conexion';
            echo "Error: " . $e->getMessage();
        }
    }
    public function conect(){
        return $this->conect;
    }
}
?>