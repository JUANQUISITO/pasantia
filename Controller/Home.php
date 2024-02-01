<?php
	ob_start();
    class Home extends Controllers
    {   
        public function __construct()
        {
            parent::__construct();
            session_start();
            // print_r($_SESSION);
            if(!empty($_SESSION))
            {
                if ($_SESSION['login']) 
                {
                  
                     header("location: " . base_url()."Dashboard/mostrarAdministrador");
                }
            }
        
        }

        public function home() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
        {
            $data['page_id'] = 1;
            $data['page_title'] = "SISTEMA DE PASANTIAS";
            $data['page_name'] = "home";
            $data['page_tag'] = "Login SP";
            $data['page_functions_js'] = "functions_login.js";
            $this->views->getView($this, "home",$data);
        }

        public function validar()
        {   
            //1.
            //2. cosulta a usuario
            if(empty($_POST["carnet"]) || empty($_POST['password']) )
            {
                $msg = "los campos estan vacios";
            }
            else
            {
                $usuario =  $_POST['carnet'];
                $pass =    $_POST['password'];
                $resPassword = $this->model->getName($usuario);
                if($resPassword)
                {   
                    $arrData = $resPassword;
                    if($arrData['status']==1 )
                    {
                        $reUser = password_verify($pass,$resPassword['clave']);
                        if($reUser)
                        {
                            //$resPassword["nombre"];exit;
                            $_SESSION['idUsuario'] =$arrData['id_persona'];
                            $_SESSION['idCarreraSede'] =$arrData['carrera_sede_id_carrera_sede'];
                            $_SESSION['idAdministrativo'] =$arrData['id_administrativo'];
                            $_SESSION['nombre_cargo'] =$arrData['nombre_cargo'];
                            $_SESSION['login'] =true;
                            $arrData = $this->model->sessionLogin($_SESSION['idUsuario']);
                            $_SESSION['userData']= $arrData;
                            $msg = "ok";

                        }
                        else 
                        {
                            $msg ="contrasena incorrecta";
                        }
                        
                    }
                    else 
                    {
                        $msg = "usuario inactivo";
                    }
                   
                }
               
                else{
                    $msg = "Usuario no existente";
                }
               
            }
            echo json_encode($msg,JSON_UNESCAPED_UNICODE);
        }
        public function registrar()
        {
            
            $this->views->getView($this, "Home/Registra");
        }

        /*OTRO REGISTRO*/
        public function registrara()
        {
            
            $this->views->getView($this, "Home/Registro");
        }
        /*REGISTRAR USUARIO BASE DE DATOS-estudiantes antiguos*/

        public function registrar_usuario()
        {
       
            if(empty($_POST['username']) || empty($_POST['ci'])|| empty($_POST['matricula'])|| empty($_POST['carrera'])|| empty($_POST['email'])||  empty($_POST['tel'])|| empty($_POST['direccion']))
            {
                $alert = array('status'=>false, 'msg' => "los campos estan vacios");
                exit();
            }
            else 
            {
              
                $nombres =  $_POST['username'];
                $ap_pat = $_POST['ap_pat'];
                $ap_mat = $_POST['ap_mat'];
                $ci =    $_POST['ci'];
                $matri =    $_POST['matricula'];
                $carrera =    $_POST['carrera'];
                $email =    $_POST['email'];
                $email_alt =    $_POST['email_alt'];
                $tel =    $_POST['tel'];
                $direccion =    $_POST['direccion'];

                $data = $this->model->getregistro($nombres,$ap_pat,$ap_mat, $ci,$matri,$carrera,$email,$email_alt,$tel,$direccion);
                if($data>0)
                {
                    $alert =  array('status'=>true, 'msg' => "su solicitud fue enviada" );
                }
                else if($data='existe')
                {
                    $alert = array('status'=>false, 'msg' => "ya existe los datos");
                }
                else 
                {
                    $alert = array('status'=>false, 'msg' => "No se pudo aceptar su solicitud" );
                }     
                echo json_encode($alert, JSON_UNESCAPED_UNICODE);
               

            }  
            
        }




        public function forgotpassword()
        {
            
            $this->views->getView($this, "Home/Forgotpassword");
        }


        public function salir()
        {
            session_start();
            session_unset();
            session_destroy();
           echo json_encode(JSON_UNESCAPED_UNICODE);
        }
        
}
?>