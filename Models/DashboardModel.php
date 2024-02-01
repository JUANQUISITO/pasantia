<?php
class DashboardModel extends Mysql
{

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    public function cantConvenios()
    {

        $sql = "SELECT 
            count(*) as totalConv 
            FROM convenios 
            WHERE STATUS!=0;";
        $res = $this->select($sql);
        $total = $res['totalConv'];
        return $total;
    }
    public function cantSolicitud()
    {
        $sql = "SELECT count(*) as totalSolicitudes 
        FROM solicitud_pasantia 
        WHERE STATUS!=0; and ";

        $res = $this->select($sql);
        $totalSolicitudes = $res['totalSolicitudes'];
        return $totalSolicitudes;
    }

    public function cantEmpresas()
    {
        $sql = "SELECT COUNT(*) as cantEmpresas 
        FROM empresa
         WHERE STATUS!=0;";

        $res = $this->select($sql);
        $total = $res['cantEmpresas'];
        return $total;
    }

    public function cantEstudiantes()
    {
        $sql = "SELECT COUNT(*) AS cantEstudiantes 
        FROM estudiante 
        WHERE STATUS!=0;";
        $res = $this->select($sql);
        $total = $res['cantEstudiantes'];
        return $total;
    }

    public function cantAdministrativos()
    {
        $sql = "SELECT COUNT(*) AS cantAdministrativos 
        FROM administrativo 
        WHERE STATUS!=0;";
        $res = $this->select($sql);
        $total = $res['cantAdministrativos'];
        return $total;
    }

    public function cantPublicaciones()
    {
        $sql = "SELECT COUNT(*) AS cantPublicaciones 
        FROM publicacion 
        WHERE STATUS!=0;";
        $res = $this->select($sql);
        $total = $res['cantPublicaciones'];
        return $total;
    }

    public function obtenerCantidadEstudiantes()
    {

        $sql = "SELECT  
            count(estado_seg) as cantidad_seg
        FROM seguimiento

        LEFT JOIN solicitud_pasantia ON seguimiento.solicitud_pasantia_id_solicitud = solicitud_pasantia.id_solicitud
        INNER JOIN estudiante ON solicitud_pasantia.estudiante_id_estudiante = estudiante.id_estudiante
        INNER JOIN persona ON estudiante.persona_usuario_id_persona = persona.usuario_id_persona
        WHERE estado_seg = 'finalizado'
         ";
        //echo $sql;exit;

        $res = $this->select($sql);
        $total = $res['cantidad_seg'];
        return $total;
    }

    public function cantSolicitudPasantias()
    {
        $sql = "SELECT
        s.id_solicitud, 
        s.fecha_inicio_prac, 
        s.fecha_conclu_prac, 
        s.tiempo_duracion, 
        s.observaciones, 
        s.estudiante_id_estudiante, 
        s.nombre_empresa_sin_convenio, 
        s.direccion, 
        s.nombre_destinatario, 
        s.cargo_encargado, 
        s.telefono_empresa, 
        s.fax, 
        s.cargo_estudiante, 
        s.fot_titulo_bachiller, 
        s.fot_matricula, 
        s.mensaje, 
        s.fecha_creada, 
        s.`status`, 
        s.fecha_actualizada, 
        s.fecha_eliminada,
        estudiante.nro_matricula,
        sedes.sede,
        carrera.carrera,
        carrera_sede.carrera_id_carrera , 
        carrera_sede.sedes_id_sedes, 
        carrera_sede.id_carrera_sede, 
        persona.carnet,
        CONCAT(nombres , ' ', apellido_paterno,' ' , apellido_materno) as nombre_completo,
        rol.nombre,
        seg.estado_seg,
        seg.administrativo_id_administrativo
        FROM
        solicitud_pasantia s 
      
        INNER JOIN estudiante ON s.estudiante_id_estudiante = estudiante.id_estudiante
        INNER JOIN persona ON estudiante.persona_usuario_id_persona = persona.usuario_id_persona
        INNER JOIN carrera_sede ON estudiante.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede 
        INNER JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
        INNER JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes
        INNER JOIN usuario ON persona.usuario_id_persona = usuario.id_persona
	     INNER JOIN rol ON usuario.rol_id_rol = rol.id_rol
         INNER JOIN seguimiento seg ON s.id_solicitud = seg.solicitud_pasantia_id_solicitud
        WHERE s.status='1' GROUP BY s.id_solicitud ORDER BY s.fecha_creada DESC LIMIT 5";
        $res = $this->select_all($sql);

        return $res;
    }

    function days_in_month($month, $year)
    {
        // calculate number of days in a month
        return $month == 2 ? ($year % 4 ? 28 : ($year % 100 ? 29 : ($year % 400 ? 28 : 29))) : (($month - 1) % 7 % 2 ? 30 : 31);
    }


