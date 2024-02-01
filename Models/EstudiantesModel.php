<?php
class EstudiantesModel extends Mysql{
    public $id, $clave, $nombre, $usuario, $correo, $rol;

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    public function selectEstudiantes($id_carrera, $id_sede,$id_carrera_sede="")
    {
        
        $sql = "SELECT
            e.nro_matricula, 
            e.fecha_creada,
            e.persona_usuario_id_persona, 
            e.telefono_apoderado, 
            e.domicilio_apoderado, 
            e.ci_apoderado, 
            e.padre_apoderado, 
            e.id_estudiante, 
            e.carrera_sede_id_carrera_sede, 
            p.usuario_id_persona, 
            p.nombres, 
            p.apellido_paterno, 
            p.apellido_materno, 
            p.e_mail, 
            p.carnet, 
            p.telefono, 
            p.direccion, 
            carrera_sede.carrera_id_carrera , 
            carrera_sede.sedes_id_sedes, 
            carrera_sede.id_carrera_sede, 
        
            carrera.carrera, 
            sedes.sede,
        
            CONCAT(nombres , ' ', apellido_paterno,' ' , apellido_materno) as nombre_completo,
            e.`status`
        FROM
        estudiante e 
        INNER JOIN persona p  ON  e.persona_usuario_id_persona = p.usuario_id_persona
        INNER JOIN carrera_sede ON e.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
        INNER JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
        INNER JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes
        WHERE e.`status` <> 0
        ";
        if(!empty($id_carrera_sede)){
            $sql.=" AND
            e.carrera_sede_id_carrera_sede = '$id_carrera_sede'";
        }
        if(!empty($id_carrera)){
            $sql.=" AND
            carrera_sede.carrera_id_carrera = '$id_carrera'";
        }

        if(!empty($id_sede)){
            $sql.=" AND
            sedes.id_sedes = '$id_sede'";
        }
        $sql.="  ORDER BY e.fecha_creada DESC ";
      
        $res = $this->select_all($sql);
        return $res;
    }
    public function crearCuentaEstudiante(string $usuario ,string $contrasenia, int $idRol)
    {
        $this->username = $usuario;
        $this->password = $contrasenia;
        $this->rol = $idRol;

        $query ="INSERT INTO usuario(nombre_usuario,clave,rol_id_rol,fecha_creada) VALUES(?,?,?,now())";
        $data = array($this->username,$this->password,$this->rol);
        $result = $this->insert($query,$data);
        
        return $result;
    }

