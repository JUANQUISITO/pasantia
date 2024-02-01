<?php
    class RolesModel extends Mysql
    {
        public $nombre;
        public $ci;
        public $codigo;
        
        public function __construct()
        {
            // echo "conectado";
            parent::__construct();
        }

        public function selectRoles()
        {
            $sql = 
            "SELECT
            	id_rol, 
                nombre,
                descripcion,
                status 
            FROM
                rol 
            WHERE
                status <> 0 
               ";
            $data = $this->select_all($sql);
            return $data; 
        }

        public function selectRolesUser()
        {
            $sql = 
            "SELECT
            	id_rol, 
                rol.nombre,
                rol.descripcion,
                rol.`status` 
            FROM
                rol 
            WHERE
                `STATUS` <> 0 
                AND rol.nombre <> 'Administrador'";
            $data = $this->select_all($sql);
            return $data; 
        }

        public function selectRolesInactivos()
        {
            $sql = "SELECT * FROM rol WHERE status != 1";
            $data = $this->select_all($sql);
            return $data; 
        }
        public function reingresarRol(int $idrol)
        {
            $this->idRol = $idrol;
            $consulta = "UPDATE rol SET status = ? WHERE id_rol ='{$this->idRol}'";
            $data = array(1);
            $result = $this->update($consulta,$data);
            return $result;
        }

        public function insertarRol(string $strnombre, string $strdescrip)
        {  
             $return = "";
            $this->nombre = $strnombre;
            $this->descripcion = $strdescrip;
            $verificar = "SELECT * FROM rol WHERE nombre ='{$this->nombre}'";
            $result = $this->select_all($verificar);
            if(empty($result))
            { 
                $sql = "INSERT INTO rol(nombre,descripcion) VALUES(?,?)";
                $data = array($this->nombre, $this->descripcion);
                $result = $this->insert($sql,$data);
                $return = $result;
            }
            else {
                $return = "existe";
            }
            return $return;
            
        }
        
        public function selectRol($idrol)
        {
            $return = "";
            $this->idRol = $idrol;
            $sql = "SELECT * FROM rol WHERE id_rol = $this->idRol";
            $res = $this->select($sql);
            if (empty($res)) {
               return false;
            }
            return $res;
            
        }
        public function actualizarRol(int $idrol,string $txtnombreRol, string $txtdescripcion )
        {   
            $return = "";
            $this->idRol = $idrol;
            $this->nombreRol = $txtnombreRol;
            $this->descripcion = $txtdescripcion;
            $verificar = "SELECT * FROM rol WHERE nombre = '{$this->nombreRol}' and id_rol !='{$this->idRol}'";
            $result = $this->select_all($verificar);
            if(empty($result))
            {
                $consulta = "UPDATE rol SET nombre = ?, descripcion = ? WHERE id_rol ='{$this->idRol}'  ";
                $data = array($this->nombreRol,$this->descripcion);
                $result = $this->update($consulta,$data);
                $return = $result;
            }
            else 
            {
                $return ="existe";
            }
            
            return $return;

        }

        public function eliminarRol(int $idrol)
        {   
            $this->idRol = $idrol;
            $consulta = "UPDATE rol SET status = ? WHERE id_rol ='{$this->idRol}'";
            $data = array(0);
            $result = $this->update($consulta,$data);
            return $result;
        }
    }
?>