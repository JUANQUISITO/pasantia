<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de convenios
	ob_start();
    class Seguimiento extends Controllers
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
        
        public function seguimiento()
        {
            $data['page_name']="Seguimiento";
            $data['page_functions_js'] = "functions_seguimiento.js";
            $this->views->getView($this, "Listar",$data);
        }
        
        //obteniendo datos desde la BD
        public function getSelectSeguimiento()
        {
            
            $arrData = $this->model->selectSeguimientos();
            // var_dump($arrData);
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++)
                {
                    // if($arrData[$i]['status']==1)
                    // {
                        // $htmlOptions.='<option value="'.$arrData[$i]['id_tipo_convenio'].'">'.$arrData[$i]['nombre_tipo'].'</option>';

                    // }
                    $arrData[$i]['options']= '<div class="text-center">
                    <button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_seguimiento'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm" onClick="fntEliminar('.$arrData[$i]['id_seguimiento'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                        </div>';
                }
            }
        

            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

        }

        public function getSelectEstadoSeg()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectEstadoSeguimientos();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0">--SELECCIONE UNA ESTADO-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                   
                        $htmlOptions.='<option value="'.$arrData[$i]['estado_seg'].'">'.$arrData[$i]['estado_seg'].'</option>';
                }
            }
            echo $htmlOptions;
        }

        //ESTA FUNCION ES PARA VER EL SEGUIMIENTO DE LA CARTA DE PASANTIA DE UN ESTUDIANTE
        public function seguimientoEstudiante( $idSeguimiento)
        {           
            $id = intval($idSeguimiento);
            $arrData = $this->model->selectSeguimiento($id);
            // var_dump($arrData);
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++)
                {
                    // if($arrData[$i]['status']==1)
                    // {
                        // $htmlOptions.='<option value="'.$arrData[$i]['id_tipo_convenio'].'">'.$arrData[$i]['nombre_tipo'].'</option>';

                    // }
                    $arrData[$i]['options']= '<div class="text-center">
                    <button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_seguimiento'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
                    <button class="btn btn-danger btn-sm" onClick="fntEliminar('.$arrData[$i]['id_seguimiento'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                        </div>';
                }
            }
        

            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

        }

        public function Listar()
        { 
            $arrData = $this->model->selectSeguimientos();
            
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
            $this->views->getView($this, "Listar",$arrData,"");  
        } 
       
        public function editar(int $idTipoConvenio)
        {
            $id = intval($idTipoConvenio);
            $arrData = $this->model->selectSeguimiento($id);
            if(!$arrData)
            {
                $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );// status q se muestra en js obj.data
            }
            else 
            {
                $arrResponse =  array('status'=>true, 'data' => $arrData );
            }

            echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE ); 
        }
      
        public function verSeguimiento(int $idSeguimiento)
        {
            $id = intval($idSeguimiento);
            $arrData = $this->model->verSelectSeguimiento($id);
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
            $arrData = $this->model->selectTipoConvenioInactivos();
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
            $arrData = $this->model->reingresarTipoConvenio($id);
            $alert=($arrData)?'reingresar':'error';
            
            $data = $this->model->selectTipoConvenios();
            header("location: " . base_url() . "TipoConvenios/Listar?msg=$alert");
        }
