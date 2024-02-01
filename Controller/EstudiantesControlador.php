<?php
    class EstudiantesControlador extends Controllers
    {

        public function __construct()
        {
            parent::__construct();

            session_start();
        
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."home");
            }
        }

        public function MenuEstudiante()
        {
            $data['page_name']="Estudiantes";
            $data['page_functions_js'] = "functions_estudiantes.js";
            
            $this->views->getView($this, "DashboardEstudiantes",$data);
        }

        public function estudiantesListar()
        {
            $data['page_name']="Estudiantes";
            $data['page_functions_js'] = "functions_estudiantes.js";
            
            $this->views->getView($this, "MenuEstudiante",$data);
        }

        public function getStudents()
        { 
            
            //$filter_data = $_POST['filter_data'];
            //echo $filter_data.' controlador';exit;
            //$algo = parse_str($filter_data, $nro_carnet);

            $id_carrera = trim($_POST['id_carrera']);
            $id_sede = trim($_POST['id_sede']);
            $arrData = $this->model->selectEstudiantes($id_carrera, $id_sede);
           for($i=0; $i<count($arrData); $i++)
            {   
                if($arrData[$i]['status']==1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo</span>'; 
                }
                else 
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo</span>'; 
                }
                $arrData[$i]['options']= '<div class="text-center">
                <button class="btn btn-success btn-sm" onClick="fntSolicitud('.$arrData[$i]['id_estudiante'].')" title="Solicitar"><i class="fas fa-file-alt"></i></button>
                <button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_estudiante'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                                    </div>';

            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
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
   
        //INGRESO A LA LISTA DE ESTUDIANTES DE LAS DIFERENTES CARRERAS
        public function Listar_carreras()
        { 
            $this->views->getView($this, "Cards");  
        } 

         //CONTROLADORES PARA EL DASHBOARD ESTUDIANTE*/

      //MOSTRANDO EL DASHBOARD
      public function mostrarAdministrador() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
      {
            
          $this->views->getView($this, "DashboardEstudiantes");
      }
      
      //MOSTRANDO ENLACES DENTRO DEL DASHBOARD
      public function mostrarDashboard() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
      {
            
          $this->views->getView($this, "Home/DashboardEstudiantes");
      }

      public function mostrarCharts() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
      {
            var_dump("1");
          $this->views->getView($this, "Menus/charts");
      }

      public function mostrarEstudiante() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
      {
            
          $this->views->getView($this, "Menus/MenuPrincipal");
      }
      
    

        /*========================================================================
        =========================================================================
                            
                        CONTROLADORES DE PUBLICACIONES      

        =========================================================================*/

        
        public function ListarPublicaciones()
        { 
            $arrData = $this->model->selectPublicacionesEstudiantes();

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
            $this->views->getView($this, "publicacionesEstudiantes",$arrData,"");  
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
        
            $data = $this->model->selectPublicaciones();
            header("location: " . base_url() . "Publicaciones/Listar?msg=$alert");
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
            header("location: " . base_url() . "Publicaciones/Listar?msg=$alert");

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

        /*===========================================================================================
                                    CONTROLES SOLICITUD DE PASANTIA 
        =============================================================================================*/
    
        /*
        public function solicitudPasantiasEstudiantes()
        {   
            $data['page_id'] = 4;
            $data['page_title'] = "Pagina Solicitud Pasantias";
            $data['page_name'] = "solicitud pasantias"; 
            $data['page_functions_js']="functions_solicitud.js";
            $this->views->getView($this, "solicitarPasantia", $data);
        }

                public function MenuEstudiante()
            {
                $data['page_name']="Estudiantes";
                $data['page_functions_js'] = "functions_estudiantes.js";
                
                $this->views->getView($this, "DashboardEstudiantes",$data);
            }

        public function getSolicitud()
        {  
            $id_carrera = trim($_POST['id_carrera']);
            $id_sede = trim($_POST['id_sede']);
            $arrData = $this->model->selectSolicitudPasantias($id_carrera, $id_sede);
            for($i = 0; $i<count($arrData); $i++)
            {   

                if($arrData[$i]['status']==1)
                {
                    $arrData[$i]['status']='<span class="badge badge-success">Vigente</span>'; 
                }
                else 
                {
                $arrData[$i]['status']= '<span class="badge badge-danger">Inactivo</span>'; 
                }
                $arrData[$i]['options'] ='<div class="text-center">
                <button class="btn btn-secondary btn-sm" onClick="fntRecibir('.$arrData[$i]['id_solicitud'].')" title="Recibir" id="btn_recibir"><i class="fas fa-cloud-download-alt"></i></button>
                <button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_solicitud'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                <button class="btn btn-danger btn-sm" onClick="fntEliminar('.$arrData[$i]['id_solicitud'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                <button class="btn btn-success btn-sm" onClick="fntVerificar('.$arrData[$i]['id_solicitud'].')" title="Verificar"  ><i class="fas fa-file-alt"></i></button>
                <button class="btn btn-warning btn-sm" onClick="fntVerSeguimiento('.$arrData[$i]['id_solicitud'].')" title="Ver"><i class="fas fa-envelope"></i></button>
                <button class="btn btn-info btn-sm" onClick="verPdf('.$arrData[$i]['id_solicitud'].')" title="PDF"><i class="fas fa-file-pdf"></i></button>
                                    </div>';
            
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        }

        public function insertarnuevaSolocitidAntigua(int $idestudiante)
        {   
            // var_dump("sol");
            
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

            //doc bachiller
            $nameDocBachiller  = ($_FILES['fottitulobachiller']['name']);//cargar el archivo
            $sizeDocBachiller  = ($_FILES['fottitulobachiller']['size']);
        
            //doc matricula
            $nameMatricula  = ($_FILES['fotocopiamatricula']['name']);//cargar el archivo
            $sizeMatricula  = ($_FILES['fotocopiamatricula']['size']);
            
            $mensaje = htmlentities($_POST['mensaje']);
            
            $new_name_file1 = null;
            $new_name_file2 = null;
    
            $limite_kb = 4000000;
            $ruta = 'Assets/pdfs/default/anonymous.png';
            if ($sizeDocBachiller <=$limite_kb &&  $sizeMatricula<=$limite_kb ) 
            {            
                if ($nameDocBachiller != '' || $nameDocBachiller != null || $nameMatricula!='' || $nameMatricula!=null )
                {
                    $typeDocBachiller = ($_FILES['fottitulobachiller']['type']);
                    $typeMatricula = ($_FILES['fotocopiamatricula']['type']);
                    list($type, $extension) = explode('/', $typeDocBachiller);
                    $fecha = date("YmdHis");
                    if ($extension == 'pdf') 
                    {
                        $dir = 'Assets/pdfs/'.$codigo."/";
                        if (!file_exists($dir))
                        {
                            mkdir($dir, 0777, true);
                        }
                        
                        $file_tmp_fotbachiller = $_FILES['fottitulobachiller']['tmp_name'];
                        $file_tmp_matricula = $_FILES['fotocopiamatricula']['tmp_name'];

                        $nameDocBachiller= $fecha.$nameDocBachiller;
                        $nameMatricula = $fecha.$nameMatricula;
                        
                        $new_name_file1 = $dir .$this->file_name($nameDocBachiller) . '.' . $extension;
                        $new_name_file2 = $dir .$this->file_name($nameMatricula) . '.' . $extension;
                        
                        copy($file_tmp_fotbachiller, $new_name_file1); 
                        copy($file_tmp_matricula, $new_name_file2);

                    }  
                }
                else
                {
                $alert =  "adjuntar";
                }
            }
            else
            {
                $alert =  "tamano";
            }
        
            if(empty($idSolicitud))
            {
                //insertar
                $resp_insertar = $this->model->insertarSolicitudP($codigo, $fechaInicio, $fechaConclusion, $tiempoduracion, $Observaciones, $cargoPracticante, $mensaje,$nombreEmpresa, $Telefono, $Fax,$direccion,  $nombreDestinatario,   $cargoDestinatario,$new_name_file1,$new_name_file2,$idEstudiante);
                var_dump($resp_insertar); 
                if(empty($resp_insertar))
                {
                    $alert = "error";
                }
                else 
                {
                    //generar codigo de  seguimiento

                    //insertar en la tabla seguimiento
                    $resp_insertarseguimiento = $this->model->insertarSeguimiento($resp_insertar);
                    var_dump($resp_insertarseguimiento);
                    // die(); //
                    // agregar un boton en acciones
                }
                // die();
                if ($resp_insertar > 0) 
                {
                    $alert = 'registrado';
                } else if ($resp_insertar == 'existe') 
                {
                    $alert = 'existe';
                } else 
                {
                    $alert = 'error';
                }
            }
            else 
            {
                //actualizar 
                var_dump("actualizar solicitud<br>");
                $recuperar = $this->model->selectidsolicitud($idSolicitud);
                if(!empty($nameDocBachiller))
                {
                    // $alert = "existe-titulo";
                    unlink($recuperar['fot_titulo_bachiller']);
                    $new_name_file1 = $new_name_file1;
                }
                
                if(!empty($nameMatricula))
                {
                    $alert = 'existe-matricula';
                    unlink($recuperar['fot_matricula']);
                    $new_name_file2 = $new_name_file2;
                }
                else 
                {
                    // $alert = 'no-existe';
                    $new_name_file1 = $recuperar['fot_titulo_bachiller'];
                    $new_name_file2 = $recuperar['fot_matricula'];
                }
            $resp_actualizar = $this->model->actualizarSolicitudP($idSolicitud,$codigo, $fechaInicio, $fechaConclusion, $tiempoduracion, $Observaciones, $cargoPracticante, $mensaje,$nombreEmpresa, $Telefono, $Fax,$direccion,  $nombreDestinatario,   $cargoDestinatario,$new_name_file1,$new_name_file2);
                
                if ($resp_actualizar > 0) 
                {
                    $alert = 'actualizado';
                } else if ($resp_actualizar == 'existe') 
                {
                    $alert = 'existe';
                } else 
                {
                    $alert = 'error';
                }
            }
            $data = $this->model->selectSolicitudPasantias();
            header("location: " . base_url() . "SolicitudPasantias/solicitudPasantias?msg=$alert");
            
        }
    //INSETAR PERO DESDE ESTUDIANTES
        public function insertar()
        {   
        
            //$arrData= "hola desde controlador insertar";

            // $arrData1 = $_POST;
        
            //  $arrData2 = $_FILES;
            // 1. generar el CODIGO de manera automatica = SOL20220001
            $arrData = $this->model->ObtenerCodigoSolicitud();
            
            // var_dump($arrData1);
            // var_dump($arrData2);
                
        
            // $estFottitulobachiller = $_FILES['estFottitulobachiller']['name'];
            // // $estFottitulobachiller = $estFottitulobachiller['name'];
            
            // $estfotocopiamatricula = $_FILES['estfotocopiamatricula']['name'];
            // // $estfotocopiamatricula = $estfotocopiamatricula['name'];
        
            // var_dump($estFottitulobachiller);
            // var_dump($estfotocopiamatricula);


            // $estFottitulobachiller2 = $_FILES['estFottitulobachiller'];
            // $estFottitulobachiller2 = $estFottitulobachiller2['name'];
            
            // $estfotocopiamatricula2 = $_FILES['estfotocopiamatricula'];
            // $estfotocopiamatricula2 = $estfotocopiamatricula2['name'];
        
            // var_dump($estFottitulobachiller2);
            // var_dump($estfotocopiamatricula2);

            // 2. verificar los nombres de los archivos o documentos

            // 3. capturar los datos del formulario y vamos a INSERTAR - ACTUALIZAR

        
            $idSolicitud = intval($_POST['idSolicitud']);
            $codigo = $arrData;
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

            //doc bachiller
            $nameDocBachiller  = $_FILES['estFottitulobachiller']['name']; //cargar el archivo
            $sizeDocBachiller  = $_FILES['estFottitulobachiller']['size'];
        // var_dump($nameDocBachiller);
        // var_dump($sizeDocBachiller);
        // var_dump($codigo);
            //doc matricula
            $nameMatricula  =  $_FILES['estfotocopiamatricula']['name'];//cargar el archivo
            $sizeMatricula  = $_FILES['estfotocopiamatricula']['size'];
            // var_dump($nameMatricula);
            $mensaje = htmlentities($_POST['mensaje']);
            
            $new_name_file1 = null;
            $new_name_file2 = null;
    //    exit();

            $limite_kb = 4000000;
            $ruta = 'Assets/pdfs/default/anonymous.png';
            if ($sizeDocBachiller <=$limite_kb &&  $sizeMatricula<=$limite_kb ) 
            {            
                if ($nameDocBachiller != '' || $nameDocBachiller != null || $nameMatricula!='' || $nameMatricula!=null )
                {
                    $typeDocBachiller = ($_FILES['estFottitulobachiller']['type']);
                    $typeMatricula = ($_FILES['estfotocopiamatricula']['type']);
                    list($type, $extension) = explode('/', $typeDocBachiller);
                    $fecha = date("YmdHis");
                    if ($extension == 'pdf') 
                    {
                        $dir = 'Assets/pdfs/'.$codigo."/";
                        if (!file_exists($dir))
                        {
                            mkdir($dir, 0777, true);
                        }
                        
                        $file_tmp_fotbachiller = $_FILES['estFottitulobachiller']['tmp_name'];
                        $file_tmp_matricula = $_FILES['estfotocopiamatricula']['tmp_name'];

                        $nameDocBachiller= $fecha.$nameDocBachiller;
                        $nameMatricula = $fecha.$nameMatricula;
                        
                        $new_name_file1 = $dir .$this->file_name($nameDocBachiller) . '.' . $extension;
                        $new_name_file2 = $dir .$this->file_name($nameMatricula) . '.' . $extension;
                        
                        copy($file_tmp_fotbachiller, $new_name_file1); 
                        copy($file_tmp_matricula, $new_name_file2);

                    }  
                }
                else
                {
                $alert =  "adjuntar";
                }
            }
            else
            {
                $alert =  "tamano";
            }
    
            if(empty($idSolicitud))
            {
                //insertar
                $idEstudianteSolicitud = intval($_POST['idEstudianteSolicitud']);
                $resp_insertar = $this->model->insertarSolicitudP($codigo, $fechaInicio, $fechaConclusion, $tiempoduracion, $Observaciones, $idEstudianteSolicitud, $cargoPracticante, $mensaje,$nombreEmpresa, $Telefono, $Fax,$direccion,  $nombreDestinatario, $cargoDestinatario, $new_name_file1,$new_name_file2);
            
                if(empty($resp_insertar))
                {
                    $arrData = array('status'=>false, 'msg'=>'error al crear');  
                }
                //generar codigo de  seguimiento
                //insertar en la tabla seguimiento
                $resp_insertarseguimiento = $this->model->insertarSeguimiento($resp_insertar);
                // agregar un boton en acciones
            
                if ($resp_insertar && $resp_insertarseguimiento) 
                {
                    $arrData = array('status'=>true, 'msg'=>'agregado');  
                } else if ($resp_insertar == 'existe') 
                {
                    $arrData = array('status'=>true, 'msg'=>'existe');  
                } else 
                {
                    $arrData = array('status'=>false, 'msg'=>'error');  
                }
            }
            else 
            {
                //actualizar 
                
                $recuperar = $this->model->selectidsolicitud($idSolicitud);
                if(!empty($nameDocBachiller))
                {
                    // $alert = "existe-titulo";
                    unlink($recuperar['fot_titulo_bachiller']);
                    $new_name_file1 = $new_name_file1;
                }
                
                if(!empty($nameMatricula))
                {
                    $alert = 'existe-matricula';
                    unlink($recuperar['fot_matricula']);
                    $new_name_file2 = $new_name_file2;
                }
                else 
                {
                    // $alert = 'no-existe';
                    $new_name_file1 = $recuperar['fot_titulo_bachiller'];
                    $new_name_file2 = $recuperar['fot_matricula'];
                }
            $resp_actualizar = $this->model->actualizarSolicitudP($idSolicitud, $fechaInicio, $fechaConclusion, $tiempoduracion, $Observaciones, $cargoPracticante, $mensaje,$nombreEmpresa, $Telefono, $Fax,$direccion,  $nombreDestinatario,   $cargoDestinatario,$new_name_file1,$new_name_file2);
                
                if ($resp_actualizar > 0) 
                {
                    $arrData = array('status'=>true, 'msg'=>'actualizado');  
                    // $alert = 'actualizado';
                } else 
                {
                    $arrData = array('status'=>true, 'msg'=>'error');  
                    // $alert = 'error';
                }
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        }

        public function VerificarSolicitud()
        {
            $nro_carnet_estudiante =  trim($_POST['nro_carnet_estudiante']);
            //consulta de verificacion a la tabla persona y estudiante
            $resp = $this->model->VerificarSolicitud($nro_carnet_estudiante);
            if(!empty($resp)){
                $resultado = $resp;
            } else {
            
                $resultado = ["nro_carnet_estudiante" => $nro_carnet_estudiante];
            }
            echo json_encode($resultado,JSON_UNESCAPED_UNICODE);

        }

        public function autocompletar()
        { 
            //$nombres = $_POST['nombres'];
        // $apellido_pat = $_POST['apellido_pat'];
            //$apellido_mat = $_POST['apellido_mat'];
            //$carnet = $_POST['carnet'];
            //$nromatricula = $_POST['nromatricula'];
            //$telefono = $_POST['telefono'];
            //$direccion = $_POST['direccion'];
            //$actualizar = $this->model->autocompletarFormulario($nombres, $apellido_pat, $apellido_mat,$carnet, $nromatricula, $telefono,$direccion, $idPersona);
            //if ($actualizar == 1) {
            //    $alert = 'modificado';
        // } else {
            //   $alert =  'error';
        // }
        $data = $this->model->Estudiantes::selectEstudiantes();
        // header("location: " . base_url() . "SolicitudPasantias/formulario?msg=$alert");
            $this->views->getView($this, "formulario", $data, "");
        }

        public function file_name($string) 
        {

            // Tranformamos todo a minusculas
        
            $string = strtolower($string);
        
            //Rememplazamos caracteres especiales latinos
        
            $find = array('á', 'é', 'í', 'ó', 'ú', 'ñ');
        
            $repl = array('a', 'e', 'i', 'o', 'u', 'n');
        
            $string = str_replace($find, $repl, $string);
        
            // Añadimos los guiones
        
            $find = array(' ', '&', '\r\n', '\n', '+');
            $string = str_replace($find, '-', $string);
        
            // Eliminamos y Reemplazamos otros carácteres especiales
        
            $find = array('/[^a-z0-9\-<>]/', '/[\-]+/', '/<[^>]*>/');
        
            $repl = array('', '-', '');
        
            $string = preg_replace($find, $repl, $string);
        
            return $string;
        }

        public function formulario()
        {
            $data = $this->model->selectSolicitudPasantiasArchivos();
            $this->views->getView($this, "formulario", $data, "");
        }

        public function insertarFormulario()
            {
                //guardar las variables 
                $idSolicitud = $_POST['idSolicitud'];
                $practicante = $_POST['practicante'];
                $carnet = $_POST['carnet'];
                $carrera = $_POST['carrera'];
                $nivel = $_POST['nivel'];
                $domicilio = $_POST['domicilio'];
                $telefono = $_POST['telefono'];
                $nombreApoderado = $_POST['nombreApoderado'];
                $ciApoderado = $_POST['ciApoderado'];
                $domicilioApoderado = $_POST['domicilioApoderado'];
                $telefonoApoderado = $_POST['telefonoApoderado'];
                $fechaAutorizacion = $_POST['fechaAutorizacion'];
                $fechaEnvio = $_POST['fechaEnvio'];
                $nombreEmp = $_POST['nombreEmp'];
                $direccionEmp = $_POST['direccionEmp'];
                $telefonoEmp = $_POST['telefonoEmp'];
                $fax = $_POST['fax'];
                $nombreDes = $_POST['nombreDes'];
                $cargo = $_POST['cargo'];
                $fechaIniPrac = $_POST['fechaIniPrac'];
                $seccion = $_POST['seccion'];
                $cargoPrac = $_POST['cargoPrac'];
                $fechaConcluPrac = $_POST['fechaConcluPrac'];
                $tiempoDuracion = $_POST['tiempoDuracion'];
                $obser = $_POST['obser'];
            
                if(empty($idSolicitud))
                {
                    //insertar
                    $resp_insertar = $this->model->insertarPri100($practicante, $carnet, $carrera, $nivel, $domicilio, $telefono, $nombreApoderado, $ciApoderado,
                    $domicilioApoderado,$telefonoApoderado, $fechaAutorizacion, $fechaEnvio, $nombreEmp,$direccionEmp,
                    $telefonoEmp, $fax,  $nombreDes, $cargo, $fechaIniPrac,$seccion,$cargoPrac,$fechaConcluPrac,
                    $tiempoDuracion, $obser);

                    $alert=($resp_insertar)?'registrado':'error';
                }
                else 
                {
                    //actualizar 
                    $resp_actualizar = $this->model->actualizarTipoConvenios($idSolicitud,$practicante, $carnet, $carrera, $nivel, 
                    $domicilio, $telefono, $nombreApoderado, $ciApoderado,$domicilioApoderado,$telefonoApoderado, $fechaAutorizacion, 
                    $fechaEnvio, $nombreEmp,$direccionEmp,$telefonoEmp, $fax,  $nombreDes, $cargo, $fechaIniPrac,$seccion,$cargoPrac,
                    $fechaConcluPrac,$tiempoDuracion, $obser);
                    $alert=($resp_actualizar)?'modificado':'error';
                }
                $data = $this->model->selectTipoConvenios();
                header("location: " . base_url() . "TipoConvenios/Listar?msg=$alert");
                die();
            }

        public function editarSolicitud(int $idSolicitud)
        {
            $id = $idSolicitud;
            
            $arrData = $this->model->selectSolicitudP($id);
            if(!$arrData)
            {
                $arrResponse =  array('status'=>false, 'msg' => "Datos no encontrados" );
            }
            else 
            {
                $arrResponse = array('status'=>true, 'data'=>$arrData);
            }
            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
        }

        
        public function eliminar()
        {
            $id = $_GET['idSolicitarPasantia'];
            
            $eliminar = $this->model->eliminarSolPasantia($id);
            if ($eliminar > 0) {
                $alert = 'eliminar';
            } else {
                $alert = 'error';
            }
            $data = $this->model->selectSolicitudPasantias();
            header("location: " . base_url() . "SolicitudPasantias/Listar?msg=$alert");
            die();
        }

        public function sigForm() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
            {
                
                $this->views->getView($this, "SolicitudPasantias/formulario1");
            }
        
        public function formulario1()
        {
            $data = $this->model->selectSolicitudPasantiasArchivos();
            $this->views->getView($this, "formulario1", $data, "");
        }

        public function recibirSolicitud()
        {
            $idUsuario = intval($_POST['idUsuario']);
            $result = $this->model->eliminarU($idUsuario);
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el Usuario' );
            }
            else 
            {
                $arrResponse = array('status' =>true, 'msg'=> 'No se elimino el Usuario' );
            }
            $data = $this->model->selectUsuarios();
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        
        public function getSolPasantia(int $idsolicitud)
        {  
            $id = $idsolicitud;
        
            $arrData = $this->model->selectidsolicitud($id);
            if(!$arrData)
            {
                $arrResponse = array('status'=>false, 'msg' => 'no se encontro datos');
            }
            else 
            {
                $arrResponse = array('status'=>true, 'data' => $arrData);
            }
            
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

        public function getVerSolPasantia(int $idsolicitud)
        {  
            $id = $idsolicitud;
        
            $arrData = $this->model->selectidsolicitud($id);
            if(!$arrData)
            {
                $arrResponse = array('status'=>false, 'msg' => 'no se encontro datos');
            }
            else 
            {
                $arrResponse = array('status'=>true, 'data' => $arrData);
            }
            
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }
        */
    }
   
?>