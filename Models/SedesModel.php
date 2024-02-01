<?php
class SedesModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    public function selectSedes()
    {
        $sql = "SELECT * FROM sedes WHERE status != 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectSede($idSede)
    {
        $return = "";
        $this->idSede = $idSede;
        $sql = "SELECT * FROM sedes WHERE id_sedes = $this->idSede";
        $res = $this->select($sql);
        if (empty($res)) {
           return false;
        }
        return $res;
        
    }

    public function selectSedeInactivos()
    {
        $sql = "SELECT * FROM sedes WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarSede(int $idSede)
    {
        $this->idSede = $idSede;
        $consulta = "UPDATE sedes SET status = ? WHERE id_sedes ='{$this->idSede}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function insertarSedes(string $sede, string $descripcion, string $direccion) 
    {
        //var_dump($id_sedes);
        $return = "";
        
        $this->sede = $sede;
        $this->descripcion = $descripcion;
        $this->direccion = $direccion;
        //$this->status = $status;
        
        $sql = "SELECT * FROM sedes WHERE sede = '{$this->sede}' ";//2 tipos iguales
        $result = $this->select_all($sql);
      
        if (empty($result)) 
        {
            $query = "INSERT INTO sedes(sede, descripcion,direccion) VALUES (?,?,?)";
            $data = array($this->sede, $this->descripcion, $this->direccion);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }
        else 
        {
            $return = "existe";
        }
        
        return $return;
    }


/*
    public function editarTipoConvenios(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM sedes WHERE id_sedes = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
 */
    
    public function actualizarSedes( int $idSede,string $sede, string $descripcion, string $direccion)
    { 
        $return = "";
        $this->idSede = $idSede;
        $this->sede = $sede;
        $this->descripcion = $descripcion;
        $this->direccion = $direccion;
        $verificar = "SELECT * FROM sedes WHERE sede = '{$this->sede}' and id_sedes !='{$this->idSede}'";
        $result = $this->select_all($verificar);
        if(empty($result))
        {
        $query = "UPDATE sedes SET sede=?, descripcion=?, direccion=? WHERE id_sedes=?";
        $data = array( $this->sede, $this->descripcion, $this->direccion, $this->idSede);
        $resul = $this->update($query, $data);
        $return = $resul;
        }
        else
        {
            $return ="existe";
        }
        return $return;
    }

    public function eliminarSedes(int $idSede)
    {        
        $return = "";
        $this->id = $idSede;
        $consulta = "UPDATE sedes SET status = ? WHERE id_sedes='{$this->id}'";
        $data = array(0);
        $result = $this->update($consulta,$data);
        return $result;
    }   
}