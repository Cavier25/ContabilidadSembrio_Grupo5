<?php
    class ContabilidadModel extends Mysql
    {
        public $intIdcontabilidad;
        public $strContabilidad;
        public $strDateinicio;
        public $strDatefinal;
        public $strDescripcion;
        public $intStatus;

        public function __construct()
        {
            parent::__construct();
        }

        public function insertContabilidad(string $nombre, string $dateinicio,string $datefinal,string $descripcion, int $status){
            $return = 0;
            $this->strContabilidad = $nombre;
            $this->strDateinicio = $dateinicio;
            $this->strDatefinal = $datefinal;
            $this->strDescripcion = $descripcion;
            $this->intStatus = $status;

            $sql = "SELECT * FROM con_sembrios WHERE nombre_contabilidad = '{$this->strContabilidad}'";
            $request = $this->select_all($sql);
            
            if(empty($request))
            {
                $query_insert = "INSERT INTO con_sembrios(nombre_contabilidad,fecha_inicio, p_fecha_final, descripcion,status) VALUES(?,?,?,?,?)";
                $arrData = array($this->strContabilidad, 
                                $this->strDateinicio,
                                $this->strDatefinal,
                                $this->strDescripcion, 
                                $this->intStatus);

                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }
        
        public function selectContabilidad()
		{
			$sql = "SELECT * FROM con_sembrios 
					WHERE status != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}

        public function selectConta(int $idcontabilidad){
            $this->intIdcontabilidad = $idcontabilidad;
            $sql = "SELECT * FROM con_sembrios
                    WHERE id_con_sembrios = $this->intIdcontabilidad";
            $request = $this->select($sql);
            return $request;
        }

        public function deleteContabilidad(int $idcontabilidad)
		{
			$this->intIdContabilidad = $idcontabilidad;
			//$sql = "SELECT * FROM con_sembrios WHERE id_con_sembrios = $this->intIdContabilidad";
			//$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE con_sembrios SET status = ? WHERE id_con_sembrios = $this->intIdContabilidad ";
				$arrData = array(0);
				$request = $this->update($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}

        public function insertEgresos(string $nombre, int $cantidad,int $precio,string $descripcion){
            $return = 0;
            $this->strnombreEgreso = $nombre;
            $this->intCantidad = $cantidad;
            $this->intPrecio = $precio;
            $this->strDescripcion = $descripcion;

            //$sql = "SELECT * FROM egresos WHERE producto = '{$this->strnombreEgreso}'";
            //$request = $this->select_all($sql);
            
            if(empty($request))
            {
                $query_insert = "INSERT INTO egresos(producto,cantidad, precio, descripcion) VALUES(?,?,?,?)";
                $arrData = array($this->strnombreEgreso, 
                                $this->intCantidad,
                                $this->intPrecio,
                                $this->strDescripcion);

                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }

        public function selectEgresos()
		{
			$sql = "SELECT * FROM egresos 
					WHERE cantidad != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}

        public function selectEgreso(int $idegreso){
            $this->intIdegreso = $idegreso;
            $sql = "SELECT * FROM egresos
                    WHERE id_egresos = $this->intIdegreso";
            $request = $this->select($sql);
            return $request;
        }
        
        public function deleteEgresos(int $idegresos)
		{
			$this->intIdEgresos = $idegresos;
			//$sql = "SELECT * FROM con_sembrios WHERE id_con_sembrios = $this->intIdContabilidad";
			//$request = $this->select_all($sql);
			if(empty($request))
			{
				$sql = "UPDATE egresos SET id_egresos = ? WHERE id_egresos = $this->intIdEgresos ";
				$arrData = array(0);
				$request = $this->delete($sql,$arrData);
				if($request)
				{
					$request = 'ok';	
				}else{
					$request = 'error';
				}
			}else{
				$request = 'exist';
			}
			return $request;
		}

        public function insertIngresos(string $nombre, int $cantidad,int $precio,string $descripcion){
            $return = 0;
            $this->strnombreIngreso = $nombre;
            $this->intCantidad = $cantidad;
            $this->intPrecio = $precio;
            $this->strDescripcion = $descripcion;

            //$sql = "SELECT * FROM egresos WHERE producto = '{$this->strnombreEgreso}'";
            //$request = $this->select_all($sql);
            
            if(empty($request))
            {
                $query_insert = "INSERT INTO ingresos(producto,cantidad, precio, descripcion) VALUES(?,?,?,?)";
                $arrData = array($this->strnombreIngreso, 
                                $this->intCantidad,
                                $this->intPrecio,
                                $this->strDescripcion);

                $request_insert = $this->insert($query_insert, $arrData);
                $return = $request_insert;
            }else{
                $return = "exist";
            }
            return $return;
        }

        public function selectIngresos()
		{
			$sql = "SELECT * FROM ingresos 
					WHERE id_ingreso != 0 ";
					$request = $this->select_all($sql);
					return $request;
		}

        public function selectIngreso(int $idingreso){
            $this->intIdingreso = $idingreso;
            $sql = "SELECT * FROM ingresos
                    WHERE id_ingreso = $this->intIdingreso";
            $request = $this->select($sql);
            return $request;
        } 
/*
        public function updateEgresos(int $idegresos, string $producto, int $cantidad, int $precio, string $descripcion){
			$this->intidEgresos = $idegresos;
			$this->strnombre = $producto;
			$this->intCantidad = $cantidad;
			$this->intPrecio = $precio;
			$this->strDescripcion = $descripcion;

			$sql = "SELECT * FROM egresos WHERE producto = '{$this->strnombre}' AND id_egresos != $this->intidEgresos";
			$request = $this->select_all($sql);

			if(empty($request))
			{
				$sql = "UPDATE egresos SET producto = ?, cantidad = ?, precio = ?, descripcion = ? WHERE id_egresos = $this->intidEgresos ";
				$arrData = array($this->strnombre, 
								 $this->intCantidad, 
								 $this->intPrecio, 
								 $this->strDescripcion);
				$request = $this->update($sql,$arrData);
			}else{
				$request = "exist";
			}
		    return $request;			
		}*/

    }
?>