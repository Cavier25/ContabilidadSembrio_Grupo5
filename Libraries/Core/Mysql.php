<?php
class Mysql extends Conexion
{
    private $conexion;
    private $strquery;
    private $arrValues;

    function __construct()
    {
        $this->conexion = new Conexion();
        $this->conexion = $this->conexion->conect();
    } 
    //insertar un registro
    public function Insert(String $Query, array $arrayValues) {
        $this->strQuery = $Query;
        $this->arrayValues = $arrayValues;
        $Insert = $this->conexion->prepare($this->strQuery);
        $resul_insert = $Insert->execute($this->arrayValues);
        if ($resul_insert) {
            $lastinsert = $this->conexion->lastinsertId();
        } else {
            $lastinsert = 0;
        }
        return $lastinsert;
    }
    //buscar un registro
    public function select(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetch(PDO::FETCH_ASSOC);
        return $data;
    }
    //devuelve todos los registros
    public function select_all(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $result->execute();
        $data = $result->fetchall(PDO::FETCH_ASSOC);
        return $data;
    }
    //Actualizar registro
    public function update(string $query, array $arrValues)
    {
        $this->strquery = $query;
        $this->arrValues = $arrValues;
        $update = $this->conexion->prepare($this->strquery);
        $resExecute = $update->execute($this->arrValues);
        return $resExecute;
    }
    //Eliminar registros
    public function delete(string $query)
    {
        $this->strquery = $query;
        $result = $this->conexion->prepare($this->strquery);
        $del = $result->execute();
        return $del;
    }
}
?>