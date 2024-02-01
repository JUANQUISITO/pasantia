<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de CarreraSede  
	ob_start();
    class CarreraSede extends Controllers
    {  
        

        public function __construct()
        {
            session_start();
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            parent::__construct();
            getPermisos(6);

        }

        public function carreraSede() 
        {
            $data['page_name']="carreras_sedes";
            $data['page_functions_js']="funciones_carrera_sede.js";
            
            $this->views->getView($this, "Listar",$data);
        }
      
        public function getSelectCarreraSedes()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectCarreraSedes();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0">--SELECCIONE lA CARRERA - SEDE-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_carrera_sede'].'">'.$arrData[$i]['carrera_id_carrera'].''.$arrData[$i]['sedes_id_sedes'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }

        public function getSelectCarreraSedesAdministrativos()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectCarreraSedes();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_carrera_sede'].'">'.$arrData[$i]['carrera'].'-'.$arrData[$i]['sede'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }

        public function getSelectCarreraSedesUsuarios()
        {
            $htmlOptions ="";
            //print_r('hola');
            $arrData = $this->model->selectCarreraSedesUsuarios();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0"> -- SELECCIONE LA CARRERA SEDE -- </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_carrera_sede'].'">'.$arrData[$i]['carrera'].' - '.$arrData[$i]['sede'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }

        public function getSelectCarreraSedesDocentes()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectCarreraSedes();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0">SELECCIONE LA CARRERA A ADMINISTRAR </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_carrera_sede'].'">'.$arrData[$i]['carrera'].'-'.$arrData[$i]['sede'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }

        public function getObtenerCarreraSedes()
        { 
            $arrData = $this->model->selectCarreraSedes();
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
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarCarreraSede('.$arrData[$i]['id_carrera_sede'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarCarreraSede('.$arrData[$i]['id_carrera_sede'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 

        public function eliminados()
        {   
            $arrData = $this->model->selectCarreraSedesEliminados();
            for($i=0; $i<count($arrData); $i++)
            {   if($arrData[$i]['status']==1)
                {
                    
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>'; 
                }
                else 
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>';  
                }
               
            }
            $this->views->getView($this,"Eliminados",$arrData,"");//se pasa las variables mediate el getview
        }

        public function insertar()
        {
			
            if($_POST)
            {
                
				$idCarreraSede = $_POST['idCarreraSede'];
                $nombreCarrera = $_POST['nombreCarrera'];
                $nombreSede = $_POST['nombreSede'];
                if(empty($idCarreraSede))
				{
					if(empty($nombreCarrera) || empty($nombreSede))
					{
						$alert='vacio';
					}
					else
					{
						
						$insert = $this->model->insertarCarreraSedes( $nombreCarrera, $nombreSede);
						if ($insert > 0) {
							$alert = 'registrado';
						} else if ($insert == "existe") {
							$alert = 'existe';
						} else {
							$alert = 'error';
						}  
						
						
					}
				}					
				else
				{
					
					$actualizar = $this->model->actualizarCarreraSedes( $nombreCarrera, $nombreSede, $idCarreraSede);
					if ($actualizar == 1) {
						$alert = 'modificado';
					} else {
						$alert =  'error';
					}
					
				}					
               
            }
             
       
            header("location: " . base_url() . "CarreraSede?msg=$alert");
           
        }

        
        public function eliminar() //al momento de eliminar se debe usar el metodo get en php
        { 
            $idCarreraSede = intval($_POST['idCarreraSede']);
            $result = $this->model->eliminarCarreraSedes($idCarreraSede);
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el Convenio' );
            }
            else 
            {
                $arrResponse = array('status' =>true, 'msg'=> 'No se elimino el Convenio' );
            }
            $data = $this->model->selectCarreraSedes();
           echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }


        public function editar(int $idCarreraSede)
        {   
            $idCarreraSede = $idCarreraSede;
            $arrData = $this->model->selectCarreraSede($idCarreraSede);
            if(!$arrData)
            {
                $arrData = array('status'=>true,'msg'=>'no se encontro datos');
            }
            else 
            {
                $arrData = array('status'=>true,'data'=> $arrData);
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        }

        public function reingresar()
        {
            $id = intval($_GET['id']);
            $reingresar = $this->model->reingresar($id);
            if($reingresar)
            {
                $alert = "reingresar";
            }
            else 
            {
                $alert = "error";
            }
            $data = $this->model->selectCarreraSedes();
            header("location: " . base_url() . "CarreraSede?msg=$alert");

        }


     
    }          
?>