/*
    
*/
        public function eliminar()
        {
            $id = intval($_POST['idTipoConvenio']);

            $eliminar = $this->model->eliminarTipoConvenios($id);
            
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

        //recibir la solicitud de pasantia
        public function recibirSolicitudP()
        {
            
            $idSolicitud = intval($_POST['idSolicitud']);


            $estado_seg="recibido";
            $mensaje ="Se recibio la solicitud";
            $idsolpasantia = $idSolicitud;
            $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
            $idAdministrativo = $_SESSION["idAdministrativo"];
            //insertar en la tabla seguimiento
            $resp_insertarseguimiento = $this->model->recibirSolicitud($estado_seg, $mensaje, $idsolpasantia, $condigo_seguimiento, $idAdministrativo);

            if($resp_insertarseguimiento)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha aceptado la solicitud' );
            }
            else 
            {
                $arrResponse = array('status' =>false, 'msg'=> 'No se acepto la solicitud' );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
       
        
        }

        public function concluirPasantia()
        {
            $estado_seg = $_POST['CheckPasantia'];
            $mensaje_seg = $_POST['mensajeConcluido'];
            $idAdministrativo = $_SESSION["idAdministrativo"];
            $idSolicitudConcluida = $_POST['idSolicitudConcluida'];
            $result="";
            if(empty($estado_seg) )
            {
                $arrData = array('status'=>false, 'msg'=>'debe seleccionar una opcion de revision');
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                die();
            }
            else
            {
                $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                //CAPTURANDO EL ID_ADMINISTRATIVO
                $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudConcluida,$condigo_seguimiento,$idAdministrativo);

                // if($result){
                //     $estado_seg = "enviado";
                //     $mensaje_seg = "Solicitud Enviado a Jede de Carrera"; 
                //     $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                //     //CAPTURANDO EL ID_ADMINISTRATIVO
                //     $id_carrera_sede = trim($_POST['idCarreraSedeConcluida']);
                //     $nombre_cargo = 'JEFE DE CARRERA';
                //     $administrativo = $this->model->GetAdministrativo($id_carrera_sede, $nombre_cargo);
                //     if(!$administrativo){
                //         $nombre_cargo = 'SECRETARIA JEFE DE CARRERA';
                //         $administrativo = $this->model->GetAdministrativo($id_carrera_sede, $nombre_cargo);
                //     }
                //     $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudConcluida,$condigo_seguimiento,$administrativo["id_administrativo"]);
                // }
        
            }
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha actualzido con exito el seguimiento' );
            }
            else 
            {
                $arrResponse = array('status' =>false, 'msg'=> 'No se acepto el seguimiento' );
            }
            // var_dump($resultrev);
            // exit(); 
            
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);

          
        }

         public function verificarSolicitudPa()
         {
            // insertar 2 veces 1=> REVISADO Y 2=> ENVIADO (DIRECCION ACADEMICA) JEFE O SECRTARIA DE CARRERA
            //1
            $estado_seg = trim($_POST['selecionar_revision']);
            $idSolicitudVerificar = intval($_POST['idSolicitudVerificar']);
            $idAdministrativo = $_SESSION["idAdministrativo"];
         
            $result="";
            if($estado_seg == 0)
            {
                $arrData = array('status'=>false, 'msg'=>'debe seleccionar una opcion de revision');
                echo json_encode($arrData, JSON_UNESCAPED_UNICODE);
                die();
            }
            else 
            {

       
                if($estado_seg == "revisado"){
                    if($_SESSION["nombre_cargo"] == "JEFE DE CARRERA" || $_SESSION["nombre_cargo"] == "SECRETARIA JEFE DE CARRERA"){
                        $estado_seg="revisado";
                        $mensaje_seg = trim($_POST['vMensaje_seguimiento']); 
                        $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                        $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudVerificar,$condigo_seguimiento,$idAdministrativo);
        
                        if($result){
                            $estado_seg = "enviado";
                            $mensaje_seg = "Solicitud Enviado a Direccion Academica "; 
                            $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                            //CAPTURANDO EL ID_ADMINISTRATIVO
                            $nombre_cargo = 'DIRECCION ACADEMICA';

                            $administrativo = $this->model->GetAdministrativo("", $nombre_cargo);
                            if(!$administrativo){
                                $nombre_cargo = 'SECRETARIA DIRECCION ACADEMICA';
                                $administrativo = $this->model->GetAdministrativo("", $nombre_cargo);
                            }
                    
                            $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudVerificar,$condigo_seguimiento,$administrativo["id_administrativo"]);
                        }
                    } elseif($_SESSION["nombre_cargo"] == "DIRECCION ACADEMICA" || $_SESSION["nombre_cargo"] == "SECRETARIA DIRECCION ACADEMICA"){
                        
                        $estado_seg="revisado";
                        $mensaje_seg = trim($_POST['vMensaje_seguimiento']); 
                        $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                        $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudVerificar,$condigo_seguimiento,$idAdministrativo);
        
                        if($result){
                            $estado_seg = "enviado";
                            $mensaje_seg = "Solicitud Enviado a Jede de Carrera"; 
                            $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                            //CAPTURANDO EL ID_ADMINISTRATIVO
                            $id_carrera_sede = trim($_POST['idCarreraSedeVS']);
                            $nombre_cargo = 'JEFE DE CARRERA';
                            $administrativo = $this->model->GetAdministrativo($id_carrera_sede, $nombre_cargo);
                            if(!$administrativo){
                                $nombre_cargo = 'SECRETARIA JEFE DE CARRERA';
                                $administrativo = $this->model->GetAdministrativo($id_carrera_sede, $nombre_cargo);
                            }
                            $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudVerificar,$condigo_seguimiento,$administrativo["id_administrativo"]);
                        }
                    }
                    
                } else {
                    //SI EN CASO DE OBSERVA O SE RECHAZA
                    $mensaje_seg = trim($_POST['vMensaje_seguimiento']); 
                    $condigo_seguimiento = $this->model->ObtenerCodigoSeguimiento();
                    $idAdministrativo = $_SESSION["idAdministrativo"];
        
                    $result = $this->model->verificarSolicitud($estado_seg,$mensaje_seg, $idSolicitudVerificar,$condigo_seguimiento,$idAdministrativo);
                }
            }
            
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha actualizado el seguimiento' );
            }
            else 
            {
                $arrResponse = array('status' =>false, 'msg'=> 'No se acepto el seguimiento' );
            }
            // var_dump($resultrev);
            // exit(); 
            
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
         }

         public function mostrarSeguimiento(int $idSolicitud)
         {
           
            $id = intval($idSolicitud);
            if(!empty($id)){
                //1. obtener los datos del Estudiante
                $data_estudiante = $this->model->DatosEstudiante($id);
                //2. obtener el historial de seguimiento
                $data_seguimiento = $this->model->ListaSeguimiento($id);

                $datos= array (
                    'data_estudiante' => $data_estudiante,
                    'data_seguimiento' => $data_seguimiento,
                );
            }
            echo json_encode($datos, JSON_UNESCAPED_UNICODE ); 
            // exit;

            // $arrData = $this->model->selectSegSolicitud($id);
           
            // if(!$arrData)
            // {
            //     $arrResponse =  array('status'=>false, 'msg' => "Datos no encontrados" );// status q se muestra en js obj.data
            // }
            // else 
            // {
            //     $arrResponse =  array('status'=>true, 'data' => $arrData );
            // }

            // echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE ); 
         }
    }          
?>