    public function VerificarSolicitudEstudiante(string $idEstudiante="")
    {
        $consulta = "SELECT
                        estudiante.id_estudiante, 
                        estudiante.carrera_sede_id_carrera_sede
                    FROM estudiante                
                    WHERE estudiante.id_estudiante='$idEstudiante'";
        $res = $this->select($consulta);
   
        return (empty($res) ? NULL : $res);
    }
    public function encontrarRoles(string $rol)
    {
        $this->rol = $rol;
        $sql = "SELECT
                rol.id_rol
                FROM rol 
                WHERE rol.nombre like '{$this->rol}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = false;
        }
        return $res;
    }
    public function insertarDatosEstudiante(int $idUsuarioUltimo, string $nombres, string $apellido_pat, string $apellido_mat, string $nrocarnet, int $telefono, string $direccion)
    {
        $this->idUsuarioUltimo = $idUsuarioUltimo;
        $this->nombres = $nombres;
        $this->apellido_pat = $apellido_pat;
        $this->apellido_mat = $apellido_mat;
        $this->nrocarnet = $nrocarnet;
        $this->telefono = $telefono;
        $this->direccion = $direccion; 
      

        $query ="INSERT INTO  persona(usuario_id_persona,nombres,apellido_paterno, apellido_materno, carnet,telefono,direccion,fecha_creada) VALUES(?,?,?,?,?,?,?,now())";
        $data = array($this->idUsuarioUltimo,$this->nombres, $this->apellido_pat, $this->apellido_mat,   $this->nrocarnet,  $this->telefono,  $this->direccion);
        $result = $this->insert($query,$data);
        return $this->idUsuarioUltimo;  
        
    }

    public function insertarEstudiantes(int $resultadoUltimoDatoEstudiante, int $listCarreraSede, string $nromatricula)
    {
        $return = "";
        $this->resultadoUltimoDatoEstudiante = $resultadoUltimoDatoEstudiante;
        $this->listCarreraSede = $listCarreraSede;
        $this->nromatricula = $nromatricula;
  
        $query = "INSERT INTO estudiante(nro_matricula,carrera_sede_id_carrera_sede ,persona_usuario_id_persona,fecha_creada) VALUES (?,?,?,now())";
        $data = array($this->nromatricula, $this->listCarreraSede, $this->resultadoUltimoDatoEstudiante);
        $resul = $this->insert($query, $data);
        $return = $resul;
        return $return;
    }

    public function selectEstudiantesInactivos(  $id_carrera,  $id_sede,  $id_carrera_sede="" )
    {
        $sql = "SELECT
            e.nro_matricula, 
            e.fecha_creada,
            e.persona_usuario_id_persona, 
            e.telefono_apoderado, 
            e.domicilio_apoderado, 
            e.ci_apoderado, 
            e.padre_apoderado, 
            e.id_estudiante, 
            e.carrera_sede_id_carrera_sede, 
            p.usuario_id_persona, 
            p.nombres, 
            p.apellido_paterno, 
            p.apellido_materno, 
            p.e_mail, 
            p.carnet, 
            p.telefono, 
            p.direccion, 
            carrera_sede.carrera_id_carrera , 
            carrera_sede.sedes_id_sedes, 
            carrera_sede.id_carrera_sede, 
        
            carrera.carrera, 
            sedes.sede,
        
            CONCAT(nombres , ' ', apellido_paterno,' ' , apellido_materno) as nombre_completo,
            e.`status`
        FROM
        estudiante e 
        INNER JOIN persona p  ON  e.persona_usuario_id_persona = p.usuario_id_persona
        INNER JOIN carrera_sede ON e.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
        INNER JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
        INNER JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes
        WHERE e.`status` !=1
        ";
        if(!empty($id_carrera_sede)){
            $sql.=" AND
            e.carrera_sede_id_carrera_sede = '$id_carrera_sede'";
        }
        if(!empty($id_carrera)){
            $sql.=" AND
            carrera_sede.carrera_id_carrera = '$id_carrera'";
        }

        if(!empty($id_sede)){
            $sql.=" AND
            sedes.id_sedes = '$id_sede'";
        }
        $sql.="  ORDER BY e.fecha_creada DESC ";
      
        $res = $this->select_all($sql);
		return $res;
    }

    public function VerificarEstudiante(string $nro_carnet="")
    {
        $consulta = "SELECT
                    persona.carnet,
                    estudiante.nro_matricula 
                FROM
                    persona
                    INNER JOIN estudiante ON persona.usuario_id_persona = estudiante.persona_usuario_id_persona 
                WHERE
                    persona.carnet = '$nro_carnet'";
        $res = $this->select($consulta);
        /*
        if (empty($res)) {
            return null;
        } else {
            return $res;
        }
        */
        return (empty($res) ? NULL : $res);
    }


    public function reingresarEstudiante(int $idEstudiante)
    {
        $this->idEstudiante = $idEstudiante;
        $consulta = "UPDATE estudiante SET status = ? WHERE id_estudiante ='{$this->idEstudiante}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function editarEstudiantes(int $id)
    {
        $this->id = $id;
        $sql = 
        "SELECT
            carrera_sede.carrera_id_carrera, 
            carrera_sede.sedes_id_sedes, 
            carrera_sede.id_carrera_sede, 
            persona.nombres, 
            persona.apellido_paterno, 
            persona.apellido_materno, 
            estudiante.nro_matricula,
            estudiante.id_estudiante, 
            estudiante.carrera_sede_id_carrera_sede, 
            estudiante.persona_usuario_id_persona, 
            estudiante.`status`, 
            estudiante.fecha_actualizada, 
            persona.telefono, 
            persona.direccion,	
            persona.carnet
        FROM
            persona
            INNER JOIN
            estudiante
            ON 
                persona.usuario_id_persona = estudiante.persona_usuario_id_persona
            INNER JOIN
            carrera_sede
            ON 
                estudiante.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
            WHERE estudiante.id_estudiante = '{$this->id}'";
        $res = $this->select($sql);
        
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    public function actualizarDatosEstudiante(int $idPersona, string $nombres, string $apellido_pat, string $apellido_mat, string $nro_carnet,  int $telefono, string $direccion)
    {
        $this->idPersona = $idPersona;
        $this->nombres = $nombres;
        $this->apellido_pat = $apellido_pat;
        $this->apellido_mat = $apellido_mat;
        $this->nro_carnet = $nro_carnet;
        $this->telefono = $telefono;
        $this->direccion = $direccion; 
        
        $query = "UPDATE persona SET nombres=?, apellido_paterno=?, apellido_materno=?,carnet=?, telefono=?,direccion=? WHERE usuario_id_persona = '{$this->idPersona}'";
        $data = array($this->nombres, $this->apellido_pat, $this->apellido_mat, $this->nro_carnet, $this->telefono, $this->direccion);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }

    public function actualizarEstudiantes(int $idEstudiante, int $listCarreraSede, string $nromatricula)
    {
        $this->idEstudiante = $idEstudiante;
        $this->listCarreraSede   = $listCarreraSede;
        $this->nromatricula = $nromatricula;
        $query = "UPDATE estudiante SET nro_matricula =?, carrera_sede_id_carrera_sede =?,fecha_actualizada=now() WHERE id_estudiante = '{$this->idEstudiante}'";
        $data = array($this->nromatricula, $this->listCarreraSede);
        $resul = $this->update($query, $data);
        return $resul;

    }
    public function eliminarEstudiantes(int $idEstudiante)
    {        
        $return = "";
        $this->id = $idEstudiante;
        $query = "UPDATE estudiante SET status = ?,fecha_eliminada=now() WHERE  id_estudiante= $this->id";
        $data = array(0);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    } 

    
}