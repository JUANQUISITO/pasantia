-- Created by Vertabelo (http://vertabelo.com)
-- Last modification date: 2022-10-01 17:24:21.489

-- tables
-- Table: administrativo
CREATE TABLE administrativo (
    id_administrativo bigint(20) NOT NULL AUTO_INCREMENT,
    cargo_id_cargo bigint(20) NOT NULL,
    carrera_sede_id_carrera_sede bigint(20) NULL,
    persona_usuario_id_persona bigint(20) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT administrativo_pk PRIMARY KEY (id_administrativo)
);

-- Table: cargo
CREATE TABLE cargo (
    id_cargo bigint(20) NOT NULL AUTO_INCREMENT,
    nombre_cargo varchar(128) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT cargo_pk PRIMARY KEY (id_cargo)
);

-- Table: carrera
CREATE TABLE carrera (
    id_carrera bigint(20) NOT NULL AUTO_INCREMENT,
    carrera varchar(30) NOT NULL,
    descripcion varchar(50) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT carrera_pk PRIMARY KEY (id_carrera)
);

-- Table: carrera_sede
CREATE TABLE carrera_sede (
    id_carrera_sede bigint(20) NOT NULL AUTO_INCREMENT,
    carrera_id_carrera bigint(20) NOT NULL,
    sedes_id_sedes bigint(20) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT carrera_sede_pk PRIMARY KEY (id_carrera_sede)
);

-- Table: convenios
CREATE TABLE convenios (
    id_convenio bigint(20) NOT NULL AUTO_INCREMENT,
    codigo varchar(50) NOT NULL,
    fecha_inicio date NOT NULL,
    fecha_final date NOT NULL,
    archivo varchar(150) NOT NULL,
    tipo_convenio_id_tipo_convenio bigint(20) NOT NULL,
    empresa_id_empresa bigint(20) NOT NULL,
    fecha_creada datetime NOT NULL,
    fecha_actualizada datetime NOT NULL,
    status int(11) NOT NULL DEFAULT 1,
    CONSTRAINT convenios_pk PRIMARY KEY (id_convenio)
);

-- Table: docentes
CREATE TABLE docentes (
    id_docente bigint(20) NOT NULL AUTO_INCREMENT,
    fecha_ingreso date NOT NULL,
    curriculum varchar(150) NOT NULL,
    fecha_creada int NOT NULL,
    status varchar(30) NOT NULL DEFAULT 1,
    carrera_sede_id_carrera_sede bigint(20) NOT NULL,
    persona_usuario_id_persona bigint(20) NOT NULL,
    materias_id_materia bigint(20) NOT NULL,
    CONSTRAINT docentes_pk PRIMARY KEY (id_docente)
);

-- Table: empresa
CREATE TABLE empresa (
    id_empresa bigint(20) NOT NULL AUTO_INCREMENT,
    nombre_empresa varchar(30) NOT NULL,
    area_empresa varchar(30) NOT NULL,
    nit int NULL,
    telefono_contacto varchar(30) NOT NULL,
    persona_contacto varchar(30) NOT NULL,
    fecha date NOT NULL,
    telefono varchar(30) NOT NULL,
    direccion varchar(100) NOT NULL,
    ciudad varchar(50) NOT NULL,
    cargo varchar(30) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT empresa_pk PRIMARY KEY (id_empresa)
);

-- Table: estudiante
CREATE TABLE estudiante (
    id_estudiante bigint(20) NOT NULL AUTO_INCREMENT,
    nro_matricula varchar(40) NOT NULL,
    carrera_sede_id_carrera_sede bigint(20) NOT NULL,
    persona_usuario_id_persona bigint(20) NOT NULL,
    padre_apoderado varchar(35) NULL,
    ci_apoderado int(11) NULL,
    domicilio_apoderado varchar(80) NULL,
    telefono_apoderado int(11) NULL,
    fecha_creada datetime NOT NULL,
    fecha_actualizada datetime NULL,
    fecha_eliminada datetime NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT estudiante_pk PRIMARY KEY (id_estudiante)
);

-- Table: materias
CREATE TABLE materias (
    id_materia bigint(20) NOT NULL AUTO_INCREMENT,
    nombre_materia varchar(60) NOT NULL,
    semestre varchar(60) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT materias_pk PRIMARY KEY (id_materia)
);

-- Table: modulo
CREATE TABLE modulo (
    id_modulo bigint(20) NOT NULL AUTO_INCREMENT,
    nombre varchar(50) NOT NULL,
    descripcion varchar(50) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT modulo_pk PRIMARY KEY (id_modulo)
);

-- Table: permisos
CREATE TABLE permisos (
    id_permiso bigint(20) NOT NULL AUTO_INCREMENT,
    r int NOT NULL,
    w int NOT NULL,
    u int NOT NULL,
    d int NOT NULL,
    rol_id_rol bigint(20) NOT NULL,
    modulo_id_modulo bigint(20) NOT NULL,
    CONSTRAINT permisos_pk PRIMARY KEY (id_permiso)
);

-- Table: persona
CREATE TABLE persona (
    usuario_id_persona bigint(20) NOT NULL,
    nombres varchar(30) NULL,
    apellido_paterno varchar(30) NULL,
    apellido_materno varchar(30) NULL,
    e_mail varchar(50) NULL,
    carnet varchar(30) NOT NULL,
    telefono varchar(30) NULL,
    direccion varchar(100) NULL,
    fecha_creada datetime NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT persona_pk PRIMARY KEY (usuario_id_persona)
);

-- Table: publicacion
CREATE TABLE publicacion (
    id_convocatoria bigint(20) NOT NULL AUTO_INCREMENT,
    titulo varchar(30) NOT NULL,
    area varchar(30) NULL,
    cantidad_pasantes int NULL,
    remuneracion int NULL,
    beneficios varchar(40) NULL,
    tiempo_pasantia varchar(25) NULL,
    descripcion_puesto varchar(200) NOT NULL,
    fecha_publicacion date NOT NULL,
    fecha_limite_postulacion date NOT NULL,
    persona_referencia varchar(30) NULL,
    telefono_referencia varchar(30) NULL,
    empresa_id_empresa bigint(20) NOT NULL,
    carrera_id_carrera bigint(20) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT publicacion_pk PRIMARY KEY (id_convocatoria)
);

-- Table: rol
CREATE TABLE rol (
    id_rol bigint(20) NOT NULL AUTO_INCREMENT,
    nombre varchar(80) NOT NULL,
    descripcion varchar(80) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT rol_pk PRIMARY KEY (id_rol)
);

-- Table: sedes
CREATE TABLE sedes (
    id_sedes bigint(20) NOT NULL AUTO_INCREMENT,
    sede varchar(45) NOT NULL,
    descripcion varchar(45) NOT NULL,
    direccion varchar(145) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT sedes_pk PRIMARY KEY (id_sedes)
);

-- Table: seguimiento
CREATE TABLE seguimiento (
    id_seguimiento bigint(20) NOT NULL AUTO_INCREMENT,
    estado_seg enum('enviado','recibido','revisado','observado','rechazado','finalizado')  NOT NULL DEFAULT 'enviado',
    mensaje_seg varchar(50) NOT NULL,
    solicitud_pasantia_id_solicitud bigint(20) NOT NULL,
    cod_seguimiento varchar(30) NOT NULL,
    fecha datetime NOT NULL,
    administrativo_id_administrativo bigint(20) NOT NULL,
    CONSTRAINT seguimiento_pk PRIMARY KEY (id_seguimiento)
);

-- Table: solicitud_pasantia
CREATE TABLE solicitud_pasantia (
    id_solicitud bigint(20) NOT NULL AUTO_INCREMENT,
    codigo varchar(30) NOT NULL,
    fecha_inicio_prac date NOT NULL,
    fecha_conclu_prac date NOT NULL,
    tiempo_duracion varchar(40) NOT NULL,
    observaciones varchar(30) NOT NULL,
    estudiante_id_estudiante bigint(20) NOT NULL,
    nombre_empresa_sin_convenio varchar(35) NULL,
    direccion varchar(35) NULL,
    nombre_destinatario varchar(35) NULL,
    cargo_encargado varchar(40) NULL,
    telefono_empresa int NULL,
    fax int NULL,
    cargo_estudiante varchar(40) NOT NULL,
    fot_titulo_bachiller varchar(100) NOT NULL,
    fot_matricula varchar(100) NOT NULL,
    mensaje varchar(40) NULL,
    fecha_creada datetime NOT NULL,
    fecha_actualizada datetime NULL,
    fecha_eliminada datetime NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT solicitud_pasantia_pk PRIMARY KEY (id_solicitud)
);

-- Table: solicitudes_estudiantes_antiguos
CREATE TABLE solicitudes_estudiantes_antiguos (
    id_sol_est_antiguo int NOT NULL,
    nombres_ant varchar(50) NOT NULL,
    ap_paterno_ant varchar(50) NOT NULL,
    ap_materno_ant varchar(50) NOT NULL,
    ci_ant varchar(50) NOT NULL,
    matricula_ant int NOT NULL,
    carrera_ant varchar(50) NOT NULL,
    correo_ant varchar(50) NOT NULL,
    correo_alt_ant varchar(50) NOT NULL,
    telefono_ant int NOT NULL,
    direccion_ant varchar(50) NOT NULL,
    fecha_solicitud datetime NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT solicitudes_estudiantes_antiguos_pk PRIMARY KEY (id_sol_est_antiguo)
);

-- Table: tipo_convenio
CREATE TABLE tipo_convenio (
    id_tipo_convenio bigint(20) NOT NULL AUTO_INCREMENT,
    nombre_tipo varchar(30) NOT NULL,
    descripcion_tipo varchar(30) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT tipo_convenio_pk PRIMARY KEY (id_tipo_convenio)
);

-- Table: usuario
CREATE TABLE usuario (
    id_persona bigint(20) NOT NULL AUTO_INCREMENT,
    nombre_usuario varchar(30) NOT NULL,
    clave varchar(200) NOT NULL,
    fecha_creada datetime NOT NULL,
    fecha_actualizada datetime NULL,
    fecha_eliminada datetime NULL,
    rol_id_rol bigint(20) NOT NULL,
    status int NOT NULL DEFAULT 1,
    CONSTRAINT usuario_pk PRIMARY KEY (id_persona)
);

-- foreign keys
-- Reference: administrativo_cargo (table: administrativo)
ALTER TABLE administrativo ADD CONSTRAINT administrativo_cargo FOREIGN KEY administrativo_cargo (cargo_id_cargo)
    REFERENCES cargo (id_cargo);

-- Reference: administrativo_carrera_sede (table: administrativo)
ALTER TABLE administrativo ADD CONSTRAINT administrativo_carrera_sede FOREIGN KEY administrativo_carrera_sede (carrera_sede_id_carrera_sede)
    REFERENCES carrera_sede (id_carrera_sede);

-- Reference: administrativo_persona (table: administrativo)
ALTER TABLE administrativo ADD CONSTRAINT administrativo_persona FOREIGN KEY administrativo_persona (persona_usuario_id_persona)
    REFERENCES persona (usuario_id_persona);

-- Reference: carrera_sede_carrera (table: carrera_sede)
ALTER TABLE carrera_sede ADD CONSTRAINT carrera_sede_carrera FOREIGN KEY carrera_sede_carrera (carrera_id_carrera)
    REFERENCES carrera (id_carrera);

-- Reference: carrera_sede_sedes (table: carrera_sede)
ALTER TABLE carrera_sede ADD CONSTRAINT carrera_sede_sedes FOREIGN KEY carrera_sede_sedes (sedes_id_sedes)
    REFERENCES sedes (id_sedes);

-- Reference: convenios_empresa (table: convenios)
ALTER TABLE convenios ADD CONSTRAINT convenios_empresa FOREIGN KEY convenios_empresa (empresa_id_empresa)
    REFERENCES empresa (id_empresa);

-- Reference: convenios_tipo_convenio (table: convenios)
ALTER TABLE convenios ADD CONSTRAINT convenios_tipo_convenio FOREIGN KEY convenios_tipo_convenio (tipo_convenio_id_tipo_convenio)
    REFERENCES tipo_convenio (id_tipo_convenio);

-- Reference: docentes_carrera_sede (table: docentes)
ALTER TABLE docentes ADD CONSTRAINT docentes_carrera_sede FOREIGN KEY docentes_carrera_sede (carrera_sede_id_carrera_sede)
    REFERENCES carrera_sede (id_carrera_sede);

-- Reference: docentes_materias (table: docentes)
ALTER TABLE docentes ADD CONSTRAINT docentes_materias FOREIGN KEY docentes_materias (materias_id_materia)
    REFERENCES materias (id_materia);

-- Reference: docentes_persona (table: docentes)
ALTER TABLE docentes ADD CONSTRAINT docentes_persona FOREIGN KEY docentes_persona (persona_usuario_id_persona)
    REFERENCES persona (usuario_id_persona);

-- Reference: estudiante_carrera_sede (table: estudiante)
ALTER TABLE estudiante ADD CONSTRAINT estudiante_carrera_sede FOREIGN KEY estudiante_carrera_sede (carrera_sede_id_carrera_sede)
    REFERENCES carrera_sede (id_carrera_sede);

-- Reference: estudiante_persona (table: estudiante)
ALTER TABLE estudiante ADD CONSTRAINT estudiante_persona FOREIGN KEY estudiante_persona (persona_usuario_id_persona)
    REFERENCES persona (usuario_id_persona);

-- Reference: form_pricien_estudiante (table: solicitud_pasantia)
ALTER TABLE solicitud_pasantia ADD CONSTRAINT form_pricien_estudiante FOREIGN KEY form_pricien_estudiante (estudiante_id_estudiante)
    REFERENCES estudiante (id_estudiante);

-- Reference: permisos_modulo (table: permisos)
ALTER TABLE permisos ADD CONSTRAINT permisos_modulo FOREIGN KEY permisos_modulo (modulo_id_modulo)
    REFERENCES modulo (id_modulo);

-- Reference: permisos_rol (table: permisos)
ALTER TABLE permisos ADD CONSTRAINT permisos_rol FOREIGN KEY permisos_rol (rol_id_rol)
    REFERENCES rol (id_rol);

-- Reference: persona_usuario (table: persona)
ALTER TABLE persona ADD CONSTRAINT persona_usuario FOREIGN KEY persona_usuario (usuario_id_persona)
    REFERENCES usuario (id_persona);

-- Reference: publicacion_carrera (table: publicacion)
ALTER TABLE publicacion ADD CONSTRAINT publicacion_carrera FOREIGN KEY publicacion_carrera (carrera_id_carrera)
    REFERENCES carrera (id_carrera);

-- Reference: publicacion_empresa (table: publicacion)
ALTER TABLE publicacion ADD CONSTRAINT publicacion_empresa FOREIGN KEY publicacion_empresa (empresa_id_empresa)
    REFERENCES empresa (id_empresa);

-- Reference: seguimiento_administrativo (table: seguimiento)
ALTER TABLE seguimiento ADD CONSTRAINT seguimiento_administrativo FOREIGN KEY seguimiento_administrativo (administrativo_id_administrativo)
    REFERENCES administrativo (id_administrativo);

-- Reference: seguimiento_solicitud_pasantia (table: seguimiento)
ALTER TABLE seguimiento ADD CONSTRAINT seguimiento_solicitud_pasantia FOREIGN KEY seguimiento_solicitud_pasantia (solicitud_pasantia_id_solicitud)
    REFERENCES solicitud_pasantia (id_solicitud);

-- Reference: usuario_rol (table: usuario)
ALTER TABLE usuario ADD CONSTRAINT usuario_rol FOREIGN KEY usuario_rol (rol_id_rol)
    REFERENCES rol (id_rol);

-- End of file.




INSERT INTO rol (id_rol, nombre, descripcion, status) VALUES
(1, 'Administrador', 'Administrador', 1);

--
-- Dumping data for table usuario
--
INSERT INTO usuario (id_persona, nombre_usuario, clave, fecha_creada, fecha_actualizada, fecha_eliminada, status, rol_id_rol) VALUES
(1, 'admin', '$2y$10$Iv6duCPesDU./4FYPIxpJOee7nbJ9uI.mZJn9UKc5J7fiXIvt2VSy', 'now()',NULL, NULL,1, 1);

INSERT INTO persona(usuario_id_persona,carnet) VALUES(1,'admin');

INSERT INTO `modulo` (`id_modulo`, `nombre`, `descripcion`, `status`) VALUES
(1, 'Dashboard', 'Dashboard del administrador', 1),
(2, 'Usuarios', 'Usuarios', 1),
(3, 'estudiante', 'estudiante', 1),
(4, 'solicitud_pasantia', 'solicitud_pasantia', 1),
(5, 'empresa', 'empresa', 1),
(6, 'carrera_sede', 'carrera_sede', 1),
(7, 'cargo', 'cargo', 1),
(8, 'administrativo', 'administrativo', 1),
(9, 'carrera', 'carrera', 1),
(10, 'sede', 'sedes de la escuela', 1),
(11, 'rol', 'rol', 1),
(12, 'seguimiento', 'seguimiento', 1),
(13, 'Convenios', 'Convenios', 1),
(14, 'tipo convenios', 'tipo convenios', 1),
(15, 'docentes', '', 1),
(16, 'publicaciones', 'publicaciones', 1),
(17, 'archivos', 'archivos', 1),
(18, 'solicitud de estudiantes antiguos', 'solicitud de estudiantes antiguos', 1);


