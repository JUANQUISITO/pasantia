<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de Administrativos  
    class Administrativos extends Controllers
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

        public function administrativos() 
        {
            $data['page_name']="administrativos";
            $data['page_functions_js']="funciones_administrativo.js";
            
            $this->views->getView($this, "Listar",$data);
        }
      
        public function getObtenerAdministrativos()
        { 
            $arrData = $this->model->selectAdministrativos();
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
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="fntEditarAdmin('.$arrData[$i]['id_administrativo'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="fntEliminarAdmin('.$arrData[$i]['id_administrativo'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        } 

        public function insertar()
        {    
            $nombres = $_POST['nombres'];
            $cargo = $_POST['cargo'];
            $carreraSede = $_POST['carreraSede'];
 
            $insert = $this->model->insertarAdministrativos( $nombres, $cargo,$carreraSede);
            if ($insert > 0) {
                $alert = 'registrado';
            } else if ($insert == "existe") {
                $alert = 'existe';
            } else {
                $alert = 'error';
            }      
            $data = $this->model->selectAdministrativos();
            header("location: " . base_url() . "Administrativos?msg=$alert");
            die();
        }

        public function eliminados()
        {   
            $arrData = $this->model->selectAdministrativosEliminados();
            for($i=0; $i<count($arrData); $i++)
            {   if($arrData[$i]['status']==1)
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
            $reingresar = $this->model->reingresar($id);
            if($reingresar)
            {
                $alert = "reingresar";
            }
            else 
            {
                $alert = "error";
            }
            $data = $this->model->selectAdministrativos();
            header("location: " . base_url() . "Administrativos/Listar?msg=$alert");

        }

        public function eliminar() //al momento de eliminar se debe usar el metodo get en php
        { 
            $idAdministrativo = intval($_POST['idAdministrativo']);
            $result = $this->model->eliminarAdministrativos($idAdministrativo);
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el administrativo' );
            }
            else 
            {
                $arrResponse = array('status' =>true, 'msg'=> 'No se elimino el administrativo' );
            }
            $data = $this->model->selectAdministrativos();
           echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        } 


        //para verificar si ya esta registrado
        public function validarAdministrativo()
        {        
            if(empty($_POST['carnet']) )
            {
                $msg = "los campos estan vacios";
            }
            else{
                $usuario =  $_POST['carnet'];
                //$pass =    $_POST['password'];
                
                $recuperarDatos= $this->model->selectVerificarAdministrativos($usuario);
                //var_dump($recuperarDatos);
                //die();//es una funcion

            }
          
            echo json_encode($recuperarDatos,JSON_UNESCAPED_UNICODE);
        }

        public function VerificarAdministrativo()
        {
            $nro_carnet_administrativo =  trim($_POST['nro_carnet_administrativo']);
            //consulta de verificacion a la tabla persona y estudiante
            $resp = $this->model->VerificarAdministrativo($nro_carnet_administrativo);
            if(!empty($resp)){
                $resultado = $resp;
            } else {
              
                $resultado = ["nro_carnet_administrativo" => $nro_carnet_administrativo];
            }
            echo json_encode($resultado,JSON_UNESCAPED_UNICODE);
    
        }

        public function editar(int $idAdministrativo)
        {   
            $idAdministrativo = $idAdministrativo;
            $arrData = $this->model->selectAdministrativo($idAdministrativo);
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

        public function actualizar()
        { 
            // $idAdministrativo = intval($_POST['idAdministrativo']);
            $idAdministrativo =  intval($_POST['idAdministrativo']); 
            $nombres = $_POST['nombres'];
            //$apPat = $_POST['apPat'];

            //$apMat = $_POST['apMat'];
            //$email = $_POST['email'];
            // $ci = $_POST['ci'];
            // $tel = $_POST['tel'];
            //$dir = $_POST['dir'];
            $cargo = $_POST['cargo'];
            $carreraSede = $_POST['carreraSede'];

            // $actualizar = $this->model->actualizarAdministrativos( $nombres,$apPat,$apMat, $email, $ci, $tel, $dir,$cargo, $idAdministrativo);
            $actualizar = $this->model->actualizarAdministrativos( $nombres,$cargo,$carreraSede, $idAdministrativo);
            if ($actualizar == 1) {
                $alert = 'modificado';
            } else {
                $alert =  'error';
            }
            $data = $this->model->selectAdministrativos();
            header("location: " . base_url() . "Administrativos?msg=$alert");
            die();
        }
    }          
?>