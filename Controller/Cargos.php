<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
	ob_start();
    class Cargos extends Controllers
    {  
        

        public function __construct()
        {
            session_start();
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            parent::__construct();
        }
      
        public function cargos() 
        {
            $data['page_name']="cargos_administrativos";
            $data['page_functions_js']="funciones_cargo.js";
            
            $this->views->getView($this, "Listar",$data);
        }


        public function getSelectCargos()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectCargos();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0"> --SELECCIONE UN CARGO-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_cargo'].'">'.$arrData[$i]['nombre_cargo'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }

        public function getObtenerCargos()
        { 
            $arrData = $this->model->selectCargos();
            for($i=0; $i<count($arrData); $i++)
            {  
                $btn_editar = '';
                $btn_eliminar = '';
    
                if($arrData[$i]['status']==1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>'; 
                }
                else 
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>'; 
                }
                if($_SESSION['permisosMod']['u'])
                {
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarCargo('.$arrData[$i]['id_cargo'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarCargo('.$arrData[$i]['id_cargo'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 


        public function insertar()
        {
             //guardar las variables 
            $idCargo = $_POST['idCargo']; 
            $cargo = trim($_POST['cargo']);
            $cargo = ucwords($cargo);
            if(empty($idCargo))
            {	if(empty($cargo))
				{
					$alert="vacio";
				}
				else 
				{
					
					//insertar
					$resp_insertar = $this->model->insertarCargos($cargo);
					$alert=($resp_insertar)?'registrado':'error';
				}
            }
            else
            {
               //actualizar 
               $resp_actualizar = $this->model->actualizarCargos($cargo, $idCargo);
               $alert=($resp_actualizar)?'modificado':'error'; 
            }
            $data = $this->model->selectCargos();
            header("location: " . base_url() . "Cargos?msg=$alert");
            die();
        }

        /*
        public function eliminar($idCargo)
        {
            $id = $_GET['idCargo'];
            $eliminar = $this->model->eliminarCargos($id);
            $data = $this->model->selectCargos();
            header("location: " . base_url() . "Cargos/Listar");
            die();
        
        }
    */

       

        public function editar(int $idCargo)
        {
            $id = intval($idCargo);
            $arrData = $this->model->editarCargos($id);
            
            if(!$arrData)
            {
                $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );
            } 
            else 
            {
                $arrResponse =  array('status'=>true, 'data' => $arrData );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE ); 
        }

        /*
        public function actualizar()
        { 
           // $idCargo = intval($_POST['idCargo']);
           $idCargo = $_POST['idCargo']; 
           $nombreCargo = $_POST['cargo'];
            
            //$actualizar = $this->model->actualizarConvenios($idCargo,$codigo, $empresa, $tipoConvenio, $fechaInicio, $fechaFinal);
            $actualizar = $this->model->actualizarCargos($nombreCargo, $idCargo);
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
            $data = $this->model->selectCargos();
            header("location: " . base_url() . "Cargos/Listar?msg=$alert");
            die();
        }
        */
        public function eliminados()
        {   
            $arrData = $this->model->selectCargosInactivos();
            for($i=0; $i<count($arrData); $i++)
            {   if($arrData[$i]['status']!=1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>'; 
                }
                else 
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>'; 
                }
               
            }
            $this->views->getView($this,"Eliminados",$arrData,"");//se pasa las variables mediate el getview
        }

        public function reingresar()
        {
            $id = intval($_GET['id']);
            $arrData = $this->model->reingresarCargo($id);
            $alert=($arrData)?'reingresar':'error';
            
            $data = $this->model->selectCargos();
            header("location: " . base_url() . "Cargos?msg=$alert");

        }
        
        public function eliminar()
        { 
            $id = intval($_POST['idCargo']);
           
            $eliminar = $this->model->eliminarCargos($id);
    
            if($eliminar)
            {
                $alert =  array('status'=>true, 'msg' => "Se elimino el Cargo" );
            }
            else 
            {
                $alert = array('status'=>true, 'msg' => "No se elimino el Cargo" );
            }     
            echo json_encode($alert, JSON_UNESCAPED_UNICODE);
        }
    }          
?>