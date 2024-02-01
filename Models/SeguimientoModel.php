<?php
class SeguimientoModel extends Mysql{

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    /*
    public function selectSeguimiento()
    {
        $sql = "SELECT * FROM seguimiento WHERE status != 0";
        $res = $this->select_all($sql);
        return $res;
    }
*/
    public function selectSeguimientos()
    {
        $sql = "SELECT
            se.id_seguimiento,
            se.mensaje_seg, 
            se.solicitud_pasantia_id_solicitud,
            se.cod_seguimiento,
            se.fecha,
            se.administrativo_id_administrativo,
            se.estado_seg,

            sp.id_solicitud,
            sp.fecha_inicio_prac,
            sp.fecha_conclu_prac,
            sp.tiempo_duracion,
            sp.observaciones,
            sp.estudiante_id_estudiante,
            sp.nombre_empresa_sin_convenio,
            sp.direccion,
            sp.nombre_destinatario,
            sp.telefono_empresa,
            sp.cargo_encargado,
            sp.fax,
            sp.fot_titulo_bachiller,
            sp.fot_matricula,
            sp.mensaje,
            sp.status,
            
            a.id_administrativo,
            a.cargo_id_cargo,
            a.status,
            a.carrera_sede_id_carrera_sede,
            a.persona_usuario_id_persona,

            cargo.id_cargo,
            cargo.nombre_cargo,

            e.id_estudiante,
            e.nro_matricula,
            e.padre_apoderado,
            e.ci_apoderado


         FROM seguimiento se
         INNER JOIN solicitud_pasantia sp         
        on se.solicitud_pasantia_id_solicitud = sp.id_solicitud
         INNER JOIN administrativo a
        on se.administrativo_id_administrativo = a.id_administrativo
        INNER JOIN cargo  
        on cargo.id_cargo =  a.cargo_id_cargo
        LEFT JOIN estudiante e
        ON e.id_estudiante = sp.estudiante_id_estudiante
     ";     
        $data = $this->select_all($sql);
    
        return $data; 
    }

    public function selectEstadoSeguimientos()
    {
        $sql = "SELECT
        seguimiento.id_seguimiento, 
        seguimiento.estado_seg, 
  
        seguimiento.administrativo_id_administrativo
    FROM
        seguimiento
        
       GROUP BY estado_seg";
        $res = $this->select_all($sql);
        return $res;
    }
    
    public function selectSeguimientosEliminados()
    {
        $sql = "SELECT
            se.id_seguimiento,
            se.mensaje_seg, 
            se.solicitud_pasantia_id_solicitud,
            se.cod_seguimiento,
            se.fecha,
            se.administrativo_id_administrativo,
            se.estado_seg,

            sp.id_solicitud,
            sp.fecha_inicio_prac,
            sp.fecha_conclu_prac,
            sp.tiempo_duracion,
            sp.observaciones,
            sp.estudiante_id_estudiante,
            sp.nombre_empresa_sin_convenio,
            sp.direccion,
            sp.nombre_destinatario,
            sp.telefono_empresa,
            sp.cargo,
            sp.fax,
            sp.fot_titulo_bachiller,
            sp.fot_matricula,
            sp.mensaje,
            sp.status,

            a.id_administrativo,
            a.cargo_id_cargo,
            a.status,
            a.carrera_sede_id_carrera_sede,
            a.persona_usuario_id_persona,
            a.convenios_id_convenio

            FROM seguimiento se
         INNER JOIN solicitud_pasantia sp         
        on se.solicitud_pasantia_id_solicitud = sp.id_solicitud
         INNER JOIN administrativo a
        on se.administrativo_id_administrativo = a.id_administrativo
        WHERE se.status !=1";
       
        $data = $this->select_all($sql);
    
        return $data; 
    }
    public function verificarSolicitud_Antes($selecionar_revision,$vMensaje_seguimiento, $idSolicitudVerificar)
    {
        $this->selecionar_revision = $selecionar_revision;
        $this->vMensaje_seguimiento =$vMensaje_seguimiento;
        $this->idSolicitudVerificar = $idSolicitudVerificar;
       //falta agregar administrativo 
        //$this->cargoAdministrativo = $cargoAdministrativo;
    
        if($this->selecionar_revision == 1)
        {
            $sel_rev = 'recibido';
        }
        else if($this->selecionar_revision == 2)
        {
            $sel_rev = 'observado';
        }
        else if($this->selecionar_revision == 3)
        {
            $sel_rev = 'rechazado';
        }
        else if($this->selecionar_revision == 4)
        {
            $sel_rev = 'finalizado';
        }
        $arraySelecionar_revision = $sel_rev;
        var_dump($arraySelecionar_revision);
        exit();
        $query = "UPDATE seguimiento SET estado_seg=?, mensaje_seg=?, fecha=now() WHERE solicitud_pasantia_id_solicitud='{$this->idSolicitudVerificar}'";
            $data = array($arraySelecionar_revision, $this->vMensaje_seguimiento, );
            $resul = $this->update($query, $data);
            $return = $resul;
        return $return;
    }

