<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
	ob_start();
    class Publicaciones extends Controllers
    {  
        public function __construct()
        {
            session_start();
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            parent::__construct();
			getPermisos(16);
        }
    
        public function publicaciones()
        {   
            $data['page_name']="publicaciones_pasantias";
            $data['page_functions_js']="funciones_publicaciones.js";
            
            $this->views->getView($this, "Listar",$data);
        }
        
        public function getSelectPublicaciones()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectPublicaciones();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_convocatoria'].'">'.$arrData[$i]['titulo'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }
        
        //ESTA FUNCION LISTA LAS PUBLICACIONES
        public function getObtenerPublicaciones()
        { 
            $arrData = $this->model->selectPublicaciones();
            for($i=0; $i<count($arrData); $i++)
            {  
                $btn_editar = '';
                $btn_eliminar = '';
                $btn_ver = '';

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
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="editarPublicacion('.$arrData[$i]['id_convocatoria'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="eliminarPublicacion('.$arrData[$i]['id_convocatoria'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['r'])
                {
                    $btn_ver = '<button class="btn btn-warning btn-sm" onClick="verPublicacion('.$arrData[$i]['id_convocatoria'].')" title="Ver"><i class="bi bi-eye-fill"></i></button>';
                }
                $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.' '.$btn_ver.' </div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 

        public function ListarForm()
        { 
            $arrData = $this->model->selectPublicaciones();

            for($i=0;$i<count($arrData); $i++)
            {
                if($arrData[$i]['status']==1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo<span>';
                }else
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo<span>';
                }
            }           
            $this->views->getView($this, "Formulario",$arrData,"");  
        } 

        public function insertar()
        {
           
             //guardar las variables 
            $idPublicacion = $_POST['idPublicacion']; 
            $titulo = $_POST['titulo'];
            $institucion = $_POST['institucion'];
            $cantPasantes = $_POST['cantPasantes'];
            $remuneracion = $_POST['remuneracion'];
            $beneficios = $_POST['beneficios'];
            $tiempoPasantia = $_POST['tiempoPasantia'];
            $descripcion = $_POST['descripcion'];
            $area = $_POST['area'];
            $contacto = $_POST['contacto'];
            $telContacto = $_POST['telContacto'];
            $fechaLimite = $_POST['fechaLimite'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
			
            if(empty($titulo) || empty($cantPasantes) || empty($institucion) || empty($area) )
            {
                $alert = 'completar';
            }else 
            {
                if(empty($idPublicacion))
                {
                    //insertar
                    $resp_insertar = $this->model->insertarPublicaciones($titulo, $institucion, $cantPasantes, $remuneracion, $beneficios, $tiempoPasantia, $descripcion,$area, $fechaLimite, $fechaPublicacion ,$contacto,$telContacto);
                    $alert=($resp_insertar)?'registrado':'error';
                }
                else
                {
                   //actualizar 
                   $resp_actualizar = $this->model->actualizarPublicaciones($titulo, $institucion, $cantPasantes, $remuneracion, $beneficios, $tiempoPasantia, $descripcion,$area, $fechaLimite, $fechaPublicacion,$contacto,$telContacto, $idPublicacion );
                   $alert=($resp_actualizar)?'modificado':'error'; 
                }
            }
            header("location: " . base_url() . "Publicaciones?msg=$alert");
            die();
        }

        public function eliminados()
        {
            $arrData = $this->model->selectPublicacionesEliminados();
            for($i=0;$i<count($arrData); $i++)
            {
                if($arrData[$i]['status'] ==1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo<span>';
                }else
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo<span>';
                }
            }
            $this->views->getView($this,"Eliminados",$arrData);
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
            $data = $this->model->selectPublicaciones();
            header("location: " . base_url() . "Publicaciones?msg=$alert");

        }

        /*
        public function eliminar() //al momento de eliminar se debe usar el metodo get en php
        { 
            $idPublicacion = intval($_POST['idPublicacion']);
            $result = $this->model->eliminarPublicaciones($idPublicacion);
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado la publicacion' );
            }
            else 
            {
                $arrResponse = array('status' =>true, 'msg'=> 'No se elimino la publicacion' );
            }
            $data = $this->model->selectPublicaciones();
           echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        
        */

        
        public function verPubli()
        { 
           // $idPublicacion = intval($_POST['idPublicacion']);
            $idPublicacion = $_POST['idPublicacion']; 
            $titulo = $_POST['titulo'];
            $institucion = $_POST['institucion'];
            // = $_POST['tipoPasantia'];
            $area = $_POST['area'];
            $cantPasantes = $_POST['cantPasantes'];
            $remuneracion = $_POST['remuneracion'];
            $beneficios = $_POST['beneficios'];
            $tiempoPasantia = $_POST['tiempoPasantia'];
            $descripcion = $_POST['descripcion'];
            $area = $_POST['area'];
            $fechaLimite = $_POST['fechaLimite'];
            $fechaPublicacion = $_POST['fechaPublicacion'];
            
            //$actualizar = $this->model->actualizarConvenios($idPublicacion,$codigo, $empresa, $tipoConvenio, $fechaInicio, $fechaFinal);
        
            $data = $this->model->selectCargos();
            //header("location: " . base_url() . "Publicaciones/Listar?msg=$alert");
            die();
        }
        

        public function editar(int $idPublicacion)
        {
   
            $id = $idPublicacion;         
            
            $arrData = $this->model->selectPublicacion($id);
            if(!$arrData)
            {
                $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );
            }
            else {
                $arrResponse =  array('status'=>true, 'data' => $arrData );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE ); 
        }

        public function ver(int $idPublicacion)
        {
   
            $id = $idPublicacion;
            $arrData = $this->model->selectPublicacion($id);
            if(!$arrData)
            {
                $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );
            }
            else {
                $arrResponse =  array('status'=>true, 'data' => $arrData );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE ); 
        }
        
        public function eliminar()
        { 
            $id = intval($_POST['idPublicacion']);
           
            $eliminar = $this->model->eliminarPublicaciones($id);
    
            if($eliminar)
            {
                $alert =  array('status'=>true, 'msg' => "Se elimino la publicacion" );
            }
            else 
            {
                $alert = array('status'=>true, 'msg' => "No se elimino la publicacion" );
            }     
            echo json_encode($alert, JSON_UNESCAPED_UNICODE);
        }
    }          
?>