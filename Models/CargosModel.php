<?php
class CargosModel extends Mysql
{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    // solucion problema de cargos no conectados
    public function selectCargos()
    {
        $sql = "SELECT
        cargo.nombre_cargo, 
        cargo.id_cargo, 
        cargo.`status`
        FROM
        cargo
             WHERE cargo.status !=0 ";
        $res = $this->select_all($sql);
        return $res;
    }

  
    public function insertarCargos(string $cargo) 
    {
        var_dump($idCargo);
        $return = "";
        $this->cargo = $cargo;
        
        $sql = "SELECT * FROM cargo WHERE nombre_cargo = '{$this->cargo}' ";
        $result = $this->select_all($sql);
      
        if (empty($result)) {
            $query = "INSERT INTO cargo(nombre_cargo) VALUES (?)";
            $data = array($this->cargo);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }
        
        return $return;
    }

    public function selectCargosInactivos()
    {
        $sql = "SELECT * FROM cargo WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarCargo(int $idCargo)
    {
        $this->idCargo = $idCargo;
        $consulta = "UPDATE cargo SET status = ? WHERE id_cargo ='{$this->idCargo}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function editarCargos(int $id)
    {
        $this->id = $id;
        $sql = "SELECT * FROM cargo WHERE id_cargo = '{$this->id}'";
        $res = $this->select($sql);
        if (empty($res)) {
            $res = 0;
        }
        return $res;
    }
   
    public function actualizarCargos(string $cargo,int $idCargo)
    { 
        $return = "";
        $this->idCargo = $idCargo;
        $this->cargo = $cargo;

        $query = "UPDATE cargo SET nombre_cargo=? WHERE id_cargo=?";
        $data = array($this->cargo, $this->idCargo);
        $resul = $this->update($query, $data);
        $return = $resul;
        return $return;
    }



    public function eliminarCargos(int $idCargo)
    {        
        $return = "";
        $this->id = $idCargo;
        $query = "UPDATE cargo SET status = ? WHERE id_cargo='{$this->id}'";
        $data = array(0);
        $resul = $this->update($query, $data);
        return $resul;
    } 

    
}