    public function verificarSolicitud(string $estado_seg,string $mensaje_seg, int $idSolicitudVerificar,string $codigo_seguimiento,int $idAdministrativo)
    {
        $this->estado_seg = $estado_seg;
        $this->mensaje_seg = $mensaje_seg;
        $this->idSolicitudVerificar = $idSolicitudVerificar;
        $this->codigo_seguimiento = $codigo_seguimiento; 
        $this->idAdministrativo = $idAdministrativo;
        /*
        if($this->estado_seg == 1)
        {
            $estado_seg = 'revisado';
        }
        else if($this->estado_seg == 2)
        {
            $estado_seg = 'observado';
        }
        else if($this->estado_seg == 3)
        {
            $estado_seg = 'rechazado';
        }
        else if($this->estado_seg == 4)
        {
            $estado_seg = 'finalizado';
        }
        */
        //$query = "UPDATE seguimiento SET estado_seg=?, mensaje_seg=?, fecha=now() WHERE solicitud_pasantia_id_solicitud='{$this->idSolicitudVerificar}'";
        $query = "INSERT INTO seguimiento (estado_seg, mensaje_seg, solicitud_pasantia_id_solicitud,cod_seguimiento, fecha, administrativo_id_administrativo) VALUES(?,?,?,?,now(),?)";
        $data = array($this->estado_seg, $this->mensaje_seg,   $this->idSolicitudVerificar,  $this->codigo_seguimiento, $this->idAdministrativo );
        $resul = $this->insert($query, $data);
 
        return $resul;
    }

    public function verificarSolicitudRevisado($selecionar_revision,$vMensaje_seguimiento, $idSolicitudVerificar, $cargoAdministrativo)
    {
        $this->selecionar_revision = $selecionar_revision;
        $this->vMensaje_seguimiento = $vMensaje_seguimiento;
        $this->idSolicitudVerificar = $idSolicitudVerificar;
       //falta agregar administrativo 
        $this->cargoAdministrativo = $cargoAdministrativo;
        
        //$query = "UPDATE seguimiento SET estado_seg=?, mensaje_seg=?, fecha=now() WHERE solicitud_pasantia_id_solicitud='{$this->idSolicitudVerificar}'";
        $query = "INSERT INTO seguimiento (estado_seg, mensaje_seg, solicitud_pasantia_id_solicitud, fecha, administrativo_id_administrativo) VALUES(?,?,?,now(),?)";
        $data = array($selecionar_revision, $this->vMensaje_seguimiento,   $this->idSolicitudVerificar,$this->cargoAdministrativo );
            //$resul = $this->update($query, $data);
        $resul = $this->insert($query, $data);
        return $resul;
    }
    public function selectSeguimiento(int $idSeguimiento) //solo uno
    {   
        $this->idSeguimiento = intval($idSeguimiento);
        // $query = "SELECT * FROM usuarios WHERE idSeguimiento = $this->idSeguimiento";
        $query = "SELECT
            se.id_seguimiento,
            se.mensaje_seg, 
            se.solicitud_pasantia_id_solicitud,
            se.cod_seguimiento,
            se.fecha,
            se.administrativo_id_administrativo,
            se.estado_seg,

            sp.id_solicitud,
            sp.fecha_inicio_prac,
            sp.fecha_conclu_prac,
            sp.tiempo_duracion,
            sp.observaciones,
            sp.estudiante_id_estudiante,
            sp.nombre_empresa_sin_convenio,
            sp.direccion,
            sp.nombre_destinatario,
            sp.telefono_empresa,
            sp.cargo_encargado,
            sp.fax,
            sp.fot_titulo_bachiller,
            sp.fot_matricula,
            sp.mensaje,
            sp.status,

            a.id_administrativo,
            a.cargo_id_cargo,
            a.status,
            a.carrera_sede_id_carrera_sede,
            a.persona_usuario_id_persona
    
            
        FROM seguimiento se
         INNER JOIN solicitud_pasantia sp 
        on se.solicitud_pasantia_id_solicitud = sp.id_solicitud
         INNER JOIN administrativo a
        on se.administrativo_id_administrativo = a.id_administrativo
        WHERE
        se.id_seguimiento = '{$this->idSeguimiento}'";
        $result = $this->select($query);
        var_dump($result);
        exit();
        if(empty($result))
        {
            $result =0;
        }       
        return $result;
    }

