<?php
class CarrerasModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    public function selectCarreras()
    {
        $sql = "SELECT
        carrera.id_carrera, 
        carrera.carrera, 
        carrera.descripcion, 
        carrera.`status`
        FROM
        carrera 
        WHERE carrera.status != 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectCarrera($idCarrera)
    {
        $return = "";
        $this->idCarrera = $idCarrera;
        $sql = "SELECT * FROM carrera WHERE id_carrera = $this->idCarrera";
        $res = $this->select($sql);
        if (empty($res)) {
           return false;
        }
        return $res;
        
    }

    public function selectCarreraInactivos()
    {
        $sql = "SELECT * FROM carrera WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarCarrera(int $idCarrera)
    {
        $this->idCarrera = $idCarrera;
        $consulta = "UPDATE carrera SET status = ? WHERE id_carrera ='{$this->idCarrera}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function insertarCarreras(string $carrera, string $descripcion) 
    {
        //var_dump($id_carrera);
        $return = "";
        
        $this->carrera = $carrera;
        $this->descripcion = $descripcion;
        //$this->status = $status;
        
        $sql = "SELECT * FROM carrera WHERE carrera = '{$this->carrera}' ";//2 tipos iguales
        $result = $this->select_all($sql);
      
        if (empty($result)) 
        {
            $query = "INSERT INTO carrera(carrera, descripcion) VALUES (?,?)";
            $data = array($this->carrera, $this->descripcion);
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
        $sql = "SELECT * FROM carrera WHERE id_carrera = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
 */
    
    public function actualizarCarreras( int $idCarrera,string $carrera, string $descripcion)
    { 
        $return = "";
        $this->idCarrera = $idCarrera;
        $this->carrera = $carrera;
        $this->descripcion = $descripcion;
        $verificar = "SELECT * FROM carrera WHERE carrera = '{$this->carrera}' and id_carrera !='{$this->idCarrera}'";
        $result = $this->select_all($verificar);
        if(empty($result))
        {
        $query = "UPDATE carrera SET carrera=?, descripcion=? WHERE id_carrera=?";
        $data = array( $this->carrera, $this->descripcion, $this->idCarrera);
        $resul = $this->update($query, $data);
        $return = $resul;
        }
        else
        {
            $return ="existe";
        }
        return $return;
    }

    public function eliminarCarreras(int $idCarrera)
    {        
        $return = "";
        $this->id = $idCarrera;
        $consulta = "UPDATE carrera SET status = ? WHERE id_carrera='{$this->id}'";
        $data = array(0);
        $result = $this->update($consulta,$data);
        return $result;
    }   
}