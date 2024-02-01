<?php 
ob_start();
class Empresas extends Controllers
{
    public function __construct()
    {
        session_start();
        if (!$_SESSION['login'] && empty($_SESSION)) 
        {
             header("location: " . base_url()."Home");
        }
        parent::__construct();
		getPermisos(5);
    }

    public function empresas() 
    {
        $data['page_name']="empresa_convenio";
        $data['page_functions_js']="funciones_empresa.js";
        
        $this->views->getView($this, "Listar",$data);
    }
    
    
     //obteniendo datos desde la BD
    public function getSelectEmpresas()
    {
        $htmlOptions ="";
        $arrData = $this->model->selectEmpresas();
        if(count($arrData)>0){
            $htmlOptions .='<option value="0">--SELECCIONE LA EMPRESA-- </option>';
            for($i=0; $i<count($arrData);$i++)
            {
                if($arrData[$i]['status']==1)
                {
                    $htmlOptions.='<option value="'.$arrData[$i]['id_empresa'].'">'.$arrData[$i]['nombre_empresa'].'</option>';
                }
            }
        }
        echo $htmlOptions;
    }


    
    public function getEmpresas()
    {   
        $arrData = $this->model->selectEmpresas();
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
                $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarEmpresas('.$arrData[$i]['id_empresa'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }
            if($_SESSION['permisosMod']['d'])
            {
                $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarEmpresas('.$arrData[$i]['id_empresa'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
            }
            $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    }
  
    public function insertar()
    {
        //guardar las variables 
        $idEmpresa = intval($_POST['idEmpresa']);
        $nombre = $_POST['NombreEmpresa'];
        $areaEmpresa = $_POST['areaEmpresa'];
        $nroNit = $_POST['nroNit'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $telfEmpresa = $_POST['telfEmpresa'];
        $personaContacto = $_POST['personaContacto'];
        $cargo = $_POST['cargo'];
        $telefContacto = $_POST['telefContacto'];
        if(empty($nombre)|| empty($areaEmpresa)|| empty($personaContacto))
        {
            $alert = 'completar';
        }
        else 
        {
            if(empty($idEmpresa)) 
            {
                //insertar
                $resp_insertar = $this->model->insertarEmpresa($nombre,$areaEmpresa,$nroNit,$ciudad,$direccion,$telfEmpresa,$personaContacto,$cargo,$telefContacto);
                $alert=($resp_insertar)?'registrado':'error';
            } 
            else 
            {
               //actualizar 
               $resp_actualizar = $this->model->actualizarEmpresa($idEmpresa,$nombre,$areaEmpresa,$nroNit,$ciudad,$direccion,$telfEmpresa,$personaContacto,$cargo, $telefContacto);
               $alert=($resp_actualizar)?'modificado':'error';
            }
        }
        
        header("location: " . base_url() . "Empresas?msg=$alert");
        die();
    }

    public function editar(int $idEmpresa)
    {
        $id = intval($idEmpresa);
        $arrData = $this->model->selectEmpresa($id);
        if(!$arrData)
        {
            $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );
        }
        else 
        {
            $arrResponse =  array('status'=>true, 'data' => $arrData );
        }
        echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE ); 
    }
   
    public function eliminados()
    {   
        $arrData = $this->model->selectEmpresasInactivos();
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
        $arrData = $this->model->reingresarEmpresa($id);
        $alert=($arrData)?'reingresar':'error';
        
        $data = $this->model->selectEmpresas();
        header("location: " . base_url() . "Empresas?msg=$alert");

    }

    public function actualizar()
    {   
        $idEmpresa = intval($_POST['idEmpresa']);
        $nombre = $_POST['NombreEmpresa'];
        $areaEmpresa = $_POST['areaEmpresa'];
        $nroNit = $_POST['nroNit'];
        $ciudad = $_POST['ciudad'];
        $direccion = $_POST['direccion'];
        $telfEmpresa = $_POST['telfEmpresa'];
        $personaContacto = $_POST['personaContacto'];
        $cargo = $_POST['cargo'];
        $telefContacto = $_POST['telefContacto'];

        
        $actualizar = $this->model->actualizarEmpresa($idEmpresa,$nombre,$areaEmpresa,$nroNit,$ciudad,$direccion,$telfEmpresa,$personaContacto,$cargo, $telefContacto);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert =  'error';
        }
        $data = $this->model->selectEmpresas();
        header("location: " . base_url() . "Empresas?msg=$alert");
    }

    public function eliminar()
    {
        $id = intval($_POST['idEmpresa']);

        $eliminar = $this->model->eliminarEmpresa($id);
        
        if($eliminar)
        {
            $alert =  array('status'=>true, 'msg' => "Se elimino la empresa" );
        }
        else 
        {
            $alert = array('status'=>true, 'msg' => "No se elimino la empresa" );
        }     
        echo json_encode($alert, JSON_UNESCAPED_UNICODE);
    }

    
}
?>