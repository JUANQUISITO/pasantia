<?php
class TipoConveniosModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
      
    public function selectTipoConvenios()
    {
        $sql = "SELECT * FROM tipo_convenio WHERE status != 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectTipo($idTipoConvenio)
    {
        $return = "";
        $this->idTipoConvenio = $idTipoConvenio;
        $sql = "SELECT * FROM tipo_convenio WHERE id_tipo_convenio = $this->idTipoConvenio";
        $res = $this->select($sql);
        if (empty($res)) {
           return false;
        }
        return $res;
        
    }

    public function selectTipoConvenioInactivos()
    {
        $sql = "SELECT * FROM tipo_convenio WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarTipoConvenio(int $idTipoConvenio)
    {
        $this->idTipoConvenio = $idTipoConvenio;
        $consulta = "UPDATE tipo_convenio SET status = ? WHERE id_tipo_convenio ='{$this->idTipoConvenio}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function insertarTipoConvenios(string $tipoConvenio, string $descripcion) 
    {
        //var_dump($id_tipo_convenio);
        $return = "";
        
        $this->tipoConvenio = $tipoConvenio;
        $this->descripcion = $descripcion;
        //$this->status = $status;
        
        $sql = "SELECT * FROM tipo_convenio WHERE nombre_tipo = '{$this->tipoConvenio}' ";//2 tipos iguales
        $result = $this->select_all($sql);
      
        if (empty($result)) 
        {
            $query = "INSERT INTO tipo_convenio(nombre_tipo, descripcion_tipo) VALUES (?,?)";
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


/*
    public function editarTipoConvenios(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM tipo_convenio WHERE id_tipo_convenio = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
 */
    
    public function actualizarTipoConvenios( int $idTipoConvenio,string $tipoConvenio, string $descripcion)
    { 
        $return = "";
        $this->idTipoConvenio = $idTipoConvenio;
        $this->tipoConvenio = $tipoConvenio;
        $this->descripcion = $descripcion;
        $verificar = "SELECT * FROM tipo_convenio WHERE nombre_tipo = '{$this->tipoConvenio}' and id_tipo_convenio !='{$this->idTipoConvenio}'";
        $result = $this->select_all($verificar);
        if(empty($result))
        {
        $query = "UPDATE tipo_convenio SET nombre_tipo=?, descripcion_tipo=? WHERE id_tipo_convenio=?";
        $data = array( $this->tipoConvenio, $this->descripcion, $this->idTipoConvenio);
        $resul = $this->update($query, $data);
        $return = $resul;
        }
        else
        {
            $return ="existe";
        }
        return $return;
    }

    public function eliminarTipoConvenios(int $idTipoConvenio)
    {        
        $return = "";
        $this->id = $idTipoConvenio;
        $consulta = "UPDATE tipo_convenio SET status = ? WHERE id_tipo_convenio='{$this->id}'";
        $data = array(0);
        $result = $this->update($consulta,$data);
        return $result;
    } 
    
}