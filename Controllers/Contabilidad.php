<?php
    class Contabilidad extends Controllers{
        public function __construct()
		{
			parent::__construct();
			session_start();
			session_regenerate_id(true);
			if(empty($_SESSION['login']))
			{
				header('Location: '.base_url().'/login');
			}
			getPermisos(5);
		}

        public function Contabilidad()
        {
            if(empty($_SESSION['permisosMod']['r'])){
				header("Location:".base_url().'/dashboard');
			}
            $data['tag_tag'] = "Contabilidad";
            $data['page_title'] = "Contabilidad <small>Contabilidad</small>";
            $data['page_name'] = "contabilidad";
            $data['page_functions_js'] = "functions_contabilidad.js";
            $this->views->getView($this,"contabilidad",$data);
        }

        public function setContabilidad(){
            if($_POST){
                if(empty($_POST['txtnombreContabilidad']) || empty($_POST['datefinicio']) || empty($_POST['dateffinal']) || empty($_POST['descripcion']) || empty($_POST['liststatus']) )
                {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
                }else{
                    $intIdcontabilidad = intval($_POST['idContabilidad']);
                    $strContabilidad = strClean($_POST['txtnombreContabilidad']);
                    $strDateinicio = $_POST['datefinicio'];
                    $strDatefinal = $_POST['datefinicio'];
                    $strDescripcion = strClean($_POST['descripcion']);
                    $intStatus = intval ($_POST['liststatus']);
                    if($intIdcontabilidad ==0)
                    {
                        //crear
                        $request_contabilidad = $this->model->insertContabilidad($strContabilidad,$strDateinicio,$strDatefinal, $strDescripcion, $intStatus);
                        $option = 1;
                    }else{
                        //Actualizar
                        $request_contabilidad = $this->model->updateContabilidad($strContabilidad,$strDateinicio,$strDatefinal, $strDescripcion, $intStatus);
                        $option = 2;
                    }
                    if($request_contabilidad > 0)
                    {
                    if($option == 1)
                    {   
                        $arrResponse = array('status'=> true, 'msg' => 'Datos guardados correctamente');
                    }else{
                        $arrResponse = array('status'=> true, 'msg' => 'Datos Actualizados correctamente');
                    }   
                        $arrResponse = array('status'=> true, 'msg' => 'Datos guardados correctamente'); 

                    }else if($request_contabilidad == 'exist'){
                        $arrResponse = array('status' => false, 'msg' => 'Atencion! el rol ya existe.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }
   

        public function getContabilidad()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectContabilidad();
                
                for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
                    $btnEdite = '';
                    $btnEditi = '';
					$btnDelete = '';

					if($arrData[$i]['status'] == 1)
					{
						$arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>';
					}else{
						$arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';
					}

					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm btnViewUsuario" onClick="fntViewInfo('.$arrData[$i]['id_con_sembrios'].')" title="Ver contabilidad"><i class="far fa-eye"></i></button>';
					}
                    if($_SESSION['permisosMod']['u']){
                        $btnEdite = '<button class="btn btn-danger btn-sm btnEditEgresos" onClick="fntEgresos('.$arrData[$i]['id_con_sembrios'].')" title="Egresos"><i class="fa fa-usd" aria-hidden="true"></i></button>';
                    }
                    if($_SESSION['permisosMod']['u']){
                        $btnEditi = '<button class="btn btn-primary  btn-sm btnEditIngresos" onClick="fntIngresos('.$arrData[$i]['id_con_sembrios'].')" title="ingresos"><i class="fa fa-line-chart" aria-hidden="true"></i></button>';						  
                    }
					if($_SESSION['permisosMod']['d']){
							$btnDelete = '<button class="btn btn-danger btn-sm btnDelUsuario" onClick="fntDelInfo('.$arrData[$i]['id_con_sembrios'].')" title="Eliminar contabilidad"><i class="far fa-trash-alt"></i></button>';
					}
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdite.' '.$btnEditi.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

        public function delContabilidad()
		{
			if($_POST){
				$intIdContabilidad = intval($_POST['id_con_sembrios']);
				$requestDelete = $this->model->deleteContabilidad($intIdContabilidad);
				if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Rol');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Rol asociado a usuarios.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

        public function getConta(int $idcontabilidad)
        {
            $intIdcontabilidad = intval($idcontabilidad);
            if ($intIdcontabilidad > 0)
            {
                $arrData = $this->model->selectConta($intIdcontabilidad);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function setEgresos(){
            //dep($_POST);
            
            if($_POST){
                if(empty($_POST['txtproductoEg']) || empty($_POST['intcantidadEg']) || empty($_POST['intprecioEg']) || empty($_POST['descripcionEg']))
                {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
                }else{
                    $intEgreso = intval($_POST['idEgresosEg']);
                    $strNombre = strClean($_POST['txtproductoEg']);
                    $intCantidad = $_POST['intcantidadEg'];
                    $intPrecio = $_POST['intprecioEg'];
                    $strDescripcion = strClean($_POST['descripcionEg']);
                    if($intEgreso !=0 )
                    {
                        //crear
                        $request_Egresos = $this->model->insertEgresos($strNombre,$intCantidad,$intPrecio, $strDescripcion);
                        $option = 1;
                    }else{
                        //Actualizar
                        $request_Egresos = $this->model->updateEgresos($strNombre,$intCantidad,$intPrecio, $strDescripcion);
                        $option = 2;
                    }
                    if($request_Egresos > 0)
                    {
                    if($option == 1)
                    {   
                        $arrResponse = array('status'=> true, 'msg' => 'Datos guardados correctamente');
                    }else{
                        $arrResponse = array('status'=> true, 'msg' => 'Datos Actualizados correctamente');
                    }   
                        $arrResponse = array('status'=> true, 'msg' => 'Datos guardados correctamente'); 

                    }else if($request_Egresos == 'exist'){
                        $arrResponse = array('status' => false, 'msg' => 'Atencion! el Egreso ya existe.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getEgresos()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectEgresos();

                
                for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
                    $btnEdite = '';
                    $btnEditi = '';
					$btnDelete = '';


					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm btnViewEgreso" onClick="fntViewInfoE('.$arrData[$i]['id_egresos'].')" title="Ver egresos"><i class="far fa-eye"></i></button>';
					}        
					/*if($_SESSION['permisosMod']['d']){
							$btnDelete = '<button class="btn btn-danger btn-sm btnDelEgreso" onClick="fntDelInfoE('.$arrData[$i]['id_egresos'].')" title="Eliminar egresos"><i class="far fa-trash-alt"></i></button>';
					}*/
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdite.' '.$btnEditi.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}
        
        public function getEgreso(int $idegreso)
        {
            $intIdegreso = intval($idegreso);
            if ($intIdegreso > 0)
            {
                $arrData = $this->model->selectEgreso($intIdegreso);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function delEgresos()
		{
			if($_POST){
				$intIdEgresos = intval($_POST['id_egresos']);
				$requestDelete = $this->model->deleteEgresos($intIdEgresos);
				if($requestDelete == 'ok')
				{
					$arrResponse = array('status' => true, 'msg' => 'Se ha eliminado el Egreso');
				}else if($requestDelete == 'exist'){
					$arrResponse = array('status' => false, 'msg' => 'No es posible eliminar un Egreso asociado a la contabilidad.');
				}else{
					$arrResponse = array('status' => false, 'msg' => 'Error al eliminar el Rol.');
				}
				echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

        public function setIngresos(){
            
            if($_POST){
                if(empty($_POST['txtproductoIg']) || empty($_POST['intcantidadIg']) || empty($_POST['intprecioIg']) || empty($_POST['descripcionIg']))
                {
                    $arrResponse = array("status" => false, "msg" => 'Datos incorrectos');
                }else{
                    $intEgreso = intval($_POST['idIngresosIg']);
                    $strNombre = strClean($_POST['txtproductoIg']);
                    $intCantidad = $_POST['intcantidadIg'];
                    $intPrecio = $_POST['intprecioIg'];
                    $strDescripcion = strClean($_POST['descripcionIg']);
                    if($intEgreso !=0 )
                    {
                        //crear
                        $request_Egresos = $this->model->insertIngresos($strNombre,$intCantidad,$intPrecio, $strDescripcion);
                        $option = 1;
                    }else{
                        //Actualizar
                        $request_Egresos = $this->model->updateIngresos($strNombre,$intCantidad,$intPrecio, $strDescripcion);
                        $option = 2;
                    }
                    if($request_Egresos > 0)
                    {
                    if($option == 1)
                    {   
                        $arrResponse = array('status'=> true, 'msg' => 'Datos guardados correctamente');
                    }else{
                        $arrResponse = array('status'=> true, 'msg' => 'Datos Actualizados correctamente');
                    }   
                        $arrResponse = array('status'=> true, 'msg' => 'Datos guardados correctamente'); 

                    }else if($request_Egresos == 'exist'){
                        $arrResponse = array('status' => false, 'msg' => 'Atencion! el Egreso ya existe.');
                    }else{
                        $arrResponse = array("status" => false, "msg" => 'No es posible almacenar los datos.');
                    }
                }
                echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        public function getIngresos()
		{
			if($_SESSION['permisosMod']['r']){
				$arrData = $this->model->selectIngresos();

                
                for ($i=0; $i < count($arrData); $i++) {
					$btnView = '';
                    $btnEdite = '';
                    $btnEditi = '';
					$btnDelete = '';


					if($_SESSION['permisosMod']['r']){
						$btnView = '<button class="btn btn-info btn-sm btnViewIgresos" onClick="fntViewInfoI('.$arrData[$i]['id_ingreso'].')" title="Ver ingresos"><i class="far fa-eye"></i></button>';
					}          
					/*if($_SESSION['permisosMod']['d']){
							$btnDelete = '<button class="btn btn-danger btn-sm btnDelIngresos" onClick="fntDelInfoI('.$arrData[$i]['id_ingreso'].')" title="Eliminar ingresos"><i class="far fa-trash-alt"></i></button>';
					}*/
					$arrData[$i]['options'] = '<div class="text-center">'.$btnView.' '.$btnEdite.' '.$btnEditi.' '.$btnDelete.'</div>';
				}
				echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
			}
			die();
		}

        public function getIngreso(int $idingreso)
        {
            $intIdingreso = intval($idingreso);
            if ($intIdingreso > 0)
            {
                $arrData = $this->model->selectIngreso($intIdingreso);
                if(empty($arrData))
                {
                    $arrResponse = array('status' => false, 'msg' => 'Datos no encontrados.');
                }else{
                    $arrResponse = array('status' => true, 'data' => $arrData);
                }
                echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
            }
            die();
        }

        




    }

    
?>