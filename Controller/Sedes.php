<?php
	ob_start();
    //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
    //mostrando la lista de convenios  
    class Sedes extends Controllers
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
      
        //EN ESTA FUNCION OBTENEMOS LAS FUNCIONES DE JS Y LE DAMOS UN NOMBRE A LA PAGINA
        public function sedes() 
        {
            $data['page_name']="sede_carrera";
            $data['page_functions_js']="funciones_sedes.js";
            
            $this->views->getView($this, "Listar",$data);
        }
        
        //obteniendo datos desde la BD

        public function getSelectSedes()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectSedes();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0"> --SELECCIONE UNA SEDE-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_sedes'].'">'.$arrData[$i]['sede'].'</option>';

                    }
                }
            }
            echo $htmlOptions;
        }



        //LISTA LAS SEDES Y PONE LOS BOTONES EN LA COLUMNA ACCIONES
        public function getObtenerDatosSedes()
        { 
            $arrData = $this->model->selectSedes();
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
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarSedes('.$arrData[$i]['id_sedes'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarSedes('.$arrData[$i]['id_sedes'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 

        public function insertar()
        {
            //guardar las variables 
            $idSede = $_POST['idSede'];
            $sede = strtoupper($_POST['sede']);
            $descripcion = strtoupper($_POST['descripcion']);
            $direccion = strtoupper($_POST['direccion']);
            //$status = $_POST['status'];  no recuperable
            if(empty($sede) || empty($direccion))
            {
                $alert='vacio';
            }
            else 
            {
                if(empty($idSede))
                {
                    //insertar
                    $resp_insertar = $this->model->insertarSedes($sede, $descripcion,$direccion);
                    $alert=($resp_insertar)?'registrado':'error';
                }
                else 
                {
                    //actualizar 
                    $resp_actualizar = $this->model->actualizarSedes($idSede, $sede, $descripcion,$direccion);
                    $alert=($resp_actualizar)?'modificado':'error';
                }
             
            }
        
            header("location: " . base_url() . "Sedes?msg=$alert");
         
        }

        public function editar(int $idSede)
        {
            $id = intval($idSede);
            $arrData = $this->model->selectSede($id);
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
            $arrData = $this->model->selectSedeInactivos();
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
            $arrData = $this->model->reingresarSede($id);
            $alert=($arrData)?'reingresar':'error';
            
            $data = $this->model->selectSedes();
            header("location: " . base_url() . "Sedes?msg=$alert");

        }
        /*
        public function actualizar()
        { 
           // $idConvenio = intval($_POST['idConvenio']);
           $idSede = $_POST['idSede']; 
           $sede = $_POST['sede'];
           $descripcion = $_POST['descripcion'];
            
            //$status = $_POST['status'];
            
            //$actualizar = $this->model->actualizarConvenios($idConvenio,$codigo, $empresa, $sede, $fechaInicio, $fechaFinal);
            $actualizar = $this->model->actualizarTipoConvenios($sede,$descripcion, $idSede);
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
            $data = $this->model->selectTipoConvenios();
            header("location: " . base_url() . "TipoConvenios/Listar?msg=$alert");
            die();
        }
        */
        public function eliminar()
        {
            $id = intval($_POST['idSede']);

            $eliminar = $this->model->eliminarSedes($id);
            
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