    public function verSelectSeguimiento(int $idSeguimiento) //solo uno
    {   
        $this->idSeguimiento = intval($idSeguimiento);
        // $query = "SELECT * FROM usuarios WHERE idSeguimiento = $this->idSeguimiento";
        $query = "SELECT
            se.id_seguimiento,
            se.mensaje_seg, 
            se.solicitud_pasantia_id_solicitud,
            se.cod_seguimiento,
            se.fecha,
            se.administrativo_id_administrativo,
            se.estado_seg,

            sp.id_solicitud,
            sp.fecha_inicio_prac,
            sp.fecha_conclu_prac,
            sp.tiempo_duracion,
            sp.observaciones,
            sp.estudiante_id_estudiante,
            sp.nombre_empresa_sin_convenio,
            sp.direccion,
            sp.nombre_destinatario,
            sp.telefono_empresa,
            sp.cargo_encargado,
            sp.fax,
            sp.fot_titulo_bachiller,
            sp.fot_matricula,
            sp.mensaje,
            sp.status,

            a.id_administrativo,
            a.cargo_id_cargo,
            a.status,
            a.carrera_sede_id_carrera_sede,
            a.persona_usuario_id_persona
    
            
        FROM seguimiento se
         INNER JOIN solicitud_pasantia sp 
        on se.solicitud_pasantia_id_solicitud = sp.id_solicitud
         INNER JOIN administrativo a
        on se.administrativo_id_administrativo = a.id_administrativo
        WHERE
        se.id_seguimiento = '{$this->idSeguimiento}'";
        $result = $this->select($query);
        var_dump($result);
        exit();
        if(empty($result))
        {
            $result =0;
        }       
        return $result;
    }

    /*
    public function editarConvenios(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM convenios WHERE id_convenio = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
    */

    public function actualizarSeguimientos(string $codigo, string $empresa, string $tipoConvenio, string $fechaInicio, string $fechaFinal, int $idSeguimiento)
    { 
        $return = "";
        $this->idSeguimiento = $idSeguimiento;
        $this->codigo = $codigo;
        $this->empresa = $empresa;
        $this->tipoConvenio = $tipoConvenio;
        //$this->status = $status;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;
        
        $verificar ="SELECT * FROM convenios WHERE codigo = '{$this->codigo}' and  id_convenio != '{$this->idSeguimiento}'";
        $result = $this->select_all($verificar);

        if(empty($result))
        { 
            //$query = "UPDATE convenios SET codigo=?, empresa=?, tipoConvenio=?, status=?, fechaInicio=?,fechaFinal=? WHERE idSeguimiento=?";
            $query = "UPDATE convenios SET codigo=?, empresa_id_empresa=?, tipo_convenio_id_tipo_convenio=?, fecha_inicio=?,fecha_final=? WHERE id_convenio='{$this->idSeguimiento}'";
            $data = array($this->codigo, $this->empresa, $this->tipoConvenio, $this->fechaInicio, $this->fechaFinal, $this->idSeguimiento);
            $resul = $this->update($query, $data);
            $return = $resul;
        }else
        {
            $return = "existe";
        }      
        return $return;
    }

