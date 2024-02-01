<?php
	class SolicitudPasantiasModel extends Mysql
	{
		public $id, $clave, $nombre, $usuario, $correo, $rol;
		public function __construct()
		{
			parent::__construct();
		}

		public function selectSolicitudPasantias($id_carrera, $id_sede,$id_user,$nombre_rol, $id_carrera_sede,$codigo_seguimiento)
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
			-- WHERE s.id_solicitud IN (SELECT  solicitud_pasantia_id_solicitud  FROM seguimiento
			--                             LEFT JOIN solicitud_pasantia ON seguimiento.solicitud_pasantia_id_solicitud = solicitud_pasantia.id_solicitud
			";
			if(!empty($id_carrera_sede)){
				$sql.=" AND
				estudiante.carrera_sede_id_carrera_sede = '$id_carrera_sede'";
			}
			 if(!empty($id_carrera)){
				$sql.=" AND
				carrera_sede.carrera_id_carrera = '$id_carrera'";
			}

			if(!empty($id_sede)){
				$sql.=" AND
				sedes.id_sedes = '$id_sede'";
			}
		  
			if(strtoupper($nombre_rol)=='ESTUDIANTE'){
				$sql .= " WHERE
				persona.usuario_id_persona = '$id_user' AND
				rol.nombre = '$nombre_rol'";
			}
			if(!empty($codigo_seguimiento))
			{
				$sql.="  AND seg.estado_seg   = '$codigo_seguimiento'";
			}
		   $sql.=" AND s.status='1' GROUP BY s.id_solicitud ORDER BY s.fecha_creada DESC ";

		//    var_dump($sql);exit();
			$res = $this->select_all($sql);
			return $res;
		}

		public function selectSolicitudPasantiasArchivos()
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
			CONCAT(nombres , ' ', apellido_paterno,' ' , apellido_materno) as nombre_completo
			
			FROM
			solicitud_pasantia s
			
			INNER JOIN estudiante ON s.estudiante_id_estudiante = estudiante.id_estudiante
			INNER JOIN persona ON estudiante.persona_usuario_id_persona = persona.usuario_id_persona
			INNER JOIN carrera_sede ON estudiante.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede 
			INNER JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
			INNER JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes
			";
			 
			 if(!empty($id_carrera)){
				$sql.=" AND
				carrera_sede.carrera_id_carrera = '$id_carrera'";
			}

			if(!empty($id_sede)){
				$sql.=" AND
				sedes.id_sedes = '$id_sede'";
			}

			$res = $this->select_all($sql);
			return $res;
		}

		
		public function VerificarSolicitud(string $nro_carnet_estudiante="")
		{
			$consulta = "SELECT
					persona.carnet, 
					estudiante.id_estudiante, 
					estudiante.carrera_sede_id_carrera_sede
				FROM
					persona
					INNER JOIN
					estudiante
					ON 
						persona.usuario_id_persona = estudiante.persona_usuario_id_persona
				WHERE
					persona.carnet ='$nro_carnet_estudiante'";
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

		public function VerificarSolicitudEstudiante(string $idPersona="")
		{
			$consulta = "SELECT
			estudiante.id_estudiante, 
			estudiante.carrera_sede_id_carrera_sede, 
			persona.usuario_id_persona
		FROM
			persona
			INNER JOIN
			estudiante
			ON 
				persona.usuario_id_persona = estudiante.persona_usuario_id_persona
		WHERE
			persona.usuario_id_persona = '$idPersona'";
			$res = $this->select($consulta);
	   
			return (empty($res) ? NULL : $res);
		}


		public function selectidsolicitud(int $idsolicitud)
		{
			$this->id = $idsolicitud;

			
			$sql = "SELECT
					solicitud_pasantia.id_solicitud,
					solicitud_pasantia.fecha_inicio_prac,
					solicitud_pasantia.fecha_conclu_prac,
					solicitud_pasantia.tiempo_duracion,
					solicitud_pasantia.observaciones,
					solicitud_pasantia.estudiante_id_estudiante,
					solicitud_pasantia.nombre_empresa_sin_convenio,
					solicitud_pasantia.direccion,
					solicitud_pasantia.nombre_destinatario,
					solicitud_pasantia.cargo_encargado,
					solicitud_pasantia.telefono_empresa,
					solicitud_pasantia.fax,
					solicitud_pasantia.cargo_estudiante,
					solicitud_pasantia.fot_titulo_bachiller,
					solicitud_pasantia.fot_matricula,
					solicitud_pasantia.mensaje,
					solicitud_pasantia.fecha_creada,
					solicitud_pasantia.fecha_actualizada,
					solicitud_pasantia.fecha_eliminada,
					solicitud_pasantia.`status`,
					estudiante.carrera_sede_id_carrera_sede 
				FROM
					solicitud_pasantia
					INNER JOIN estudiante ON solicitud_pasantia.estudiante_id_estudiante = estudiante.id_estudiante 
				WHERE
					solicitud_pasantia.id_solicitud = '{$this->id}' "; 
					
			$result = $this->select($sql);
			if(empty($result))
			{
				$result =0;
			}
			
			return $result;
		}
		public function insertarSolicitudP(string $codigo, string $fechaInicio,string $fechaConclusion, string $tiempoduracion, string $Observaciones,int $idEstudianteSolicitud, string $cargoPracticante,string  $mensaje,string $nombreEmpresa, int $Telefono,string $Fax,string $direccion, string $nombreDestinatario, string $cargoDestinatario,string $ruta, string $new_name_file2)
		{
			$return = "";
			$this->Codigo = $codigo;
			$this->fechaInicio =$fechaInicio;
			$this->fechaConclusion =$fechaConclusion;
			$this->tiempoduracion = $tiempoduracion;
			$this->Observaciones =  $Observaciones;
			$this->idEstudianteSolicitud = $idEstudianteSolicitud;
			$this->nombreEmpresa =  $nombreEmpresa;
			$this->direccion = $direccion;
			$this->nombreDestinatario =   $nombreDestinatario;
			$this->cargoDestinatario =    $cargoDestinatario;
			$this->Telefono =  $Telefono;
			$this->Fax =   $Fax;
			$this->cargoPracticante =   $cargoPracticante;
			$this->fottitulobachiller = $ruta;
			$this->fotocopiamatricula = $new_name_file2;
			$this->mensaje = $mensaje;

			$query = "INSERT INTO solicitud_pasantia(codigo,fecha_inicio_prac,fecha_conclu_prac,tiempo_duracion,observaciones,estudiante_id_estudiante,nombre_empresa_sin_convenio,direccion,nombre_destinatario,cargo_encargado,telefono_empresa,fax,cargo_estudiante,fot_titulo_bachiller,fot_matricula,mensaje,fecha_creada) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,now())";
			$data = array($this->Codigo,$this->fechaInicio, $this->fechaConclusion, $this->tiempoduracion, $this->Observaciones,$this->idEstudianteSolicitud,  $this->nombreEmpresa,  $this->direccion, $this->nombreDestinatario, $this->cargoDestinatario,$this->Telefono,  $this->Fax, $this->cargoPracticante, $this->fottitulobachiller, $this->fotocopiamatricula , $this->mensaje);
			$resul = $this->insert($query, $data);
			$return = $resul;
			return $return;
		}

		public function insertarSolicitudPOriginal(string $codigo, string $fechaInicio,string $fechaConclusion, string $tiempoduracion, string $Observaciones, int $idEstudianteSolicitud,string $cargoPracticante,string  $mensaje,string $nombreEmpresa, int $Telefono,string $Fax,string $direccion, string $nombreDestinatario, string $cargoDestinatario,string $ruta, string $new_name_file2)
		{

			$return = "";
			$this->Codigo = $codigo;
			$this->fechaInicio =$fechaInicio;
			$this->fechaConclusion =$fechaConclusion;
			$this->tiempoduracion = $tiempoduracion;
			$this->Observaciones =  $Observaciones;
			$this->idEstudianteSolicitud = $idEstudianteSolicitud;
			$this->nombreEmpresa =  $nombreEmpresa;
			$this->direccion = $direccion;
			$this->nombreDestinatario =   $nombreDestinatario;
			$this->cargoDestinatario =    $cargoDestinatario;
			$this->Telefono =  $Telefono;
			$this->Fax =   $Fax;
			$this->cargoPracticante =   $cargoPracticante;
			$this->fottitulobachiller = $ruta;
			$this->fotocopiamatricula = $new_name_file2;
			$this->mensaje = $mensaje;
			$query = "INSERT INTO solicitud_pasantia(codigo,fecha_inicio_prac,fecha_conclu_prac,tiempo_duracion,observaciones,estudiante_id_estudiante , nombre_empresa_sin_convenio,direccion,nombre_destinatario,cargo_encargado,telefono_empresa,fax,cargo_estudiante,fot_titulo_bachiller,fot_matricula,mensaje) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
			$data = array($this->Codigo,$this->fechaInicio, $this->fechaConclusion, $this->tiempoduracion, $this->Observaciones, $this->idEstudianteSolicitud,  $this->nombreEmpresa,  $this->direccion, $this->nombreDestinatario, $this->cargoDestinatario,$this->Telefono,  $this->Fax, $this->cargoPracticante, $this->fottitulobachiller, $this->fotocopiamatricula , $this->mensaje);
			$resul = $this->insert($query, $data);
			$return = $resul;
			return $return;
		}
		public function insertarSeguimiento(string $estado_seg, string $mensaje, int $idsolpasantia, string $codigo_seguimiento,int $idAdministrativo)
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
		public function actualizarSolicitudP(int $idsolpasantia, string $fechaInicio, string $fechaConclusion, string $tiempoduracion, string $Observaciones, string $cargoPracticante,string  $mensaje,string $nombreEmpresa, int $telefono,string $Fax, string $direccion, string $nombreDestinatario, string $cargoDestinatario,string $ruta, string $new_name_file2)
		{

			$return = "";
			$this->idSolicitudP = $idsolpasantia;
			$this->fechaInicio =$fechaInicio;
			$this->fechaConclusion =$fechaConclusion;
			$this->tiempoduracion = $tiempoduracion;
			$this->Observaciones =  $Observaciones;
			$this->nombreEmpresa =  $nombreEmpresa;
			$this->direccion = $direccion;
			$this->nombreDestinatario =   $nombreDestinatario;
			$this->cargoDestinatario =    $cargoDestinatario;
			$this->Telefono =  $telefono;
			$this->Fax =   $Fax;
			$this->cargoPracticante =   $cargoPracticante;
			$this->fottitulobachiller = $ruta;
			$this->fotocopiamatricula = $new_name_file2;
			$this->mensaje = $mensaje;

			
			$query = "UPDATE solicitud_pasantia SET fecha_inicio_prac=?,fecha_conclu_prac=?,tiempo_duracion=?, observaciones=?, nombre_empresa_sin_convenio=?, direccion=?, nombre_destinatario=?, cargo_encargado=?, telefono_empresa=?, fax=?, cargo_estudiante=?, fot_titulo_bachiller=?, fot_matricula=?, mensaje=?  WHERE id_solicitud = '{$this->idSolicitudP}' ";
			$data = array($this->fechaInicio, $this->fechaConclusion, $this->tiempoduracion, $this->Observaciones,  $this->nombreEmpresa,  $this->direccion, $this->nombreDestinatario, $this->cargoDestinatario,$this->Telefono,  $this->Fax, $this->cargoPracticante, $this->fottitulobachiller, $this->fotocopiamatricula , $this->mensaje);
			$resul = $this->update($query, $data);
		  
			$return = $resul;
			return $return;
		}

		public function insertarPri100(string $practicante,string $carnet,string $carrera,string $nivel,string $domicilio,string $telefono,string $nombreApoderado,int $ciApoderado,
		string $domicilioApoderado,int $telefonoApoderado,string $fechaAutorizacion,string $fechaEnvio,string $nombreEmp,string $direccionEmp,
		int $telefonoEmp,int $fax,string  $nombreDes,string $cargo,string $fechaIniPrac,string $seccion,string $cargoPrac,string $fechaConcluPrac,
		string $tiempoDuracion,string $obser) 
		{
			//var_dump($id_tipo_convenio);
			$return = "";
			
			$this->practicante =$practicante;
			$this->carnet =$carnet;
			$this->carrera = $carrera;
			$this->nivel =  $nivel;
			$this->domicilio =   $domicilio;
			$this->telefono =  $telefono;
			$this->nombreApoderado =  $nombreApoderado;
			$this->ciApoderado =  $ciApoderado;
			$this->domicilioApoderado =   $domicilioApoderado;
			$this->telefonoApoderado =   $telefonoApoderado;
			$this->fechaAutorizacion =    $fechaAutorizacion;
			$this->fechaEnvio =    $fechaEnvio;
			$this->nombreEmp =    $nombreEmp;
			$this->direccionEmp =  $direccionEmp;
			$this->telefonoEmp =  $telefonoEmp;
			$this->fax =  $fax;
			$this->nombreDes =  $nombreDes;
			$this->cargo =  $cargo;
			$this->fechaIniPrac =  $fechaIniPrac;
			$this->seccion =  $seccion;
			$this->cargoPrac =  $cargoPrac;
			$this->fechaConcluPrac =  $fechaConcluPrac;
			$this->tiempoDuracion = $tiempoDuracion;
			$this->obser = $obser;
			//$this->status = $status;
			
			$sql = "SELECT * FROM persona WHERE nombres = '{$this->practicante}' ";//2 tipos iguales
			$sql = "SELECT * FROM solicitud_pasantia WHERE nombre_tipo = '{$this->tipoConvenio}' ";
			$result = $this->select_all($sql);
		  
			if (empty($result)) 
			{
				$query = "INSERT INTO solicitud_pasantia(nombre_tipo, descripcion_tipo) VALUES (?,?)";
				$data = array($this->tipoConvenio, $this->descripcion);
				$resul = $this->insert($query, $data);
				$return = $resul;
			}
			else 
			{
				$return = "existe";
			}
			
			return $return;
		}

		public function autocompletarFormulario(string $nombres, string $apellido_pat, string $apellido_mat, int $carnet, string $nromatricula, int $telefono, string $direccion, int $usuario_id_persona)
		{ 
			$return = "";
			$this->nombres = $nombres;
			$this->apellido_pat = $apellido_pat;
			$this->apellido_mat = $apellido_mat;
			$this->carnet = $carnet;
			$this->nromatricula = $nromatricula;
			$this->telefono = $telefono;
			$this->direccion = $direccion;
			
			$query = "UPDATE persona SET nombres=?, apellido_pat=?, apellido_mat=?, carnet=?, nromatricula=?, telefono=?,direccion=? WHERE usuario_id_persona=?";
			$data = array($this->nombres, $this->apellido_pat, $this->apellido_mat, $this->carnet, $this->nromatricula, $this->telefono, $this->direccion, $this->usuario_id_persona);
			$resul = $this->update($query, $data);
			$return = $resul;
			return $return;
		}

		public function selectSolicitudP(int $id)
		{
			
			$this->id = $id;
			$sql = "SELECT
			sp.id_solicitud, 
			sp.codigo, 
			sp.fecha_inicio_prac, 
			sp.fecha_conclu_prac, 
			sp.tiempo_duracion, 
			sp.observaciones, 
			sp.estudiante_id_estudiante, 
			sp.nombre_empresa_sin_convenio, 
			sp.direccion, 
			sp.nombre_destinatario, 
			sp.cargo_encargado, 
			sp.telefono_empresa, 
			sp.fax, 
			sp.cargo_estudiante, 
			sp.fot_titulo_bachiller, 
			sp.fot_matricula, 
			sp.mensaje, 
			sp.`status`, 
			p.usuario_id_persona, 
			p.nombres, 
			p.apellido_paterno, 
			p.apellido_materno, 
			p.e_mail, 
			p.carnet, 
			p.telefono, 
			p.direccion, 
			p.fecha_creada, 
			e.id_estudiante, 
			e.nro_matricula, 
			e.carrera_sede_id_carrera_sede, 
			e.persona_usuario_id_persona, 
			e.padre_apoderado, 
			e.ci_apoderado, 
			e.domicilio_apoderado, 
			e.telefono_apoderado,
			s.sede,
			c.carrera
		FROM
			solicitud_pasantia sp
			INNER JOIN estudiante e ON sp.estudiante_id_estudiante = e.id_estudiante
			INNER JOIN persona p ON e.persona_usuario_id_persona = p.usuario_id_persona
			INNER JOIN carrera_sede cas ON e.carrera_sede_id_carrera_sede = cas.id_carrera_sede
			INNER JOIN carrera c ON cas.carrera_id_carrera = c.id_carrera
			INNER JOIN sedes s ON cas.sedes_id_sedes = s.id_sedes
			
		WHERE
			sp.id_solicitud = '{$this->id}'";
			
			$data = $this->select($sql);
			if(empty($data))
			{
				$data=0;
			}
			return $data;
		}
		public function eliminarSolPasantia(int $idsolpasantia)
		{
			$return = "";
			$this->id = $idsolpasantia;
			$query = "UPDATE solicitud_pasantia SET status=? WHERE id_solicitud = $this->id";
			$data = array(0);
			$resul = $this->update($query, $data);
			$return = $resul;
			return $return;
		}

		public function ObtenerCodigoSolicitud(){
			 // 1. generar el CODIGO de manera automatica = SOL20220001
			$sql = "SELECT
						COUNT(solicitud_pasantia.id_solicitud) AS cantidad_solicitud
					FROM
						solicitud_pasantia 
					WHERE
						YEAR ( solicitud_pasantia.fecha_creada ) = Date_format( now(), '%Y' )";
			$data = $this->select($sql);
			$cantidad_solicitud = $data["cantidad_solicitud"] + 1;
			return "SOL".date("Y").str_pad($cantidad_solicitud, 4, "0", STR_PAD_LEFT);
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

	   public function encontrarRolesAdmin(string $rol)
	   {
			$this->roladmin = $rol;
			$sql = "SELECT id_rol 
					FROM rol
					WHERE nombre LIKE 'Secretaria Jefe de Carrera'";
			$data = $this->select($sql);
			return $data;
	   }

	   public function obtenerEstadoSeguimiento()
	   {

	   }


	   public function GetAdministrativo($id_carrera_sede ,$nombre_cargo)
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
?>


