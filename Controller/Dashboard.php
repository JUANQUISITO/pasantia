<?php
ob_start();
    class Dashboard extends Controllers
    {   
        public function __construct()
        {
            parent::__construct();
            session_start();
            if (!$_SESSION['login'] && empty($_SESSION)) 
            {
                 header("location: ".base_url()."Home");
            }
            getPermisos(1);
        }
          //MOSTRANDO EL DASHBOARD
          public function mostrarAdministrador() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
          {
            $data['page_name'] = "Mostrando Dashboard"; 
            $data['cantConv']= $this->model->cantConvenios();
            $data['totalSolicitudes'] = $this->model->cantSolicitud();
            $data['cantEmpresas'] = $this->model->cantEmpresas();
            $data['cantEstudiantes'] = $this->model->cantEstudiantes();
            $data['cantidad_seg'] = $this->model->obtenerCantidadEstudiantes();
            $data['cantAdministrativos'] = $this->model->cantAdministrativos();
            $data['cantPublicaciones'] = $this->model->cantPublicaciones();
            $data['cantSolicitudPasantias'] = $this->model->cantSolicitudPasantias();
            $anio = date('Y');
            $mes = date('m');
            $data['solicitudMDia'] = $this->model->cantidadSolicitudporMDia($anio,$mes);
            $data['solicitudYear'] = $this->model->cantidiadSolicitudporAnio($anio);
            $data['solicitudporcarrera'] = $this->model->cantidadSolicitudporCarrera($anio,$mes);
            $this->views->getView($this, "index3",$data);
          }
          
          //MOSTRANDO ENLACES DENTRO DEL DASHBOARD
          public function mostrarDashboard() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
          {
                
              $this->views->getView($this, "Home/index3");
          }
  
          public function mostrarCharts() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
          {
                
              $this->views->getView($this, "Menus/charts");
          }
  
          public function mostrarEstudiante() //este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
          {
                
              $this->views->getView($this, "Menus/MenuPrincipal");
          }

    }
?>