<?php
	ob_start();
    class Roles extends Controllers
    {  
        var $nombre;
        var $descripcion;
        
        public function __construct()
        {
            parent::__construct();

            session_start();
        
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: " . base_url()."Home");
            }
            getPermisos(11);
        }

        public function roles() 
        {
            $data['page_id'] = 2;
            $data['page_title'] = "Pagina Roles";
            $data['page_name'] = "roles"; 
            $data['page_functions_js']="functions_roles.js";
            $this->views->getView($this, "Listar",$data);
        }

        public function getRoles()
        {
            $arrData = $this->model->selectRoles();
            
            for($i=0;$i<count($arrData); $i++)
            {
                $btn_permisos ='';
                $btn_editar = '';
                $btn_eliminar ='';

                if($arrData[$i]['status']==1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo<span>';
                }else
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo<span>';
                }

                if($_SESSION['permisosMod']['u'])
                {
                    $btn_editar ='<button  class="btn btn-secondary btn-sm"  onClick="PermisosRol('.$arrData[$i]['id_rol'].')" title="Permisos"><i class="fas fa-key"></i></button>';
                }
                if($_SESSION['permisosMod']['u'])
                {
                    $btn_permisos = '<button  class="btn btn-primary btn-sm"  onClick="EditarRol('.$arrData[$i]['id_rol'].')" title="Editar"><i class="fas fa-pencil-alt"></i></button>';
                }
                if($_SESSION['permisosMod']['d'])
                {
                    $btn_eliminar ='<button class="btn btn-danger btn-sm" onClick="EliminarRol('.$arrData[$i]['id_rol'].')" title="Eliminar"><i class="fas fa-trash-alt"></i></button>';
                }
                
                $arrData[$i]['options']= '<div class="text-center">'.$btn_permisos.' '.$btn_editar.' '.$btn_eliminar.'</div>';
                
            }

           echo json_encode($arrData,JSON_UNESCAPED_UNICODE);
            

        }

        public function getSelectRoles()
        {
            $htmlOptions ="";
            $arrData = $this->model->selectRolesUser();
            if(count($arrData)>0){
                $htmlOptions .='<option value="0"> --SELECCIONE UN ROL-- </option>';
                for($i=0; $i<count($arrData);$i++)
                {
                    if($arrData[$i]['status']==1)
                    {
                        $htmlOptions.='<option value="'.$arrData[$i]['id_rol'].'">'.$arrData[$i]['nombre'].'</option>';

                    }
                }
            }
            echo $htmlOptions;

        }
        
        public function insertar()
        {  
            //guardar las variables 
            $idrol = trim($_POST['idRoles']);
            $nombre = ucwords($_POST['nombre']);
            $descripcion = ucwords($_POST['descripcion']);
            if(empty($nombre) || empty($descripcion))
            {
                $alert = 'completar';
            }else 
            {
                if(empty($idrol))
                {
                    //insertar
                    $resp_insertar = $this->model->insertarRol($nombre,$descripcion);
                    if($resp_insertar>0)
                    {
                        $alert = 'registrado';
                        
                    }else if ($resp_insertar == 'existe')
                    {   
                        $alert  = 'existe';
                    }else 
                    {
                        $alert = 'error';
                    }
                    // $alert=($resp_insertar)?'registrado':'error';
                }
                else 
                {
                    //actualizar 
                    $resp_actualizar = $this->model->actualizarRol($idrol,$nombre,$descripcion);
                    $alert=($resp_actualizar)?'modificado':'error';
                }
             }
            header("location: " . base_url() . "Roles/Roles?msg=$alert");

        }


        public function eliminados()
        {
            $arrData = $this->model->selectRolesInactivos();
            for($i=0;$i<count($arrData); $i++)
            {
                if($arrData[$i]['status'] ==1)
                {
                    $arrData[$i]['status'] = '<span class="badge badge-success">Activo<span>';
                }else
                {
                    $arrData[$i]['status'] = '<span class="badge badge-danger">Inactivo<span>';
                }
            }
            $this->views->getView($this,"Eliminados",$arrData);//se pasa las variables mediate el getview
        //    echo json_encode($arrData,JSON_UNESCAPED_UNICODE);

        }
        public function reingresar()
        {
            $id = intval($_GET['id']);
            $arrData = $this->model->reingresarRol($id);
            $alert=($arrData)?'reingresar':'error';
            
            $data = $this->model->selectRoles();
            header("location: " . base_url() . "Roles/Roles?msg=$alert");

        }

        public function editar(int $idRol)
        {   
            $idrol = intval($idRol);
            $arrData = $this->model->selectRol($idrol);
            if(!$arrData)
            {
                $arrResponse =  array('status'=>true, 'msg' => "Datos no encontrados" );
            }else 
            {
                $arrResponse =  array('status'=>true, 'data' => $arrData );
            }
            echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE ); 
        }
    
        public function eliminar()
        { 
            $idrol = intval($_POST['idRol']);
           
            $eliminar = $this->model->eliminarRol($idrol);
    
            if($eliminar)
            {
                $alert =  array('status'=>true, 'msg' => "Se elimino el Rol" );
            }
            else 
            {
                $alert = array('status'=>true, 'msg' => "No se elimino el Rol" );
            }     
            echo json_encode($alert, JSON_UNESCAPED_UNICODE);
        }
    }
?>
