<?php
    ob_start();
    class Estudiantes extends Controllers
    {
		
        public function __construct()
        {
            parent::__construct();

            session_start();
        
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            getPermisos(3);
        }

        public function estudiantes()
        {
            $data['page_name']="Estudiantes";
            $data['page_functions_js'] = "functions_estudiantes.js";
            //$data['page_functions_js'] = "funciones_sedes.js";
            $this->views->getView($this, "Listar",$data);
        }

        public function getStudents()
        { 
            $id_carrera_sede="";
            if(!empty($_SESSION["idCarreraSede"])){
                $id_carrera_sede = $_SESSION["idCarreraSede"];
            } 
            $id_carrera = trim($_POST['id_carrera']);
            $id_sede = trim($_POST['id_sede']);

        // var_dump($id_carrera_sede);
        // exit();
            $arrData = $this->model->selectEstudiantes($id_carrera, $id_sede, $id_carrera_sede);
           for($i=0; $i<count($arrData); $i++)
            {   
                $btn_editar = '';
                $btn_eliminar = '';
                $btn_solicitar = '';

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
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_estudiante'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="fntEliminar('.$arrData[$i]['id_estudiante'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['r'])
                {
                    $btn_solicitar = '<button class="btn btn-success btn-sm" onClick="fntSolicitud('.$arrData[$i]['id_estudiante'].')" title="Solicitar"><i class="fas fa-file-alt"></i></button>';
                }
                
                $arrData[$i]['options']= '<div class="text-center">'.$btn_solicitar.' '.$btn_editar.' '.$btn_eliminar.'</div>';

            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 
        
        public function insertar()
        {
          
            $idEstudiante = intval($_POST['idEstudiante']);
            $idPersona = intval($_POST['idPersona']);
            $nombres = trim(strtoupper( $_POST['nombres']));
            $apellido_pat = trim(strtoupper( $_POST['apellidoPat']));
            $apellido_mat = trim(strtoupper( $_POST['apellidoMat']));
            $nrocarnet = trim(strtoupper( $_POST['carnet']));
            $nromatricula = trim(strtoupper( $_POST['nroMatricula']));
            $telefono = trim(strtoupper( $_POST['telefono']));
            $direccion = trim(strtoupper( $_POST['direccion']));
            $listCarreraSede = $_POST['listCarreraSede'];
          

            if(empty($nrocarnet)  || empty($nromatricula)|| empty($listCarreraSede))
            { 
                $arrData = array('status'=>false, 'msg'=>'error');  
            }
            else 
            {
				 
                $option = 0 ;
				  //1. insertar a la tabla USUARIO y asignarle un usuario y contraseña por DEFECTO (capturar el "id_persona") ej_usuario =GYH10902302    -   ej_contraseña=GYH10902302
				$usuario = substr($nombres,0,1).substr($apellido_pat,0,1).substr($apellido_mat,0,1).$nrocarnet;
				$contrasenia = password_hash($usuario,PASSWORD_DEFAULT);
                
				if(empty($idEstudiante))
                {
                    //consulta a la base de datos con el item ESTUDIANTE a la tabla ROL capturar el id_rol=ESTUDIANTE
                    
                    $rol = 'ESTUDIANTE';
                    $encontrarIdRol = $this->model->encontrarRoles($rol);
                    if(!$encontrarIdRol)
                    {
                        // var_dump($encontrarIdRol."ddd");\
                        $arrData = array('status'=>false, 'msg'=>'error');
                        echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                        die();
                    }
                    
                    //el encontrar Rol Id DEVUELVE COMO UN ARRAY  se devuelve con array[] se modifica a string y al final con intval a un entero
                    
                    $encontrarIdRol = intval($encontrarIdRol['id_rol']);
                    
                    $idUsuarioUltimo = $this->model->crearCuentaEstudiante($usuario,$contrasenia,$encontrarIdRol);
                    //2. insertar a la tabla PERSONA
                    if (!$idUsuarioUltimo) // si resultado no es verdadero
                    {
                        $arrData = array('status'=>false, 'msg'=>'error');  
                    }
                   
                    $resultadoUltimoDatoEstudiante = $this->model->insertarDatosEstudiante($idUsuarioUltimo, $nombres, $apellido_pat, $apellido_mat, $nrocarnet, $telefono, $direccion);

                    // print_r($resultadoDatosEstudiante);
                    //3. insertar a la tabla ESTUDIANTE        
                    // exit;

                    if (!$resultadoUltimoDatoEstudiante) // si resultado no es verdadero
                    {
                        $arrData = array('status'=>false, 'msg'=>'error');  
                    }
                    
                    $requestEstudiante = $this->model->insertarEstudiantes($resultadoUltimoDatoEstudiante, $listCarreraSede, $nromatricula);
                    $option = 1;
                    
                }
                else 
                {
                    //actualizar 
                  
                    $requestEstudiante = $this->model->actualizarDatosEstudiante($idPersona, $nombres, $apellido_pat, $apellido_mat, $nrocarnet, $telefono, $direccion);
                    $listCarreraSede = intval($_POST['listCarreraSede']);
                    $requestEstudiante = $this->model->actualizarEstudiantes($idEstudiante, $listCarreraSede, $nromatricula);
                    $option = 2;

                }
                if($requestEstudiante)
                {
                    if($option == 1)
                    {
                        $arrData = array('status'=>true, 'msg'=>'dato registrado correctamente');  
                    }
                    else 
                    {
                        $arrData = array('status'=>true,'msg'=> 'dato actualizado correctamente');
                    }
                }
                else 
                {
                    
                        $arrData = array('status'=>false,'msg'=> 'no se pudo actualizar');
                    
                }
                
            }
           
    
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
        public function VerificarSolicitudEstudiante()
        {
            $idEstudiante =  trim($_POST['id_estudiante']);
            //consulta de verificacion a la tabla persona y estudiante
            $resp = $this->model->VerificarSolicitudEstudiante($idEstudiante);
            if(!empty($resp)){
                $resultado = $resp;
            } else {
              
                $resultado = ["id_estudiante" => $idEstudiante];
            }
            echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
    
        }
        public function crearsolicitud()
        {
            $idEstudiante = intval($_POST['idEstudiante']);
            $idSolicitud = intval($_POST['idSolicitud']);
            $codigo = htmlentities($_POST['codigo']);
            $fechaInicio = htmlentities($_POST['fechaInicio']);
            $fechaConclusion = htmlentities($_POST['fechaConclusion']);
            $tiempoduracion = htmlentities($_POST['tiempoduracion']);
            $Observaciones = htmlentities($_POST['Observaciones']);
            $cargoPracticante = htmlentities($_POST['cargoPracticante']);
            $mensaje = htmlentities($_POST['mensaje']);
            $nombreEmpresa = htmlentities($_POST['nombreEmpresa']);
            $Telefono = htmlentities($_POST['Telefono']);
            $Fax = htmlentities($_POST['Fax']);
            $nombreDestinatario = htmlentities($_POST['nombreDestinatario']);
            $cargoDestinatario = htmlentities($_POST['cargoDestinatario']);
            $direccion = htmlentities($_POST['direccion']);

            
            exit();
        }
        /*CONTAR ESTUDIANTES*/

        public function contar()
        {
            $data = $this->model->selectEstudiantes();

            // $num = 
            
            // alert($num); 


        }
        
        /******** */
        public function VerificarEstudiante()
        {
            $nro_carnet =  trim($_POST['nro_carnet']);
            //consulta de verificacion a la tabla persona y estudiante
            $resp = $this->model->VerificarEstudiante($nro_carnet);
            if(!empty($resp)){
                $resultado = $resp;
            } else {
                //$resultado = $nro_carnet;
                $resultado = ["nro_carnet" => $nro_carnet];
            }
            echo json_encode($resultado,JSON_UNESCAPED_UNICODE);

        }
        public function eliminar()
        {   
            $id = $_POST['idEstudiante'];
            $eliminar = $this->model->eliminarEstudiantes($id);
            if($eliminar)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el estudiante' );
            }
            else 
            {
                $arrResponse = array('status' =>false, 'msg'=> 'tuvimos un error al eliminar' );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

    
        public function editar($idEstudiante)
        {
            $id = $idEstudiante;
            $arrData = $this->model->editarEstudiantes($id);
            if(!$arrData)
            {
                $arrData = array('status'=>false,'msg'=>'no se encontro datos');
            }
            else 
            {
                $arrData = array('status'=>true,'data'=> $arrData);
            }
            echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
        }
 
        public function reingresar()
        {
            $id = intval($_GET['id']);
            $arrData = $this->model->reingresarEstudiante($id);
            $alert=($arrData)?'reingresar':'error';
            $data = $this->model->selectEstudiantes($id_carrera, $id_sede, $id_carrera_sede);
            header("location: " . base_url() . "Estudiantes/estudiantes?msg=$alert");
        }
        
        public function eliminados()
        {   
			$id_carrera_sede="";
			$id_carrera="";
			$id_sede ="";
            if(!empty($_SESSION["idCarreraSede"])){
                $id_carrera_sede = $_SESSION["idCarreraSede"];
            } 
			
           if(isset($_POST['id_carrera']))
			   
			   {
				  $id_carrera =  $_POST['id_carrera']; 
			   }
			   
			 if(isset($_POST['id_sede']))
			   
			   {
				   $id_sede = trim((string) $_POST['id_sede']); 
			   }
           
           
			
            $arrData = $this->model->selectEstudiantesInactivos($id_carrera, $id_sede, $id_carrera_sede);
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

        //INGRESO A LA LISTA DE ESTUDIANTES DE LAS DIFERENTES CARRERAS
        public function Listar_carreras()
        { 
            $this->views->getView($this, "Cards");  
        } 
    }
?>