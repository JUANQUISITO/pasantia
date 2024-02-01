<?php
	ob_start();
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de convenios  
class TipoConvenios extends Controllers
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
    
    public function tipoConvenios() 
    {
        $data['page_name']="rol_usuario";
        $data['page_functions_js']="funciones_tipoConvenio.js";
        $this->views->getView($this, "Listar", $data);
    }
    
    //obteniendo datos desde la BD
    public function getSelectTipos()
    {
        $htmlOptions ="";
        $arrData = $this->model->selectTipoConvenios();
        if(count($arrData)>0){
            $htmlOptions .='<option value="0">--SELECCIONE EL TIPO DE CONVENIO-- </option>';
            for($i=0; $i<count($arrData);$i++)
            {
                if($arrData[$i]['status']==1)
                {
                    $htmlOptions.='<option value="'.$arrData[$i]['id_tipo_convenio'].'">'.$arrData[$i]['nombre_tipo'].'</option>';
                }
            }
        }
        echo $htmlOptions;
    }



    public function ObtenerDatos()
    {
        $arrData = $this->model->selectTipoConvenios();
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
                $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarTipoConvenios('.$arrData[$i]['id_tipo_convenio'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }
            if($_SESSION['permisosMod']['d'])
            {
                $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarTipoConvenios('.$arrData[$i]['id_tipo_convenio'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
            }
            $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
        }

        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    }
    

    public function insertar()
    {
        //guardar las variables 
        $idTipoConvenio = $_POST['idTipoConvenio'];
        $tipoConvenio = trim($_POST['tipoConvenio']);
        $descripcion = trim($_POST['descripcion']);
        $tipoConvenio = ucwords($tipoConvenio);
        $descripcion = ucwords($descripcion);
		if(empty($tipoConvenio) )
		{
			$alert='vacio';
		}
		else 
		{
			
			if(empty($idTipoConvenio))
			{
				//insertar
				$resp_insertar = $this->model->insertarTipoConvenios($tipoConvenio, $descripcion);
				$alert=($resp_insertar)?'registrado':'error';
			}
			else 
			{
				//actualizar 
				$resp_actualizar = $this->model->actualizarTipoConvenios($idTipoConvenio, $tipoConvenio, $descripcion);
				$alert=($resp_actualizar)?'modificado':'error';
			}
		}
        header("location: " . base_url() . "TipoConvenios?msg=$alert");
        die();
    }

    public function editar(int $idTipoConvenio)
    {
        $id = intval($idTipoConvenio);
        $arrData = $this->model->selectTipo($id);
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
        header("location: " . base_url() . "tipoConvenios?msg=$alert");

    }
/*
    public function actualizar()
    { 
        // $idConvenio = intval($_POST['idConvenio']);
        $idTipoConvenio = $_POST['idTipoConvenio']; 
        $tipoConvenio = $_POST['tipoConvenio'];
        $descripcion = $_POST['descripcion'];
        
        //$status = $_POST['status'];
        
        //$actualizar = $this->model->actualizarConvenios($idConvenio,$codigo, $empresa, $tipoConvenio, $fechaInicio, $fechaFinal);
        $actualizar = $this->model->actualizarTipoConvenios($tipoConvenio,$descripcion, $idTipoConvenio);
        if ($actualizar == 1) {
            $alert = 'modificado';
        } else {
            $alert =  'error';
        }
        $data = $this->model->selectTipoConvenios();
        header("location: " . base_url() . "tipoConvenios?msg=$alert");
        die();
    }
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
}          
?>