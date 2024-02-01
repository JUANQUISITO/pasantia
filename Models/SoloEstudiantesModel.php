<?php
class SoloEstudiantesModel extends Mysql
{
    public $id, $clave, $nombre, $usuario, $correo, $rol;

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    /*=============================================================
                         MODELO PARA LA VISTA ESTUDIANTES
    =================================================================*/

    public function selectEstudiantes($id_carrera, $id_sede)
    {
        
        $sql = "SELECT
        estudiante.nro_matricula, 
        persona.usuario_id_persona, 
        persona.nombres, 
        persona.apellido_paterno, 
        persona.apellido_materno, 
        persona.e_mail, 
        persona.carnet, 
        persona.telefono, 
        estudiante.persona_usuario_id_persona, 
        estudiante.telefono_apoderado, 
        estudiante.domicilio_apoderado, 
        estudiante.ci_apoderado, 
        estudiante.padre_apoderado, 
        persona.direccion, 
        carrera_sede.carrera_id_carrera , 
        carrera_sede.sedes_id_sedes, 
        carrera_sede.id_carrera_sede, 
        estudiante.carrera_sede_id_carrera_sede, 
        carrera.carrera, 
        sedes.sede, 
        estudiante.id_estudiante, 
        estudiante.`status`
        FROM
        estudiante
        INNER JOIN
        persona
        ON 
            estudiante.persona_usuario_id_persona = persona.usuario_id_persona
        INNER JOIN
        carrera_sede
        ON 
            estudiante.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
        INNER JOIN
        carrera
        ON 
            carrera_sede.carrera_id_carrera = carrera.id_carrera
        INNER JOIN
        sedes
        ON 
            carrera_sede.sedes_id_sedes = sedes.id_sedes
        WHERE
        estudiante.`status` <> 0 ";

        if(!empty($id_carrera)){
            $sql.=" AND
            carrera_sede.carrera_id_carrera = '$id_carrera'";
        }

        if(!empty($id_sede)){
            $sql.=" AND
            sedes.id_sedes = '$id_sede'";
        }

        //echo $sql;exit;
        $res = $this->select_all($sql);
        return $res;
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
            $res = 0;
        }
        return $res;
    }

    /*================================================================
                         MODELO PARA LA VISTA PUBLICACIONES
    =================================================================*/
    
    public function selectPublicacionesEstudiantes()
    {
        $sql = "SELECT
            p.id_convocatoria,
            p.titulo, 
            /*p.area,*/
            p.cantidad_pasantes,
            p.remuneracion,
            p.beneficios,
            p.tiempo_pasantia,
            p.descripcion_puesto,
            p.fecha_publicacion,
            p.fecha_limite_postulacion,
            p.persona_referencia,
            p.telefono_referencia,
            p.status,
            p.empresa_id_empresa,
            p.carrera_id_carrera,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.telefono_contacto,
            e.persona_contacto,
            e.fecha,
            e.telefono,         
            e.direccion,
            e.ciudad,         
            e.cargo,  
            e.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status

         FROM publicacion p
         INNER JOIN empresa e
        on p.empresa_id_empresa = e.id_empresa
        INNER JOIN carrera ca         
        on p.carrera_id_carrera = ca.id_carrera

        WHERE p.status !=0";     
        $data = $this->select_all($sql);
    
        return $data; 
    }

    

    public function selectPublicacion(int $idPublicacion)
    {   
        $this->idPublicacion = intval($idPublicacion);
        // $query = "SELECT * FROM usuarios WHERE idPublicacion = $this->idPublicacion";
        $query = "SELECT
            p.id_convocatoria,
            p.titulo, 
            p.area,
            p.cantidad_pasantes,
            p.remuneracion,
            p.beneficios,
            p.tiempo_pasantia,
            p.descripcion_puesto,
            p.fecha_publicacion,
            p.fecha_limite_postulacion,
            p.persona_referencia,
            p.telefono_referencia,
            p.status,
            p.empresa_id_empresa,
            p.carrera_id_carrera,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.telefono_contacto,
            e.persona_contacto,
            e.fecha,
            e.telefono,         
            e.direccion,
            e.ciudad,         
            e.cargo,  
            e.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status
            
            FROM publicacion p
         INNER JOIN empresa e
        on p.empresa_id_empresa = e.id_empresa
        INNER JOIN carrera ca         
        on p.carrera_id_carrera = ca.id_carrera
        WHERE p.id_convocatoria = $this->idPublicacion";
        $result = $this->select($query);
        if(empty($result))
        {
            $result =0;
        }       
        return $result;
    }

     /*=============================================================
                         MODELO PARA LA VISTA CONVENIOS
    =================================================================*/
   

} 