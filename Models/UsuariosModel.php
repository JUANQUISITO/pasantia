<?php
    class UsuariosModel extends Mysql
    {
       
        public function __construct()
        {
            // echo "conectado";
            parent::__construct();
        }

        public function selectUsuarios()
        {
            $sql = "SELECT
            u.id_persona,
            u.nombre_usuario,--             u.clave,
            u.fecha_creada,
            p.nombres,
            p.apellido_materno,
            p.apellido_paterno,
            CONCAT( p.nombres, ' ', p.apellido_paterno, ' ', p.apellido_materno ) AS nombre_completo,
            u.fecha_actualizada,
            u.fecha_eliminada,
            u.`status`,
            u.rol_id_rol,
            r.nombre,
            a.id_administrativo,
            a.cargo_id_cargo,
            a.carrera_sede_id_carrera_sede,
            a.persona_usuario_id_persona,
            c.nombre_cargo,
            cs.id_carrera_sede,
            cs.carrera_id_carrera,
            cs.sedes_id_sedes,
            CONCAT ( ca.carrera, ' - ', s.sede ) AS carreras_sedes,
            ca.carrera,
            s.sede 
        FROM
            usuario u
            INNER JOIN rol r ON u.rol_id_rol = r.id_rol
            LEFT JOIN persona p ON u.id_persona = p.usuario_id_persona
            LEFT JOIN administrativo a ON p.usuario_id_persona = a.persona_usuario_id_persona
            LEFT JOIN cargo c ON a.cargo_id_cargo = c.id_cargo
            LEFT JOIN carrera_sede cs ON a.carrera_sede_id_carrera_sede = cs.id_carrera_sede
            LEFT JOIN carrera ca ON cs.carrera_id_carrera = ca.id_carrera
            LEFT JOIN sedes s ON cs.sedes_id_sedes = s.id_sedes 
        WHERE
            u.`status` <> 0 AND r.nombre <> 'Administrador'";
           
            $data = $this->select_all($sql);
        
            return $data; 
        }

        // select usuarios Carrera-Sede (CS)
        public function selectUsuariosCS()
        {
                $sql = "SELECT
                usuario.id_persona, 
                usuario.nombre_usuario, 
                usuario.clave, 
                usuario.fecha_creada, 
                usuario.fecha_actualizada, 
                usuario.fecha_eliminada, 
                usuario.`status`, 
                usuario.rol_id_rol, 
                rol.nombre, 
                cargo.nombre_cargo, 
                persona.nombres, 
                persona.apellido_paterno, 
                persona.apellido_materno, 
                administrativo.cargo_id_cargo, 
                CONCAT (carrera.carrera,' - ',sedes.sede) AS carreras_sedes,
                administrativo.carrera_sede_id_carrera_sede, 
                carrera_sede.id_carrera_sede, 
                carrera.carrera, 
                sedes.sede

                FROM
                carrera_sede
                INNER JOIN
                carrera
                ON 
                    carrera_sede.carrera_id_carrera = carrera.id_carrera
                INNER JOIN
                sedes
                ON  carrera_sede.sedes_id_sedes = sedes.id_sedes
                INNER JOIN
                administrativo
                ON 
                    carrera_sede.id_carrera_sede = administrativo.carrera_sede_id_carrera_sede
                INNER JOIN
                persona
                ON 
                    administrativo.persona_usuario_id_persona = persona.usuario_id_persona
                INNER JOIN
                usuario
                ON 
                    usuario.id_persona = persona.usuario_id_persona
                INNER JOIN
                rol
                ON 
                    usuario.rol_id_rol = rol.id_rol
                INNER JOIN
                cargo
                ON 
                administrativo.cargo_id_cargo = cargo.id_cargo
                WHERE usuario.status !=0";
           
            $data = $this->select_all($sql);
        
            return $data; 
        }

        public function selectUsuariosEliminados()
        {
            $sql = "SELECT
                u.id_persona,
                u.rol_id_rol, 
                u.nombre_usuario,
                u.clave,
                u.fecha_creada,
                u.fecha_actualizada,
                u.fecha_eliminada,
                u.status,

                r.id_rol,
                r.nombre,
                r.descripcion
             FROM usuario u
             INNER JOIN rol r
            on u.rol_id_rol = r.id_rol
            WHERE u.status !=1";
           
            $data = $this->select_all($sql);
        
            return $data; 
        }

        //hacemos pasar los datos de usuario a persona y despues a administrativo
        public function insertUsuarios(int $rol,string $username, string $password)
        {   
            $return = "";
            $this->username = $username;
            $this->password = $password;
            $this->rol = intval($rol);

            $verificar = "SELECT * FROM usuario WHERE nombre_usuario = '{$this->username}' ";
            $result = $this->select_all($verificar);
            
            if(empty($result))
            {   
                $query ="INSERT INTO usuario(nombre_usuario,clave,rol_id_rol,fecha_creada) VALUES(?,?,?,now())";
                $data = array($this->username,$this->password,$this->rol);
                $result = $this->insert($query,$data);
                $this->id = intval($result);
                if($result)
                {
                    $query ="INSERT INTO  persona(usuario_id_persona, carnet,fecha_creada) VALUES(?,?,now())";
                    $data = array($this->id,$this->username);
                    $result = $this->insert($query,$data);
                    return $this->id;            
                }
                //$return = $result;
                return false; // si no se inserto en la tabla usuario retornara un false 
            }
            else 
            {
                $return = "existe";
            }
            return $return;

        }

        public function insertarAdministrativos(string $cargo, string $carreraSede=NULL, int $idPersona) 
        {   
            $this->cargo = $cargo;
            $this->carreraSede = $carreraSede;
            $this->idPersona = $idPersona;
          
            $query = "INSERT INTO administrativo(cargo_id_cargo, carrera_sede_id_carrera_sede, persona_usuario_id_persona) VALUES (?,?,?)";
            $data = array($this->cargo, $this->carreraSede, $this->idPersona);
            $resul = $this->insert($query, $data);
            return $resul;
        }
        
        public function selectUsuario(int $idUsuario)
        {   
            $this->idUsuario = intval($idUsuario);
            // $query = "SELECT * FROM usuarios WHERE idUsuario = $this->idUsuario";
            $query = "SELECT
            usuario.id_persona, 
            usuario.nombre_usuario, 
            usuario.clave, 
            usuario.fecha_creada, 
            usuario.fecha_actualizada, 
            usuario.fecha_eliminada, 
            usuario.`status`, 
            usuario.rol_id_rol, 
            rol.nombre, 
            cargo.nombre_cargo, 
            persona.nombres, 
            persona.apellido_paterno, 
            persona.apellido_materno, 
            administrativo.id_administrativo, 
            administrativo.cargo_id_cargo, 
            administrativo.carrera_sede_id_carrera_sede
            FROM
            usuario
            INNER JOIN
            rol
            ON 
                usuario.rol_id_rol = rol.id_rol
            INNER JOIN
            persona
            ON 
                usuario.id_persona = persona.usuario_id_persona
            INNER JOIN
            cargo
            INNER JOIN
            administrativo
            ON 
                cargo.id_cargo = administrativo.cargo_id_cargo AND
                persona.usuario_id_persona = administrativo.persona_usuario_id_persona
            WHERE usuario.id_persona = $this->idUsuario";
            $result = $this->select($query);
            if(empty($result))
            {
                $result =0;
            }
            
            return $result;
        }
        /*
        public function actualizarU(int $idUsuario, int $idRol, string $usuario, string $contrasena)
        {   
            $return ="";
            $this->idUsuario = $idUsuario;
            $this->idRol = $idRol;
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;

            $verificar ="SELECT * FROM usuario WHERE nombre_usuario = '{$this->usuario}' and  id_persona != '{$this->idUsuario}'";
            $result = $this->select_all($verificar);

            if(empty($result))
            {   
                // UPDATE `usuarios` SET `idRol`=2,`usuario`='roxana',`clave`='123',`fechaRegistro`=now(),`status`='1' WHERE idUsuario = 1
                $query = "UPDATE usuario SET rol_id_rol = ?, nombre_usuario = ?,clave = ?,fecha_actualizada = now() WHERE id_persona = '{$this->idUsuario}' ";
                $data = array($this->idRol,$this->usuario, $this->contrasena);
                $result = $this->update($query,$data);
                $return = $result;         
            }else 
            {
                $return = "existe";
            }     
             return $return;
        }
        */

        // DE ADMINISTRATIVOS NECESITAMOS Cargo y carrera-sede
        public function actualizarU(int $idUsuario, int $idRol, string $usuario, string $contrasena, int $idAdministrativo,int $cargo,int $carreraSede )
        {   
            $return ="";
            $this->idUsuario = $idUsuario;
            $this->idRol = $idRol;
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;
            $this->idAdministrativo = $idAdministrativo;
            $this->cargo = $cargo;
            $this->carreraSede = $carreraSede;
            
            //quiza omitir
            $verificar ="SELECT * FROM usuario WHERE nombre_usuario = '{$this->usuario}' and  id_persona != '{$this->idUsuario}'";
            $result = $this->select_all($verificar);

            if(empty($result))
            {   
                $query = "UPDATE usuario SET rol_id_rol = ?, nombre_usuario = ?,clave = ?,fecha_actualizada = now() WHERE id_persona = '{$this->idUsuario}' ";
                $data = array($this->idRol,$this->usuario, $this->contrasena);
                $result = $this->update($query,$data);
                $this->id = intval($result);
                if($result)
                {
                    $query = "UPDATE administrativo SET carrera_sede_id_carrera_sede=?,cargo_id_cargo=? WHERE id_administrativo='{$this->idAdministrativo}'";
                    $data = array($this->carreraSede, $this->cargo);
                    $result = $this->update($query, $data);
                    $return = $result;
                }
            }else 
            {
                $return = "existe";
            }     
             return $return;
        }  

        public function actualizarUsuario(int $idUsuario, string $usuario, string $contrasena, int $idRol){
            $this->idUsuario = $idUsuario;
            $this->usuario = $usuario;
            $this->idRol = $idRol;
            if(!empty($contrasena)){
                //ACTUALIZAR LA CONTRASEÑA
                $this->contrasena = password_hash($contrasena,PASSWORD_DEFAULT);
                $query = "UPDATE usuario SET rol_id_rol = ?, nombre_usuario = ?,clave = ?,fecha_actualizada = now() WHERE id_persona = '{$this->idUsuario}' ";
                $data = array($this->idRol,$this->usuario, $this->contrasena);
            } else {
                //QUIERE MANTENER LA CONTRASEÑA ACTUAL
                $query = "UPDATE usuario SET rol_id_rol = ?, nombre_usuario = ?,fecha_actualizada = now() WHERE id_persona = '{$this->idUsuario}' ";
                $data = array($this->idRol,$this->usuario);
            }
            //echo $query;exit;
            
            $result = $this->update($query,$data);
            return $result;
        }

        public function actualizarAdministrativo(int $idAdministrativo, int $idCargo, int $idCarreraSede){
            $this->idAdministrativo = $idAdministrativo;
            $this->idCargo = $idCargo;
            $this->idCarreraSede = $idCarreraSede;

            $query = "UPDATE administrativo SET carrera_sede_id_carrera_sede=?, cargo_id_cargo=? WHERE id_administrativo='{$this->idAdministrativo}'";
            $data = array($this->idCarreraSede, $this->idCargo);
            $result = $this->update($query, $data);
            return $result;
        }
        
        public function eliminarU(int $idUsuario)
        {
            $this->idUsuario = $idUsuario;
            $query = " UPDATE usuario SET status =?,fecha_eliminada =now() WHERE id_persona = $this->idUsuario ";
            $data = array(0);
            $result = $this->update($query,$data);
            return $result;
        }

        public function eliminarAdministrativo(int $idAdministrativo)
        {
            $this->idAdministrativo = $idAdministrativo;
            $query = " UPDATE administrativo SET status =? WHERE id_administrativo = $this->idAdministrativo ";
            $data = array(0);
            $result = $this->update($query,$data);
            return $result;
        }


        public function reingresar(int $idUsuario)
        {
            $this->idUsuario = $idUsuario;
            $query = " UPDATE usuario SET status =?,fecha_actualizada = now() WHERE id_persona = $this->idUsuario ";
            $data = array(1);
            $result = $this->update($query,$data);
            return $result;
        }
       /* public function getregistro(string $nombres, string $ap_paterno, , string $ap_materno,  string $ci, string $matricula, string $carrera, string $email,  string $email_alt, string $tel, string $direccion)
        {
            $sql = "SELECT * FROM registro WHERE nombres = '$nombres' and ap_pat ='$ap_paterno' and ap_mat ='$ap_materno' and ci ='$ci' and matricula ='$matri' and carrera ='$carrera'and correo ='$email' and correo_alt ='$email_alt'and tel ='$tel'and direccion ='$direccion'";
            $data = $this->select($sql);
            return $data; 
        }*/


    }



?>