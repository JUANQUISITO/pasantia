<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de convenios  
    class Carreras extends Controllers
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
      
        public function carreras() 
        {
            $data['page_name']="carrera_sede";
            $data['page_functions_js']="funciones_carreras.js";
            
            $this->views->getView($this, "Listar",$data);
        }
        
        //obteniendo datos desde la BD
        
        public function getSelectCarreras()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectCarreras();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0">--SELECCIONE UNA CARRERA-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {

                    
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_carrera'].'">'.$arrData[$i]['carrera'].'</option>';

                    }
                }
            }
            echo $htmlOptions;
        }

        public function getSelectCarrerasPublicaciones()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectCarreras();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0">--SELECCIONE UNA CARRERA-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {

                    
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_carrera'].'">'.$arrData[$i]['carrera'].'</option>';

                    }
                }
            }
            echo $htmlOptions;
        }

        public function getObtenerCarreras()
        { 
        $arrData = $this->model->selectCarreras();
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
                $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarCarreras('.$arrData[$i]['id_carrera'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }
            if($_SESSION['permisosMod']['d'])
            {
                $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarCarreras('.$arrData[$i]['id_carrera'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
            }
            $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 

        public function insertar()
        {
            //guardar las variables 
            $idCarrera = $_POST['idCarrera'];
            $carrera = $_POST['carrera'];
            $descripcion = $_POST['descripcion'];
            //$status = $_POST['status'];  no recuperable
            if(empty($idCarrera))
            {
                //insertar
                $resp_insertar = $this->model->insertarCarreras($carrera, $descripcion);
                $alert=($resp_insertar)?'registrado':'error';
            }
            else 
            {
                //actualizar 
                $resp_actualizar = $this->model->actualizarCarreras($idCarrera, $carrera, $descripcion);
                $alert=($resp_actualizar)?'modificado':'error';
            }
            $data = $this->model->selectCarreras();
            header("location: " . base_url() . "Carreras?msg=$alert");
            die();
        }

        public function editar(int $idCarrera)
        {
            $id = intval($idCarrera);
            $arrData = $this->model->selectCarrera($id);
            if(!$arrData)
            {
                $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );// status q se muestra en js obj.data
            }
            else 
            {
                $arrResponse =  array('status'=>true, 'data' => $arrData );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE ); 
        }
      
        public function eliminados()
        {   
            $arrData = $this->model->selectCarreraInactivos();
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
            $arrData = $this->model->reingresarCarrera($id);
            $alert=($arrData)?'reingresar':'error';
            
            $data = $this->model->selectCarreras();
            header("location: " . base_url() . "Carreras?msg=$alert");

        }

        public function eliminar()
        {
            $id = intval($_POST['idCarrera']);

            $eliminar = $this->model->eliminarCarreras($id);
            
            if($eliminar)
            {
                $alert =  array('status'=>true, 'msg' => "Se elimino el tipo de convenio" );
            }
            else 
            {
                $alert = array('status'=>true, 'msg' => "No se elimino el tipo de convenio" );
            }     
            echo json_encode($alert, JSON_UNESCAPED_UNICODE);
        }
    }          
?>