<?php
ob_start();
    class Personas extends Controllers
    {  
        public function __construct()
        {
            parent::__construct();

            session_start();
        
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
        }

        public function personas() 
        {
            $data['page_id'] = 6;
            $data['page_title'] = "Perfil de Usuario";
            $data['page_name'] = "Perfil"; 
            $data['page_functions_js']="functions_personas.js";
            $this->views->getView($this, "Perfil",$data);
        }

        public function getPersona()
        {   
            $id =$_SESSION['idUsuario']; 
            $arrData = $this->model->selectPersona($id);
        
        
            // for($i=0;$i<count($arrData); $i++)
            // {
            //     if($arrData[$i]['status']==1)
            //     {
            //         $arrData[$i]['status'] = '<span class="badge badge-success">Activo<span>';
            //     }else
            //     {
            //         $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo<span>';
            //     }
                
            //     $arrData[$i]['options']= '<div class="text-center">
            //         <button  class="btn btn-primary btn-sm"  onClick="EditarRol('.$arrData[$i]['id_rol'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>
            //         <button class="btn btn-danger btn-sm" onClick="EliminarRol('.$arrData[$i]['id_rol'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
            //                             </div>';
                
            // }
            $this->views->getView($this, "Perfil",$arrData);
          
        }
       
     //obteniendo datos desde la BD
        public function getSelectPersonas()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectPersonas();
            //var_dump($arrData);
            //exit();
            if(count($arrData)>0){
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['usuario_id_persona'].'">'.$arrData[$i]['nombres'].'</option>';
                    }
                }
            }
            echo $htmlOptions;
        }

    public function setPersons()
    {
    
        // var_dump($_SESSION);
        $inputIdPersona = $_POST['inputIdPersona'];
        $nombre =  $_POST['nombre'];
        $apellidoPaterno = $_POST['apellidoPaterno'];
        $apellidoMaterno = $_POST['apellidoMaterno'];
        $email = $_POST['email'];
        $carnet = $_POST['carnet'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];

        if(empty($email))
        {
            var_dump($_POST);
           
        }
        else 
        {
            if(empty($inputIdPersona))
            {
                
            }
            else 
            {
                var_dump("actualizar datos");
                    $resp_actualizar = $this->model->updateP($inputIdPersona,$nombre,$apellidoPaterno,$apellidoMaterno,$email,$carnet,$telefono,$direccion);
                    
                    $alert=($resp_actualizar)?'modificado':'error';
                
                }
                header("location: " . base_url() . "Personas/getPersona?msg=$alert");
            }
    }

    public function nuevaP()
    {   
        $id =$_SESSION['idUsuario']; 
        $arrData = $this->model->selectPersona($id);
        $url = base_url()."Personas/nuevaP";
  
        if(empty($arrData['nombres'])  )
        {
            $this->views->getView($this, "Listar",$arrData);
        }
       
        else 
        {
            header("location: " . base_url() . "Dashboard/mostrarAdministrador");
            // $this->views->getView($this, "./Home/index3",$arrData);
        }

      
        
    }
}
?>