    public function cantidadSolicitudporMDia(int $anio, int $mes)
    {
        $arrSolicitudMes = array();
        // $dias = cal_days_in_month(CAL_GREGORIAN, $mes, $anio); //cantidad de dias del mes 
        $dias = $this->days_in_month($mes, $anio);
        // print_r($dias);exit;
        $n_dias = 1;
        $total =0;
        for ($i = 0; $i < $dias; $i++) {
            $fecha = date_create($anio . "-" . $mes . "-" . $n_dias);
            $fechaSol = date_format($fecha, "Y-m-d");
            $sql = "SELECT 
                    DAY(seg.fecha) AS dia,
                    COUNT(solicitud_pasantia_id_solicitud) AS totalSolicitud,
                    CONCAT(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) AS nombreCompleto,
                    c.carrera 
                FROM seguimiento seg
                INNER JOIN solicitud_pasantia s ON seg.solicitud_pasantia_id_solicitud = s.id_solicitud
                INNER JOIN estudiante e ON s.estudiante_id_estudiante = e.id_estudiante
                INNER JOIN persona p ON e.persona_usuario_id_persona = p.usuario_id_persona
                INNER JOIN carrera_sede cs ON e.carrera_sede_id_carrera_sede = cs.id_carrera_sede
                INNER JOIN carrera c ON cs.carrera_id_carrera = c.id_carrera
                WHERE DATE(fecha) ='$fechaSol' AND estado_seg='finalizado'
            ";
            $res = $this->select($sql);
            $res['dia'] = $n_dias;
            $res['totalSolicitud']=$res['totalSolicitud']==""?0:$res['totalSolicitud'];
            $total=$total+$res['totalSolicitud'];
            array_push($arrSolicitudMes, $res);
            // print_r("<br>");
            // print_r($res);
            // print_r("<br>");
            $n_dias++;
        }
        $meses = Meses();
        $arrData = array('anio' => $anio, 'total'=>$total ,'mes' => $meses[intval($mes - 1)], 'empresas' => $arrSolicitudMes);
        // print_r('total:'.$total+=$res['totalSolicitud']);
        return $arrData;
    }
    public function cantidiadSolicitudporAnio(int $anio)
    {
        $arrSolicitudMes = array();
        $total =0;
       
        $arrMeses = Meses();
        for($i =1; $i<=12; $i++)
        {
            $arrData = array('anio'=> '','nro_mes' => '','mes'=>'','solicitudes'=>'');
            $sql = "SELECT 
                    $anio AS anio,
                    $i AS mes,
                    COUNT(solicitud_pasantia_id_solicitud) AS totalSolicitud,
                    CONCAT(p.nombres,' ',p.apellido_paterno,' ',p.apellido_materno) AS nombreCompleto
                
                FROM seguimiento seg
                INNER JOIN solicitud_pasantia s ON seg.solicitud_pasantia_id_solicitud = s.id_solicitud
                INNER JOIN estudiante e ON s.estudiante_id_estudiante = e.id_estudiante
                INNER JOIN persona p ON e.persona_usuario_id_persona = p.usuario_id_persona
                INNER JOIN carrera_sede cs ON e.carrera_sede_id_carrera_sede = cs.id_carrera_sede
                INNER JOIN carrera c ON cs.carrera_id_carrera = c.id_carrera
                WHERE MONTH(fecha)= $i AND  YEAR(fecha) = $anio AND estado_seg='finalizado'
                GROUP BY MONTH(fecha)";
            $solicitudMes= $this->select($sql);
            $arrData['mes'] = $arrMeses[$i-1];
            if(empty($solicitudMes))
            {
                $arrData['anio']=$anio;
                $arrData['nro_mes']=$i;
                $arrData['solicitudes']=0;
            }else
            {
                $arrData['anio']= $solicitudMes['anio'];
                $arrData['nro_mes']=$solicitudMes['mes'];
                $arrData['solicitudes']=$solicitudMes['totalSolicitud'];
            }
            array_push($arrSolicitudMes,$arrData);


        }
        $arrSolicitudes = array('anio'=> $anio,'meses'=>$arrSolicitudMes);

        return $arrSolicitudes;
    }

    public function cantidadSolicitudporCarrera(int $anio, int $mes)
    {
        $arrSolicitudMes= array();
        $arrMeses = Meses();
        $sql = "SELECT
            s.id_solicitud, 
            carrera.carrera,
            seg.estado_seg,
            COUNT(carrera.id_carrera) AS cantidad_carrera
      
        FROM
        solicitud_pasantia s 
        INNER JOIN estudiante ON s.estudiante_id_estudiante = estudiante.id_estudiante
        INNER JOIN persona ON estudiante.persona_usuario_id_persona = persona.usuario_id_persona
        INNER JOIN carrera_sede ON estudiante.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede 
        INNER JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
        INNER JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes
        INNER JOIN usuario ON persona.usuario_id_persona = usuario.id_persona
	     INNER JOIN rol ON usuario.rol_id_rol = rol.id_rol
         INNER JOIN seguimiento seg ON s.id_solicitud = seg.solicitud_pasantia_id_solicitud
	   
         WHERE MONTH(fecha)= $mes AND  YEAR(fecha) = $anio
         AND seg.estado_seg='finalizado'
         GROUP BY carrera.carrera;";
        $totalporcarrera = $this->select_all($sql);
        $arrData = array('anio'=> $anio, 'mes'=>$arrMeses[intval($mes-1)], 'total'=>$totalporcarrera);
        return $arrData;
        
    }
}
