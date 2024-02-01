<?php
//este es la funcion  donde se esta obteniendo el metodo o funcion desde index.php Home/home por defecto
//mostrando la lista de Pasantias  
    class Pasantias extends Controllers
    {  
        public function listar() 
                    { 
                        $this->views->getView($this, "Listar");
                    }

        /*solicitudes de jefatura de carrera y direccion academica*/   
        public function listar_jefcarrera() 
                    { 
                        $this->views->getView($this, "jef_carrera");
                    }

        public function listar_diracade() 
                    { 
                        $this->views->getView($this, "dir_academica");
                    }

    }          
?>