    // public function eliminarConvenios(int $idSeguimiento)
    // {
    //     $this->idSeguimiento = $idSeguimiento;
    //     $query = " UPDATE convenios SET status =? WHERE id_convenio = $this->idSeguimiento ";
    //     $data = array(0);
    //     $result = $this->update($query,$data);
    //     return $result;
    // }

    // public function reingresar(int $idSeguimiento)
    // {
    //     $this->idSeguimiento = $idSeguimiento;
    //     $query = " UPDATE convenios SET status =?,fecha_actualizada = now() WHERE id_convenio = $this->idSeguimiento ";
    //     $data = array(1);
    //     $result = $this->update($query,$data);
    //     return $result;
    // }
    public function recibirSolicitud_antes( int $idSolicitud )
    {
        $this->idSolicitud = $idSolicitud;
        //$consulta = "UPDATE seguimiento SET estado_seg = ? WHERE solicitud_pasantia_id_solicitud  ='{$this->idSolicitud}'";
        $consulta = "INSERT INTO seguimiento(estado_seg, nombre_cargo, fecha)VALUES(?,?,now())";
        
        $data = array('recibido');
        //$result = $this->update($consulta,$data);
        $result = $this->insert($consulta,$data);
        return $result;
    }

    public function recibirSolicitud(string $estado_seg, string $mensaje, int $idsolpasantia, string $codigo_seguimiento,int $idAdministrativo)
    {
        $this->estado_seg = $estado_seg;
        $this->mensaje = $mensaje;
        $this->idsolpasantia = $idsolpasantia;
        $this->codigo_seguimiento = $codigo_seguimiento;
        $this->idAdministrativo = $idAdministrativo;

        $query = "INSERT INTO seguimiento(estado_seg, mensaje_seg, solicitud_pasantia_id_solicitud, cod_seguimiento, fecha, administrativo_id_administrativo) VALUES(?,?,?,?,now(),?)";
        $data = array($this->estado_seg, $this->mensaje, $this->idsolpasantia, $this->codigo_seguimiento, $this->idAdministrativo);
        $result = $this->insert($query,$data);
        return $result;

    }

    public function selectSegSolicitud(int $idsegsolicitud)
    {
        $this->idsegsolicitud = $idsegsolicitud;
        $sql = "SELECT
        seguimiento.estado_seg, 
        seguimiento.mensaje_seg, 
        seguimiento.id_seguimiento, 
        seguimiento.solicitud_pasantia_id_solicitud, 
        seguimiento.cod_seguimiento, 
        seguimiento.fecha, 
        seguimiento.administrativo_id_administrativo, 
        administrativo.id_administrativo, 
        administrativo.cargo_id_cargo, 
        solicitud_pasantia.id_solicitud, 
        cargo.nombre_cargo, 
        estudiante.nro_matricula, 
        estudiante.persona_usuario_id_persona, 
        persona.nombres, 
        persona.apellido_paterno, 
        persona.apellido_materno, 
        persona.e_mail, 
        persona.carnet
        FROM
        seguimiento
        LEFT JOIN
        solicitud_pasantia
        ON 
            seguimiento.solicitud_pasantia_id_solicitud = solicitud_pasantia.id_solicitud
        INNER JOIN
        estudiante
        ON 
            solicitud_pasantia.estudiante_id_estudiante = estudiante.id_estudiante
        INNER JOIN
        persona
        ON 
            estudiante.persona_usuario_id_persona = persona.usuario_id_persona
        LEFT JOIN
        administrativo
        ON 
            seguimiento.administrativo_id_administrativo = administrativo.id_administrativo AND
            persona.usuario_id_persona = administrativo.persona_usuario_id_persona
        LEFT JOIN
        cargo
        ON 
            administrativo.cargo_id_cargo = cargo.id_cargo
        WHERE
        solicitud_pasantia.id_solicitud = '{$this->idsegsolicitud}'";
    $result = $this->select($sql);
    return $result;

    }

