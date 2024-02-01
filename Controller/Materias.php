<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de convenios  
ob_start();
class Materias extends Controllers
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
    
    public function materias() 
    {
        $data['page_name']="materias_docente";
        $data['page_functions_js']="funciones_materias.js";
        $this->views->getView($this, "Listar",$data);
    }
    
    //obteniendo datos desde la BD
    public function getSelectMaterias()
    {
        $htmlOptions ="";
        $arrData = $this->model->selectMaterias();
        if(count($arrData)>0){
            $htmlOptions .='<option value="0">--SELECCIONE LA MATERIA-- </option>';
            for($i=0; $i<count($arrData);$i++)
            {
                if($arrData[$i]['status']==1)
                {
                    $htmlOptions.='<option value="'.$arrData[$i]['id_materia'].'">'.$arrData[$i]['nombre_materia'].'</option>';
                }
            }
        }
        echo $htmlOptions;
    }

    public function ObtenerDatos()
    {
        $arrData = $this->model->selectMaterias();
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
                $btn_editar = '<button  class="btn btn-primary btn-sm"  onClick="EditarMaterias('.$arrData[$i]['id_materia'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
            }
            if($_SESSION['permisosMod']['d'])
            {
                $btn_eliminar = '<button class="btn btn-danger btn-sm" onClick="EliminarMaterias('.$arrData[$i]['id_materia'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
            }
            $arrData[$i]['options']= '<div class="text-center">'.$btn_editar.' '.$btn_eliminar.'</div>';
        }
        echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
    }

    public function insertar()
    {
        //guardar las variables 
        $idMateria = $_POST['idMateria'];
        $materia = trim($_POST['materia']);
        $siglaMateria = trim($_POST['siglaMateria']);
        $semestre = trim($_POST['semestre']);
        $materia = ucwords($materia);
        $siglaMateria = ucwords($siglaMateria);
        $semestre = ucwords($semestre);
        if(empty($materia)|| empty($semestre))
        {
            $alert ="completar";
        }
        else 
        {
            if(empty($idMateria))
            {
                //insertar
                $resp_insertar = $this->model->insertarMaterias($materia,$siglaMateria, $semestre);
                $alert=($resp_insertar)?'registrado':'error';
            }
            else 
            {
                //actualizar 
                $resp_actualizar = $this->model->actualizarMaterias($idMateria, $materia, $siglaMateria, $semestre);
                $alert=($resp_actualizar)?'modificado':'error';
            }
        }
        
        header("location: " . base_url() . "Materias?msg=$alert");
        die();
    }

    public function editar(int $idMateria)
    {
        $id = intval($idMateria);
        $arrData = $this->model->selectMateria($id);
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
        $arrData = $this->model->selectMateriaInactivos();
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
        $arrData = $this->model->reingresarMateria($id);
        $alert=($arrData)?'reingresar':'error';
        
        $data = $this->model->selectMaterias();
        header("location: " . base_url() . "materias?msg=$alert");

    }

    public function eliminar()
    {
        $id = intval($_POST['idMateria']);

        $eliminar = $this->model->eliminarMaterias($id);
        
        if($eliminar)
        {
            $alert =  array('status'=>true, 'msg' => "Se elimino la materia" );
        }
        else 
        {
            $alert = array('status'=>true, 'msg' => "No se elimino la materia" );
        }     
        echo json_encode($alert, JSON_UNESCAPED_UNICODE);
    }
}          
?>