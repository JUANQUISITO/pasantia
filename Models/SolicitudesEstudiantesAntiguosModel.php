<?php
class SolicitudesEstudiantesAntiguosModel extends Mysql{
    public $id, $clave, $nombre, $usuario, $rol;

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    

    public function selectSolicitudesEstudiantesAntiguos()
    {
        
        $sql = "SELECT * FROM solicitudes_estudiantes_antiguos WHERE status !=0";
        $res = $this->select_all($sql);
        return $res;
    }

    //SOLO SELECCIONA UNA
    public function selectSolicitudEstudianteAntiguo($idSolicitudesEstudiantesAntiguos)
    {
        $return = "";
        $this->idSolicitudesEstudiantesAntiguos = $idSolicitudesEstudiantesAntiguos;
        $sql = "SELECT * FROM solicitudes_estudiantes_antiguos WHERE id_sol_est_antiguo = $this->idSolicitudesEstudiantesAntiguos";
        $res = $this->select($sql);
        if (empty($res)) {
           return false;
        }
        return $res; 
    }

    
    public function selectEmpresasInactivos()
    {
        $sql = "SELECT * FROM empresa WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarEmpresa(int $idEmpresa)
    {
        $this->idEmpresa = $idEmpresa;
        $consulta = "UPDATE empresa SET status = ? WHERE id_empresa ='{$this->idEmpresa}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function insertarEmpresa(string $nombre,string $areaEmpresa,int $nroNit,string $ciudad,string $direccion,string $telfEmpresa,string $personaContacto,string $cargo, string $telefContacto)
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
        
        $sql = "SELECT * FROM empresa WHERE nombre_empresa = '{$this->nombre}' ";
        $result = $this->select_all($sql);
        if (empty($result)) {
            $query = "INSERT INTO  empresa(nombre_empresa,area_empresa,nit,ciudad,direccion,telefono,persona_contacto,cargo,telefono_contacto,fecha) VALUES(?,?,?,?,?,?,?,?,?,now())";
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
        $consulta = "UPDATE empresa SET status = ? WHERE id_empresa='{$this->id}'";
        $data = array(0);
        $result = $this->update($consulta,$data);
        return $result;
    }

    /*
    public function editarEmpresas(string $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM empresa WHERE id_empresa = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }*/

    public function actualizarEmpresa(int $idEmpresa,string $nombre,string $areaEmpresa,int $nroNit,string $ciudad,string $direccion,string $telfEmpresa,string $personaContacto,string $cargo, string $telefContacto)
    {   
        $return = "";
        $this->idEmpresa = $idEmpresa;
        $this->nombre = $nombre;
        $this->areaEmpresa = $areaEmpresa;
        $this->nroNit = $nroNit;
        $this->telefContacto = $telefContacto;
        $this->personaContacto = $personaContacto;
        $this->cargo = $cargo;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->telfEmpresa = $telfEmpresa;

        $verificar ="SELECT * FROM empresa WHERE nombre_empresa = '{$this->nombre}' and  id_empresa != '{$this->idEmpresa}'";
        $result = $this->select_all($verificar);

        if(empty($result))
        {   
            $query = "UPDATE empresa SET nombre_empresa=?, area_empresa=?, nit=?, ciudad=?,direccion=?,telefono=?, persona_contacto=?, cargo=?,telefono_contacto=? WHERE id_empresa=?";
            $data = array($this->nombre,$this->areaEmpresa, $this->nroNit,  $this->ciudad,$this->direccion,$this->telfEmpresa, $this->personaContacto, $this->cargo,$this->telefContacto,$this->idEmpresa);
            $result =  $this->update($query,$data);
            $return = $result;
        }else 
        {
            $return = "existe";
        } 
        return $return;
    }
}