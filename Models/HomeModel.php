<?php
    class HomeModel extends Mysql
    {
        private $usuario;
        private  $clave;
        private $strToken;
        private $intIdUsuario;

        public function __construct()
        {
            // echo "conectado";
            parent::__construct();
        }
        public function getName(string $getUser)
        {  
            $this->usuario = $getUser;
                $sql ="SELECT
                        usuario.id_persona,
                        usuario.nombre_usuario,
                        usuario.clave,
                        usuario.rol_id_rol,
                        usuario.status,
                        rol.nombre,
                        administrativo.carrera_sede_id_carrera_sede,
                        persona.nombres,
                        persona.apellido_paterno,
                        persona.apellido_materno,
                        administrativo.id_administrativo,
                        cargo.nombre_cargo 
                    FROM
                        usuario
                        INNER JOIN rol ON usuario.rol_id_rol = rol.id_rol
                        INNER JOIN persona ON usuario.id_persona = persona.usuario_id_persona
                        LEFT JOIN administrativo ON persona.usuario_id_persona = administrativo.persona_usuario_id_persona
                        LEFT JOIN cargo ON administrativo.cargo_id_cargo = cargo.id_cargo
                    WHERE
                        usuario.nombre_usuario = '{$this->usuario}' 
                        AND usuario.`status` = '1'";
               
            $data = $this->select($sql);
            return $data;
        }
        public function sessionLogin(int $userId)
        {
            $this->intIdUsuario = intval($userId);
            
            $sql = "SELECT
                u.id_persona,
                u.rol_id_rol, 
                u.nombre_usuario,
                u.fecha_creada,
                u.fecha_actualizada,
                u.status,

                r.id_rol,
                r.nombre,
                r.descripcion
                
            
            FROM usuario u
            INNER JOIN rol r
            on u.rol_id_rol = r.id_rol
            WHERE u.id_persona = $this->intIdUsuario";
            $data = $this->select($sql);
          
            return $data; 
            
        }

        public function getregistro(string $nombres,string $ap_pat,string $ap_mat, string $ci,int $matri,string $carrera,string $email,string $email_alt,int $tel,string $direccion)
        {
            $this->nombres = $nombres;
            $this->ap_pat = $ap_pat;
            $this->ap_mat = $ap_mat;
            $this->ci = $ci;
            $this->matri = $matri;
            $this->carrera = $carrera;
            $this->email = $email;
            $this->email_alt = $email_alt;
            $this->tel = $tel;
            $this->direccion = $direccion;

            $consulta = "SELECT * FROM solicitudes_estudiantes_antiguos WHERE ci_ant ='$ci' and matricula_ant ='$matri'";
            $consulta = $this->select_all($consulta);
            $msg ="";
            if(empty($consulta))
            { 
                $sql = "INSERT INTO solicitudes_estudiantes_antiguos(nombres_ant, ap_paterno_ant, ap_materno_ant, ci_ant, matricula_ant, carrera_ant, correo_ant, correo_alt_ant, telefono_ant, direccion_ant, fecha_solicitud) VALUES(?,?,?,?,?,?,?,?,?,?,now()) ";
                $data = array($this->nombres, $this->ap_pat, $this->ap_mat, $this->ci,$this->matri, $this->carrera, $this->email, $this->email_alt, $this->tel, $this->direccion);
                $insertar = $this->insert($sql,$data);
                $msg= $insertar;
            }
            else 
            {
                $msg = 'existe';
                
            }
         return $msg;    
        }


    }



?>