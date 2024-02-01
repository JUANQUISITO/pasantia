<?php
ob_start();
class SolicitudPasantias extends Controllers
{
    public function __construct()
    {
        parent::__construct();

        session_start();
    
        if (!$_SESSION['login'] && empty($_SESSION)) 
        {
             header("location: " . base_url()."Home");
        }
        getPermisos(4);   
    }
    public function solicitudPasantias()
    {   
        $data['page_id'] = 4;
        $data['page_title'] = "Pagina Solicitud Pasantias";
        $data['page_name'] = "solicitud pasantias"; 
        $data['page_functions_js']="functions_solicitud.js";
        $this->views->getView($this, "Listar", $data);
    }
    public function getSolicitud()
    {  
      //echo $_SESSION["idCarreraSede"].' cris';exit;
        $id_carrera_sede="";
        if(!empty($_SESSION["idCarreraSede"])){
            $id_carrera_sede = $_SESSION["idCarreraSede"];
        } 

        $id_carrera = trim($_POST['id_carrera']);
        //echo $id_carrera.' controller';exit;
        $id_sede = trim($_POST['id_sede']);
        $id_seguimiento = trim($_POST['id_seguimiento']);
        $id_user = $_SESSION['userData']['id_persona'];
        $nombre_rol = $_SESSION['userData']['nombre'];

        // var_dump($_SESSION['userData']);
        // exit();
        $arrData = $this->model->selectSolicitudPasantias($id_carrera, $id_sede,$id_user,$nombre_rol, $id_carrera_sede,$id_seguimiento);

      
        for($i = 0; $i<count($arrData); $i++)
        {   
            $btn_editar = '';
            $btn_eliminar = '';
            $btn_recibir = '';
            $btn_verificar = '';
            $btn_verpdf = '';
            $btn_ver_seg='';
            $btn_concluir='';
            $btn_verpri100='';

            if($arrData[$i]['status']==1)
            {
                $arrData[$i]['status']='<span class="badge badge-success">Vigente</span>'; 
            }
            else 
            {
               $arrData[$i]['status']= '<span class="badge badge-danger">Inactivo</span>'; 
            }
            if($_SESSION['permisosMod']['r'])
            {
                $btn_ver_seg = '<button class="btn btn-warning btn-sm" onClick="fntVerSeguimiento('.$arrData[$i]['id_solicitud'].')" title="Ver Seguimiento"><i class="fas fa-envelope"></i></button>';
            }
            if($_SESSION['permisosMod']['u'])
            {
                $btn_recibir = '<button class="btn btn-secondary btn-sm" onClick="fntRecibir('.$arrData[$i]['id_solicitud'].')" title="Recibir" id="btn_recibir"><i class="fas fa-cloud-download-alt"></i></button>';
                $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_solicitud'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                $btn_verificar = '<button class="btn btn-success btn-sm" onClick="fntVerificar('.$arrData[$i]['id_solicitud'].')" title="Verificar"  ><i class="fas fa-file-alt"></i></button>';
                $btn_verpdf = '<button class="btn btn-info btn-sm" onClick="verPdf('.$arrData[$i]['id_solicitud'].')" title="PDF"><i class="fas fa-file-pdf"></i></button>';
                $btn_concluir = '<button class="btn btn-dark btn-sm" onClick="finalizarPasantia('.$arrData[$i]['id_solicitud'].')" title="PDF"><i class="fas fa-archive"></i></button>';
                $btn_verpri100 = '<button class="btn btn-dark btn-sm" onClick="verPri100('.$arrData[$i]['id_solicitud'].')" title="Pri100"><i class="fas fa-file-pdf"></i></button>';
            }
            if($_SESSION['permisosMod']['d'])
            {
                $btn_eliminar=' <button class="btn btn-danger btn-sm" onClick="fntEliminar('.$arrData[$i]['id_solicitud'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
            }

            $arrData[$i]['options'] ='<div class="text-center">
            
            '.$btn_recibir.' '.$btn_editar.' '.$btn_eliminar.' '.$btn_verificar.' '.$btn_verpdf.' '.$btn_ver_seg.' ' .$btn_concluir.' '.$btn_verpri100.'
                                </div>';
        
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    }

//INSETAR PERO DESDE ESTUDIANTES
    public function insertar()
    {   
     
        // 1. generar el CODIGO de manera automatica = SOL20220001
        $arrData = $this->model->ObtenerCodigoSolicitud();
        
        // var_dump($_POST);exit();
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
            //agregando una consulta de tabla administrativo 'jefe carrera' EN LA TABLA DE SEGUIMIENTO
            $id_carrera_sede = htmlentities($_POST['idCarreraSede']);
            $nombre_cargo = 'JEFE DE CARRERA';
            $administrativo = $this->model->GetAdministrativo($id_carrera_sede, $nombre_cargo);
            
            if(!$administrativo)
            {
                // var_dump($encontrarIdRol."ddd");\
                $arrData = array('status'=>false, 'msg'=>'no se encontro el administrativo con su cargo');
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                die();
            }
            
            //el encontrar Rol Id DEVUELVE COMO UN ARRAY  se devuelve con array[] se modifica a string y al final con intval a un entero
            
            //$encontrarIdRol = intval($encontrarIdRol['id_rol']);
            //generar codigo de  seguimiento
            $estado_seg="enviado";
            $mensaje ="Solicitud Enviado";
            $idsolpasantia = $resp_insertar;
            $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
            $idAdministrativo = $administrativo["id_administrativo"];
            //insertar en la tabla seguimiento
            $resp_insertarseguimiento = $this->model->insertarSeguimiento($estado_seg, $mensaje, $idsolpasantia, $condigo_seguimiento, $idAdministrativo);
    
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


    public function VerificarSolicitudEstudiante()
    {
        $idPersona =  trim($_POST['id_persona']);
        //consulta de verificacion a la tabla persona y estudiante
        $resp = $this->model->VerificarSolicitudEstudiante($idPersona);
        if(!empty($resp)){
            $resultado = $resp;
        } else {
          
            $resultado = ["id_persona" => $idPersona];
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
        $id = intval($_POST['idSolicitarPasantia']);
        
        $eliminar = $this->model->eliminarSolPasantia($id);
        if ($eliminar) {
                $arrResponse = array('status'=>true, 'msg' => "Datos Elimininados correctamente");
        } else {
            $arrResponse = array('status'=>false, 'msg' => "los Datos no fueron Elimininados ");
        }
        echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
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
   
    public function generarPdf(int $idSolicitud)
    {
        
        $id = $idSolicitud;
        $arrResponse = $this->model->selectSolicitudP($id);
        $nombrecompleto = $arrResponse['nombres'].' '.$arrResponse['apellido_paterno'].' '.$arrResponse['apellido_materno'];
        // $arrResponse['nombre_destinatario'];
        $nombrecompleto = strtoupper($nombrecompleto);
        $fecha = $this->fechaCastellano($arrResponse['fecha_creada']);
        $nombre_destinatario = strtoupper($arrResponse['nombre_destinatario']);
        $vargo_destinatario = strtoupper($arrResponse['cargo_encargado']);
        $empresa = strtoupper($arrResponse['nombre_empresa_sin_convenio']);
        // echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        // exit();
        // $arrResponse['']  
        require('Assets/pdf/fpdf.php');

            
            $pdf = new FPDF('P','mm',array(80,200));
                // Page footer
              
                    // Position at 1.5 cm from bottom
                    $pdf->SetY(-15);
                    // Arial italic 8
                    $pdf->SetFont('Times','I',8);

                
                
                $a= $nombrecompleto; 
                $b=strtoupper($arrResponse['carnet']) ;
                $c=strtoupper($arrResponse['carrera']);
                // $g = $arrResponse['sede'];
                $d='TECNICO SUPERIOR';
                $e=$arrResponse['telefono'];
                // Instanciation of inherited class
                $pdf = new FPDF('P','mm','letter');
                // $pdf->SetFont('Times','I',12);
                // $pdf->Cell(0,15,'                                                                                     '.$arrResponse['fecha_creada'],0,1);
                $pdf->AliasNbPages();
                $pdf->AddPage();
                $pdf->SetFont('Times','I',12);
                $pdf->Cell(0,76,'                                                                                                                                            '.$fecha,0,1);
                $pdf->SetFont('Times','I',11);
                $pdf->SetXY(12,43);
                $pdf->Cell(0,54,'                                        '.$nombre_destinatario,0,1);
                $pdf->SetXY(12, 45);
                $pdf->Cell(0, 59,'                                        '.$vargo_destinatario,0,1);
                $pdf->SetXY(12, 48);
                $pdf->Cell(0, 62,'                                        '.$empresa,0,1);
                $pdf->SetXY(28, 92);
                $pdf->Cell(0,138,'                                                                                               '.$a,0,1);
                $pdf->SetXY(28, 94);
                $pdf->Cell(0,144,'                                                                                               '.$b,0,1);
                $pdf->SetXY(28, 96);
                $pdf->Cell(0,149,'                                                                                               '.$c,0,1);
                // $pdf->Cell(0,-129,'                                                                                               '.$g,0,1);
                $pdf->SetXY(28, 98);
                $pdf->Cell(0,153,'                                                                                               '.$d,0,1);
                $pdf->SetFont('Times','I',10);
                $pdf->SetXY(28, 100);
                $pdf->Cell(0,157,'                                                                                                        '.$e,0,1);
                $pdf->SetFont('Times','I',11);
                $pdf->SetXY(77, 204);
                $pdf->Cell(0,10,                        date('Y'),0,1,'L'); 
                $pdf->Image('Assets/pdf/carta_final.png' , 0 ,0, 210 , 275,'PNG', '');
                $pdf->Output();
                
    }

    public function generarPdf__byvmodificado(int $idSolicitud){
        //require_once 'Assets/pdf/02.php';
        require_once 'Controller/Reportes/Reporte.php';
    }


    public function fechaCastellano ($fecha) {
        $fecha = substr($fecha, 0, 10);
        $numeroDia = date('d', strtotime($fecha));
        $dia = date('l', strtotime($fecha));
        $mes = date('F', strtotime($fecha));
        $anio = date('Y', strtotime($fecha));
        $dias_ES = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
        $dias_EN = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday", "Sunday");
        $nombredia = str_replace($dias_EN, $dias_ES, $dia);
        $meses_ES = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        $meses_EN = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $nombreMes = str_replace($meses_EN, $meses_ES, $mes);
        //return $nombredia." ".$numeroDia." de ".$nombreMes." de ".$anio;
        return $numeroDia." de ".$nombreMes." de ".$anio;
    }

    //PDF DEL FORMULARIO PRI 100 
    public function generarPri100(int $idSolicitud)
    {
        
        $id = $idSolicitud;
        $arrResponse = $this->model->selectSolicitudP($id);
        $nombreCompleto     = $arrResponse['nombres'].' '.$arrResponse['apellido_paterno'].' '.$arrResponse['apellido_materno'];
        $nombreCompleto     = strtoupper($nombreCompleto);
        $matricula          = strtoupper($arrResponse['nro_matricula']);
        $ci                 = strtoupper($arrResponse['carnet']);
        $carrera            = strtoupper($arrResponse['carrera']);
        $nivel              ='TECNICO SUPERIOR';
        $domicilio          = strtoupper($arrResponse['direccion']);
        $telefono           = strtoupper($arrResponse['telefono']);
        $nombreapoderado    = strtoupper($arrResponse['padre_apoderado']??'');;
        $ciapoderado        = strtoupper($arrResponse['ci_apoderado']??'');;
        $domicilioapoderado = strtoupper($arrResponse['domicilio_apoderado']??'');
        $telefonoapoderado  = strtoupper($arrResponse['telefono_apoderado']??'');
        $fechaautorizacion  ='';
        $fechaenvioCarta    = $this->fechaCastellano($arrResponse['fecha_creada']);

        // DATOS DE LA EMPRESA
        $empresa                 = strtoupper($arrResponse['nombre_empresa_sin_convenio']);
        $direccionEmpresa        = strtoupper($arrResponse['direccion']);
        $telefonoEmpresa         = strtoupper($arrResponse['telefono_empresa']);
        $faxEmpresa              = strtoupper($arrResponse['fax']);
        $nombre_destinatario_pri = strtoupper($arrResponse['nombre_destinatario']);
        $vargo_destinatario_pri  = strtoupper($arrResponse['cargo_encargado']);
        $fechaInicioPractica     = strtoupper($arrResponse['fecha_inicio_prac']);
        $cargoPostulante         = strtoupper($arrResponse['cargo_estudiante']);;
        
        
        // echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        // exit();
        // $arrResponse['']  
        require('Assets/pdf/fpdf.php');

        
        $pdf = new FPDF('P','mm',array(0,280));

        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Times','I',10);
        $pdf->SetXY(12,43);
        $pdf->SetFont('Times','I',11);
        $pdf->SetXY(143,40);
        $pdf->Cell(0,27,'                '.$matricula,0,1);
        $pdf->SetXY(122,49);
        $pdf->Cell(0,9,                        date('/Y'),0,1,'L'); 
        $pdf->SetFont('Times','I',10);
        $pdf->SetXY(67,66);
        $pdf->Cell(0,11,'         '.$nombreCompleto,0,1);
        $pdf->SetXY(132,66);
        $pdf->Cell(0,11,'                        '.$ci,0,1);

        $pdf->SetXY(67,72);
        $pdf->Cell(0,12,'     '.$carrera,0,1);
        $pdf->SetXY(129,72);
        $pdf->Cell(0,12,'                     '.$nivel,0,1);

        $pdf->SetXY(61,10);
        $pdf->Cell(0,150,'          '.$domicilio,0,1);
        $pdf->SetXY(144,10);
        $pdf->Cell(0,150,'                     '.$telefono,0,1);

        $pdf->SetXY(61,15);
        $pdf->Cell(0,150,'                     '.$nombreapoderado,0,1);
        $pdf->SetXY(12,43);
        $pdf->Cell(0,160,'                     '.$ciapoderado,0,1);

        $pdf->SetXY(12,43);
        $pdf->Cell(0,173,'                '.$domicilioapoderado,0,1);
        $pdf->SetXY(12,43);
        $pdf->Cell(0,-173,'            '.$telefonoapoderado,0,1);
        
        $pdf->Cell(0,187,'                                '.$fechaautorizacion,0,1);
        $pdf->SetFont('Times','I',11);
        $pdf->SetXY(80,80);
        $pdf->Cell(0,50,'                                '.$fechaenvioCarta,0,1);
        $pdf->SetFont('Times','I',10);
        $pdf->SetXY(70,55);
        $pdf->Cell(0,154,'                                '.$empresa,0,1);
        $pdf->SetXY(45,62);
        $pdf->Cell(0,154,'                                '.$direccionEmpresa,0,1);
        $pdf->SetXY(45,68);
        $pdf->Cell(0,155,'                                '.$telefonoEmpresa,0,1);
        $pdf->SetXY(135,68);
        $pdf->Cell(0,155,'                                '.$faxEmpresa,0,1);
        $pdf->SetXY(70,73);
        $pdf->Cell(0,159,'                                '.$nombre_destinatario_pri,0,1);
        $pdf->SetXY(41,77);
        $pdf->Cell(0,164,'                                '.$vargo_destinatario_pri,0,1);
        $pdf->SetFont('Times','I',11);
        $pdf->SetXY(75,80);
        $pdf->Cell(0,172,'                                '.$fechaInicioPractica,0,1);
        $pdf->SetFont('Times','I',10);
        $pdf->SetXY(37,179);
        $pdf->Cell(0,0,'                                '.$cargoPostulante,0,1);
        $pdf->SetFont('Times','',11);
        $pdf->SetXY(100,206);
        $pdf->Cell(0,1,'                                '.$fechaenvioCarta,0,1);

        $pdf->Image('Assets/pdf/prueba2.png' , 0 ,0, 210 , 275,'PNG', '');
        $pdf->Output();
    }
}