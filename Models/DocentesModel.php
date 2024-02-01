<?php
class DocentesModel extends Mysql{
    public $id, $clave, $nombre, $usuario, $rol;

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }

    public function selectDocentes()
    {
        $sql = "SELECT
            docentes.id_docente,
            docentes.fecha_ingreso,
            docentes.curriculum,
            docentes.fecha_creada,
            docentes.`status`,
            docentes.carrera_sede_id_carrera_sede,
            docentes.persona_usuario_id_persona,
            docentes.materias_id_materia,
            persona.nombres,
            persona.apellido_paterno,
            persona.apellido_materno,
            persona.e_mail,
            persona.carnet,
            persona.telefono,
            persona.direccion,
            carrera_sede.sedes_id_sedes,
            carrera_sede.carrera_id_carrera,
            carrera_sede.id_carrera_sede,
            sedes.sede,
            carrera.carrera,
            materias.nombre_materia,
            materias.semestre 
        FROM
            docentes
            LEFT JOIN persona ON docentes.persona_usuario_id_persona = persona.usuario_id_persona
            LEFT JOIN carrera_sede ON docentes.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
            LEFT JOIN sedes ON carrera_sede.sedes_id_sedes = sedes.id_sedes
            LEFT JOIN carrera ON carrera_sede.carrera_id_carrera = carrera.id_carrera
            INNER JOIN materias ON docentes.materias_id_materia = materias.id_materia 
        WHERE
            docentes.`status` = 1";   
        
        $res = $this->select_all($sql);
        return $res;
    }

    
    public function selectDocentesInactivos()
    {
        $sql = "SELECT * FROM docentes WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarDocente(int $idDocente)
    {
        $this->idDocente = $idDocente;
        $consulta = "UPDATE docentes SET status = ? WHERE id_docente ='{$this->idDocente}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function insertarDocente(string $nombre,string $areaEmpresa,int $nroNit,string $ciudad,string $direccion,string $telfEmpresa,string $personaContacto,string $cargo, string $telefContacto)
    {   
        $return = "";
        
        $this->nombre = $nombre;
        $this->areaEmpresa = $areaEmpresa;
        $this->nroNit = $nroNit;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->telfEmpresa = $telfEmpresa;
        $this->personaContacto = $personaContacto;
        $this->cargo = $cargo;
        $this->telefContacto = $telefContacto;
        
        $sql = "SELECT * FROM docentes WHERE nombre_empresa = '{$this->nombre}' ";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  docentes(nombre_empresa,area_empresa,nit,ciudad,direccion,telefono,persona_contacto,cargo,telefono_contacto,fecha) VALUES(?,?,?,?,?,?,?,?,?,now())";
            $data = array($this->nombre,$this->areaEmpresa, $this->nroNit, $this->ciudad,$this->direccion,$this->telfEmpresa,$this->personaContacto, $this->cargo, $this->telefContacto);
            $result =  $this->insert($query,$data);
            return $result;
        }
        else{
            $return = "ya existe el nombre";
        }
        return $return; 
    }

    public function eliminarEmpresa(int $id)
    {
        $return = "";
        $this->id = $id;
        $consulta = "UPDATE docentes SET status = ? WHERE id_docente='{$this->id}'";
        $data = array(0);
        $result = $this->update($consulta,$data);
        return $result;
    }

    /*
    public function editarEmpresas(string $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM empresa WHERE id_docente = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }*/

    public function actualizarEmpresa(int $idDocente,string $nombre,string $areaEmpresa,int $nroNit,string $ciudad,string $direccion,string $telfEmpresa,string $personaContacto,string $cargo, string $telefContacto)
    {   
        $return = "";
        $this->idDocente = $idDocente;
        $this->nombre = $nombre;
        $this->areaEmpresa = $areaEmpresa;
        $this->nroNit = $nroNit;
        $this->telefContacto = $telefContacto;
        $this->personaContacto = $personaContacto;
        $this->cargo = $cargo;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->telfEmpresa = $telfEmpresa;

        $verificar ="SELECT * FROM docentes WHERE nombre_empresa = '{$this->nombre}' and  id_docente != '{$this->idDocente}'";
        $result = $this->select_all($verificar);

        if(empty($result))
        {   
            $query = "UPDATE docentes SET nombre_empresa=?, area_empresa=?, nit=?, ciudad=?,direccion=?,telefono=?, persona_contacto=?, cargo=?,telefono_contacto=? WHERE id_docente=?";
            $data = array($this->nombre,$this->areaEmpresa, $this->nroNit,  $this->ciudad,$this->direccion,$this->telfEmpresa, $this->personaContacto, $this->cargo,$this->telefContacto,$this->idDocente);
            $result =  $this->update($query,$data);
            $return = $result;
        }else 
        {
            $return = "existe";
        } 
        return $return;
    }

}