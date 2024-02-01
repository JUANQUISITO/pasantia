<?php
class AdministrativosModel extends Mysql
{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }

    public function selectAdministrativos()
    {
        $sql = "SELECT
        administrativo.id_administrativo, 
        administrativo.cargo_id_cargo, 
        administrativo.persona_usuario_id_persona, 
        administrativo.`status`, 
        cargo.nombre_cargo, 
        persona.nombres, 
        persona.apellido_paterno, 
        persona.apellido_materno, 
        persona.e_mail, 
        persona.carnet, 
        persona.telefono, 
        persona.direccion, 
        carrera.carrera, 
        sedes.sede
        FROM
        administrativo
        INNER JOIN
        cargo
        ON 
            administrativo.cargo_id_cargo = cargo.id_cargo
        INNER JOIN
        persona
        ON 
            administrativo.persona_usuario_id_persona = persona.usuario_id_persona
        LEFT JOIN
        carrera_sede
        ON 
            administrativo.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
        LEFT JOIN
        carrera
        ON 
            carrera_sede.carrera_id_carrera = carrera.id_carrera
        LEFT JOIN
        sedes
        ON 
            carrera_sede.sedes_id_sedes = sedes.id_sedes
        ORDER BY administrativo.id_administrativo DESC";  
        $data = $this->select_all($sql);

        return $data; 
    }

    public function selectAdministrativosEliminados()
    {
        $sql = "SELECT
        *, 
        administrativo.id_administrativo, 
        administrativo.cargo_id_cargo, 
        administrativo.persona_usuario_id_persona, 
        administrativo.`status`, 
        cargo.nombre_cargo, 
        persona.nombres, 
        persona.apellido_paterno, 
        persona.apellido_materno, 
        persona.e_mail, 
        persona.carnet, 
        persona.telefono, 
        persona.direccion, 
        carrera.carrera, 
        sedes.sede
        FROM
        administrativo
        INNER JOIN
        cargo
        ON 
            administrativo.cargo_id_cargo = cargo.id_cargo
        INNER JOIN
        persona
        ON 
            administrativo.persona_usuario_id_persona = persona.usuario_id_persona
        INNER JOIN
        carrera_sede
        ON 
            administrativo.carrera_sede_id_carrera_sede = carrera_sede.id_carrera_sede
        INNER JOIN
        carrera
        ON 
            carrera_sede.carrera_id_carrera = carrera.id_carrera
        INNER JOIN
        sedes
        ON 
            carrera_sede.sedes_id_sedes = sedes.id_sedes
        WHERE administrativo.status !=1";
       
        $data = $this->select_all($sql); 
        return $data; 
    }

    
        // solo uno 
    public function selectAdministrativo(int $idAdministrativo)
    {   
        $this->idAdministrativo = intval($idAdministrativo);
       
        $query = "SELECT
            a.id_administrativo,
            a.convenios_id_convenio, 
            a.cargo_id_cargo,
            a.carrera_sede_id_carrera_sede,
            /*a.fecha_creada,
             a.fecha_actualizada,
            a.fecha_eliminada,*/
            a.persona_usuario_id_persona,
            a.status,

            c.id_cargo,
            c.nombre_cargo,
            c.status,

            cs.id_carrera_sede,
            cs.carrera_id_carrera,
            cs.sedes_id_sedes,
            cs.status,

            p.usuario_id_persona,
            p.nombres,
            p.apellido_paterno,
            p.apellido_materno,
            p.e_mail,
            p.carnet,
            p.telefono,
            p.direccion,
            p.fecha_creada,
            p.status,

            co.id_convenio,
            co.codigo,
            co.fecha_inicio,
            co.fecha_final,
            co.archivo,
            co.status,
            co.tipo_convenio_id_tipo_convenio,
            co.empresa_id_empresa

        FROM administrativo a
        INNER JOIN cargo c
        on a.cargo_id_cargo = c.id_cargo

        INNER JOIN carrera_sede cs
        on a.carrera_sede_id_carrera_sede = cs.id_carrera_sede

        INNER JOIN persona p
        on a.persona_usuario_id_persona = p.usuario_id_persona

        INNER JOIN convenios co
        on a.convenios_id_convenio = co.id_convenio

        WHERE a.id_administrativo = $this->idAdministrativo";
        $result = $this->select($query);
        if(empty($result))
        {
            $result =0;
        }           
        return $result;
    }

    public function VerificarAdministrativo(string $nro_carnet_administrativo="")
    {
        $consulta = "SELECT
        persona.carnet, 
        administrativo.id_administrativo
        FROM
        persona
        INNER JOIN
        administrativo
        ON 
            persona.usuario_id_persona = administrativo.persona_usuario_id_persona
        WHERE
        persona.carnet = '$nro_carnet_administrativo'";
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

    public function selectVerificarAdministrativos($carnet)
    {
        $this->carnet=$carnet;
        $sql = "SELECT       
        * 
        FROM
        persona
        WHERE carnet like $this->carnet"; //like significa parecido
        
        $data = $this->select_all($sql);

        return $data; 
    }
    
    public function insertarAdministrativos( string $nombres, string $cargo, string $carreraSede) 
    {
       // var_dump($idAdministrativo);
        $return = "";
        $this->nombres = $nombres;
        $this->cargo = $cargo;
        $this->carreraSede = $carreraSede;

        $sql = "SELECT * FROM administrativo WHERE persona_usuario_id_persona = '{$this->nombres}' ";
        $result = $this->select_all($sql);
      
        if (empty($result)) 
        {
            $query = "INSERT INTO administrativo(persona_usuario_id_persona, cargo_id_cargo, carrera_sede_id_carrera_sede) VALUES (?,?,?)";
            $data = array( $this->nombres, $this->cargo, $this->carreraSede);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else 
        {
            $return = "existe";
        }       
        return $return;
    }
  
    public function editarAdministrativos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM administrativo WHERE idAdministrativo = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }  

    // public function actualizarAdministrativos( string $nombres,string $apPat,string $apMat,string $email,string $ci,string $tel,string $dir, string $cargo, int $idAdministrativo)
    public function actualizarAdministrativos( string $nombres, string $cargo,string $carreraSede, int $idAdministrativo)
    { 
        $return = "";
        $this->idAdministrativo = $idAdministrativo;
        $this->nombres = $nombres;
       // $this->apPat = $apPat;
       // $this->apMat = $apMat;
       // $this->email = $email;
       // $this->ci = $ci;
       // $this->tel = $tel;
       // $this->dir = $dir;
        $this->cargo = $cargo;
        $this->carreraSede = $carreraSede;
        
        $verificar ="SELECT * FROM administrativo WHERE id_administrativo != '{$this->idAdministrativo}'";
        $result = $this->select_all($verificar);

        if(empty($result))
        { 
            $query = "UPDATE administrativo SET persona_usuario_id_persona=?, carrera_sede_id_carrera_sede=?,cargo_id_cargo=? WHERE id_administrativo='{$this->idAdministrativo}'";
            //$data = array( $this->nombres, $this->apPat, $this->apMat, $this->email, $this->idAdministrativo);
            $data = array( $this->nombres, $this->cargo, $this->carreraSede, $this->idAdministrativo);
            $resul = $this->update($query, $data);
            $return = $resul;
        }else
        {
            $return = "existe";
        }      
        return $return;
    }

    public function eliminarAdministrativos(int $idAdministrativo)
    {
        $this->idAdministrativo = $idAdministrativo;
        $query = " UPDATE administrativo SET status =? WHERE id_administrativo = $this->idAdministrativo ";
        $data = array(0);
        $result = $this->update($query,$data);
        return $result;
    }

    public function reingresar(int $idAdministrativo)
    {
        $this->idAdministrativo = $idAdministrativo;
        $query = " UPDATE administrativo SET status =? WHERE id_administrativo = $this->idAdministrativo ";
        $data = array(1);
        $result = $this->update($query,$data);
        return $result;
    }    
}