    public function DatosEstudiante($idSolicitud){
        $sql = "SELECT
                solicitud_pasantia.estudiante_id_estudiante,
                estudiante.nro_matricula,
                persona.nombres,
                persona.apellido_paterno,
                persona.apellido_materno,
                persona.carnet,
                persona.telefono,
                carrera.carrera,
                sedes.sede 
            FROM
                solicitud_pasantia
                INNER JOIN estudiante ON solicitud_pasantia.estudiante_id_estudiante = estudiante.id_estudiante
                INNER JOIN persona ON estudiante.persona_usuario_id_persona = persona.usuario_id_persona
                INNER JOIN carrera_sede ON estudiante.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
                INNER JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
                INNER JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes 
            WHERE
                solicitud_pasantia.id_solicitud = '$idSolicitud'";
        return $this->select($sql);
    }

    public function ListaSeguimiento($idSolicitud){
        /*
        $sql = "SELECT
                    seguimiento.id_seguimiento,
                    seguimiento.estado_seg,
                    seguimiento.mensaje_seg,
                    seguimiento.cod_seguimiento,
                    seguimiento.fecha,
                    cargo.nombre_cargo,
                    seguimiento.solicitud_pasantia_id_solicitud 
                FROM
                    seguimiento
                    INNER JOIN administrativo ON seguimiento.administrativo_id_administrativo = administrativo.id_administrativo
                    INNER JOIN cargo ON administrativo.cargo_id_cargo = cargo.id_cargo 
                WHERE
                    seguimiento.solicitud_pasantia_id_solicitud = '$idSolicitud'";
                    */
        $sql="SELECT
                seguimiento.id_seguimiento,
                seguimiento.estado_seg,
                seguimiento.mensaje_seg,
                seguimiento.cod_seguimiento,
                seguimiento.fecha,
                cargo.nombre_cargo,
                seguimiento.solicitud_pasantia_id_solicitud,
                carrera.carrera,
                sedes.sede 
            FROM
                seguimiento
                INNER JOIN administrativo ON seguimiento.administrativo_id_administrativo = administrativo.id_administrativo
                INNER JOIN cargo ON administrativo.cargo_id_cargo = cargo.id_cargo
                LEFT JOIN carrera_sede ON administrativo.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
                LEFT JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
                LEFT JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes 
            WHERE
                seguimiento.solicitud_pasantia_id_solicitud = '$idSolicitud'
            ORDER BY
	            seguimiento.id_seguimiento ASC";
        return $this->select_all($sql);
    }

    public function encontrarRolesAdmin(string $rol)
    {
         $this->roladmin = $rol;
         $sql = "SELECT id_rol 
                 FROM rol
                 WHERE nombre LIKE 'Secretaria Jefe de Carrera'";
         $data = $this->select($sql);
         return $data;
    }

    public function ObtenerCodigoSeguimiento(){
        // 1. generar el CODIGO de manera automatica = SOL20220001
       $sql = "SELECT
                count(seguimiento.id_seguimiento) as cantidad_seg
            FROM
                seguimiento
                WHERE YEAR(seguimiento.fecha) = DATE_FORMAT(now(), '%Y' )";
       $data = $this->select($sql);
     
       $cantidad_seg= $data["cantidad_seg"] + 1;
       return "SEG".date("Y").str_pad($cantidad_seg, 4, "0", STR_PAD_LEFT);
   }

//me dio un error con el nombre del cargo al descargarlo en otra pc 
   public function GetAdministrativo(string $id_carrera_sede= null ,$nombre_cargo)
   {
	   
        $sql = "SELECT
                administrativo.id_administrativo,
                cargo.nombre_cargo 
            FROM
                administrativo
                INNER JOIN cargo ON administrativo.cargo_id_cargo = cargo.id_cargo 
            WHERE
                administrativo.`status` = '1'";
        if(!empty($id_carrera_sede)){
            $sql.=" AND administrativo.carrera_sede_id_carrera_sede = '$id_carrera_sede'";
        }
        $sql.=" AND cargo.nombre_cargo = '$nombre_cargo'";
        $data = $this->select($sql);
        return $data;
   }


 

  

}