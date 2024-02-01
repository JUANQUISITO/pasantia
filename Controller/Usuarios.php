<?php
	ob_start();
    class Usuarios extends Controllers
    {   
        // Opciones de contraseña:
        const HASH = PASSWORD_DEFAULT;
        const COST = 14;
        // Almacenamiento de datos del usuario:
        public $data;
        var $inputusuario;
        var $inputPassword;
        var $listRolid;
        
        public function __construct()
        {
            parent::__construct();

            session_start();
        
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            getPermisos(2);    
        }

        public function usuarios() 
        {   
            $data['page_name']="Usuarios";
            $data['page_functions_js'] = "functions_usuarios.js";
            
            $this->views->getView($this, "Listar",$data);
        }

        // es la funcion LISTAR USUARIOS 
        public function getUsers()
        {   
            $arrData = $this->model->selectUsuarios();

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
                    $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="fntEditar('.$arrData[$i]['id_persona'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="fntEliminar('.$arrData[$i]['id_persona'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';

            }
            echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
        }
        
        public function eliminados()
        {   
            $arrData = $this->model->selectUsuariosEliminados();
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
        
        //funcion insertar USUARIOS
        public function setUsers(){ //AGREGAR NUEVO USUARIO
            //insertar tabla usuario
         
            $idUsuario = $_POST['inputIdUsuario'];
            $inputusuario = trim($_POST['inputUsuario']);
            $inputPassword = trim($_POST['inputPassword']);
            $listRolid = trim($_POST['listRolid']);
            $idAdministrativo =  intval($_POST['inputIdAdministrativo']); 
            //validaciones
            if(empty($inputusuario) || empty($listRolid))
            {
                $alert = "error";
            } 
            else 
            {
               if(empty($idUsuario))
               {
                    //INSERTAR
                    $inputPassword = password_hash($inputPassword,PASSWORD_DEFAULT); 
                    $idPersonaUltimo = $this->model->insertUsuarios($listRolid,$inputusuario,$inputPassword);   // devuelve el id_persona en la BD una vez q creamos en 
                    
                    //var_dump($resultado);
                    if (!$idPersonaUltimo) // si resultado no es verdadero
                    {
                        $alert = "error"; //HUBO UN ERROR CON LA CONEXION  
                    }
                    //inserte a la tabla administrativo
                    $listCargo = trim($_POST['listCargo']);
                    $listCarrera = trim($_POST['listCarrera']);
                    $listCargo = intval($listCargo);
                    $listCarrera = intval($listCarrera);
                   
                    $resultAdminis = $this->model->insertarAdministrativos($listCargo, $listCarrera=NULL, $idPersonaUltimo);
                   
                    if($resultAdminis){
                        $alert="agregado";
                    } else {
                        $alert="error";
                    }

                }
                //actualizar si existe el ID USUARIO
              
               else
               {
                    //ACTUALIZAR
               
                    $idAdministrativo =  intval($_POST['inputIdAdministrativo']); 
                    $idCargo = trim($_POST['listCargo']);
                    $idCarreraSede = trim($_POST['listCarrera']);
                    //print_r($_POST);exit;

                    //ACTUALIZAR TABLA DE USUARIOS
                    $result_usuario = $this->model->actualizarUsuario($idUsuario,$inputusuario, $inputPassword, $listRolid);
                    //echo $result_usuario;
                    $result_administrativo = $this->model->actualizarAdministrativo($idAdministrativo, $idCargo, $idCarreraSede);
                    //echo $result_administrativo;
                    if($result_usuario && $result_administrativo){
                        $alert = "actualizado";
                    } else {
                        $alert = "error";
                    }

               }              

            }
            header("location: " . base_url() . "usuarios?msg=$alert");
        }

    

        public function editar(int $idUsuario)
        {   
            $idUsuario = $idUsuario;
            $arrData = $this->model->selectUsuario($idUsuario);
            if(!$arrData)
            {
                $arrData = array('status'=>false,'msg'=>'no se encontro datos');
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
            $data = $this->model->selectUsuarios();
            header("location: " . base_url() . "usuarios/?msg=$alert");

        }

        public function eliminar() //al momento de eliminar se debe usar el metodo get en php
        { 
            $idUsuario = intval($_POST['idUsuario']);//me sale no definido 
            $result = $this->model->eliminarU($idUsuario);
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el Usuario' );
                $idAdministrativo =  intval($_POST['inputIdAdministrativo']); 
                $result = $this->model->eliminarAdministrativos($idAdministrativo);
                if($result)
                {
                    $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el administrativo' );
                    
                }
                else 
                {
                    $arrResponse = array('status' =>true, 'msg'=> 'No se elimino el administrativo' );
                }
            }
            else 
            {
                $arrResponse = array('status' =>true, 'msg'=> 'No se elimino el Usuario, ni el administrativo' );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }

        public function verPerfil()
        {
            
            $data['page_name']="Perfil de Usuario ";
            $data['page_functions_js'] = "functions_usuarios.js";
            $this->views->getView($this, "Perfil",$data);
        }
    }
?>