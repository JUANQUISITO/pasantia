<?php
    class PermisosModel extends Mysql
    {
        
        public function __construct()
        {
            // echo "conectado";
            parent::__construct();
        }

        public function selectModulos()
        {
            $sql = "SELECT * FROM modulo WHERE status != 0 ";
            $data = $this->select_all($sql);
            return $data; 
        }

       /* public function getregistro(string $nombres, string $ap_paterno, , string $ap_materno,  string $ci, string $matricula, string $carrera, string $email,  string $email_alt, string $tel, string $direccion)
        {
            $sql = "SELECT * FROM registro WHERE nombres = '$nombres' and ap_pat ='$ap_paterno' and ap_mat ='$ap_materno' and ci ='$ci' and matricula ='$matri' and carrera ='$carrera'and correo ='$email' and correo_alt ='$email_alt'and tel ='$tel'and direccion ='$direccion'";
            $data = $this->select($sql);
            return $data; 
        }*/
        public function selectPermisosRol(int $id)
        {
            $this->idRol = $id;
            $sql = "SELECT * FROM permisos WHERE rol_id_rol = $this->idRol";
            $data = $this->select_all($sql);
            return $data;
        }
        public function deletePermisos(int $idRol)
        {
            $this->idRol = $idRol;
            $sql = "DELETE FROM permisos WHERE rol_id_rol = $this->idRol";
            $data = $this->delete($sql);
            return $data;
        }

        public function insertarPermisos(int $idRol, int $idModulo, int $r,int $w,int $u,int $d)
        {
            $this->idRol = $idRol;
            $this->idModulo = $idModulo;
            $this->r = $r;
            $this->w = $w;
            $this->u = $u;
            $this->d = $d;
          
            $sql = "INSERT INTO permisos(rol_id_rol,modulo_id_modulo,r,w,u,d) VALUES(?,?,?,?,?,?)";
            $data = array( $this->idRol, $this->idModulo, $this->r, $this->w, $this->u, $this->d);
            $result = $this->insert($sql,$data);
            return $result;
        }
        public function permisosModulo(int $idrol)
        {
           
            $this->intRolid = $idrol;
            $sql = "SELECT
                    permisos.rol_id_rol, 
                    permisos.modulo_id_modulo, 
                    modulo.nombre, 
                    permisos.r, 
                    permisos.w, 
                    permisos.u, 
                    permisos.d
                FROM
                    modulo
                    INNER JOIN
                    permisos
                    ON 
                        modulo.id_modulo = permisos.modulo_id_modulo
                WHERE
                    permisos.rol_id_rol = '{$this->intRolid}'";
            $data = $this->select_all($sql);
            $arrayPermisos = array();
            for ($i=0; $i <count($data) ; $i++) { 
                $arrayPermisos[$data[$i]['modulo_id_modulo']] = $data[$i];
            }
            return $arrayPermisos;
        }
    }



?>