<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de convenios  
    class Docentes extends Controllers
    {  
        

        public function __construct()
        {
            session_start();
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            parent::__construct();
            getPermisos(13);
        }

        public function docentes()
        {   
        $data['page_id'] = 8;
        $data['page_title'] = "Pagina Docentes";
        $data['page_name']="docentes";
        $data['page_functions_js']="funciones_docentes.js";
        
        $this->views->getView($this, "Listar",$data);

    }
    


        public function getObtenerDocentes()
        { 
            $arrData = $this->model->selectDocentes();



    }
    
    public function getDocentes()
    { 
        $arrData = $this->model->selectDocentes();
        for($i=0; $i<count($arrData); $i++)
        {  
            $btn_editar     = '';
            $btn_eliminar   = '';
            $btn_ver        = '';

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
                $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarDocentes('.$arrData[$i]['id_docente'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }
            if($_SESSION['permisosMod']['d'])
            {
                $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarDocentes('.$arrData[$i]['id_docente'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
            }
            if($_SESSION['permisosMod']['r'])
            {
                $btn_ver = '<button class="btn btn-warning btn-sm" onClick="VerDocentes('.$arrData[$i]['id_docente'].')" title="Ver"><span class="bi bi-eye-fill"></span></button>';
            }
            $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.' '.$btn_ver.'</div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    } 
 
   
    
        public function insertar()
        {            
            $idConvenio = intval($_POST['idConvenio']);
            $codigo = $_POST['codigo'];
            $empresa = $_POST['empresa'];
            $tipoConvenio = $_POST['tipoConvenio'];
            //$status = $_POST['status'];  no recuperable
            $fechaInicio = $_POST['fechaInicio'];
            $fechaFinal = $_POST['fechaFinal'];
    
            //doc formulario pri-100
            $nameConvePdf  = $_FILES['archivo']['name'];//cargar el archivo
            $sizeConvePdf  = $_FILES['archivo']['size'];

            $new_name_file1 = null;

            $limite_kb = 4000000;
            $ruta = 'Assets/conveniosPdf/pruebas/anonymous.png';

            if ($sizeConvePdf <=$limite_kb  ) 
            {            
                if ($nameConvePdf != '' || $nameConvePdf != null  )
                {
                    $typeConvePdf = ($_FILES['archivo']['type']);
                    list($type, $extension) = explode('/', $typeConvePdf);
                    $fecha = date("YmdHis");
                    if ($extension == 'pdf') 
                    {
                        $dir = 'Assets/pdfs/convenios/'.$codigo."/";
                        if (!file_exists($dir))
                        {
                            mkdir($dir, 0777, true);
                        }                   
                        $file_tmp_convenioPdf = $_FILES['archivo']['tmp_name'];

                        $nameConvePdf= $fecha.$nameConvePdf;
                        var_dump($nameConvePdf);
                        $new_name_file1 = $dir .$this->file_name($nameConvePdf) . '.' . $extension;
                        
                        copy($file_tmp_convenioPdf, $new_name_file1);     
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
        
            if(empty($idConvenio))
            {
                //insertar
               $resp_insertar = $this->model->insertarConvenios($codigo, $empresa, $tipoConvenio, $fechaInicio, $fechaFinal,$new_name_file1);
               
              
                if ($resp_insertar ) 
                {
                    $alert = 'registrado';
                } 
                else if ($resp_insertar == 'existe') 
                {
                    $alert = 'existe';
                } 
                else 
                {
                    $alert = 'error';
                }
            }
            else 
            {
                //actualizar 
                $recuperar = $this->model->selectidconvenio($idConvenio);
                if(!empty($nameConvePdf))
                {
                    // $alert = "existe-titulo";
                    unlink($recuperar['archivo']);
                    $new_name_file1 = $new_name_file1;
                }
                else 
                {
                    // $alert = 'no-existe';
                    $new_name_file1 = $recuperar['archivo'];
                }
                $resp_actualizar = $this->model->actualizarConvenios($codigo, $empresa, $tipoConvenio, $fechaInicio, $fechaFinal,$new_name_file1, $idConvenio);
                
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
          
            //header("location: " . base_url() . "Convenios/Listar?msg=$alert");
            header("location: " . base_url() . "Convenios");
        }
        
        public function eliminar() //al momento de eliminar se debe usar el metodo get en php
        { 
            $idConvenio = intval($_POST['idConvenio']);
            $result = $this->model->eliminarConvenios($idConvenio);
            if($result)
            {
                $arrResponse = array('status' =>true, 'msg'=> 'Se ha eliminado el Convenio' );
            }
            else 
            {
                $arrResponse = array('status' =>true, 'msg'=> 'No se elimino el Convenio' );
            }
            $data = $this->model->selectConvenios();
           echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
        }


        public function editar(int $idConvenio)
        {   
            $idConvenio = $idConvenio;
            $arrData = $this->model->selectConvenio($idConvenio);
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

        public function ver(int $idConvenio)
        {   
            $idConvenio = $idConvenio;
            $arrData = $this->model->selectConvenio($idConvenio);
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
            $data = $this->model->selectConvenios();
            header("location: " . base_url() . "Convenios/?msg=$alert");

        }

        public function eliminados()
        {   
            $arrData = $this->model->selectDocentesInactivos();
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
    }          
?>