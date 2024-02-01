<?php
class MateriasModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
      
    public function selectMaterias()
    {
        $sql = "SELECT * FROM materias WHERE status != 0";
        $res = $this->select_all($sql);
        return $res;
    }

    public function selectMateria($idMateria)
    {
        $return = "";
        $this->idMateria = $idMateria;
        $sql = "SELECT * FROM materias WHERE id_materia = $this->idMateria";
        $res = $this->select($sql);
        if (empty($res)) {
           return false;
        }
        return $res;
    }

    public function selectMateriaInactivos()
    {
        $sql = "SELECT * FROM materias WHERE status != 1";
        $data = $this->select_all($sql);
        return $data; 
    }

    public function reingresarMateria(int $idMateria)
    {
        $this->idMateria = $idMateria;
        $consulta = "UPDATE materias SET status = ? WHERE id_materia ='{$this->idMateria}'";
         $data = array(1);
        $result = $this->update($consulta,$data);
        return $result;
    }

    public function insertarMaterias(string $materia, string $siglaMateria, string $semestre) 
    {
        $return = "";
        
        $this->materia = $materia;
        $this->siglaMateria = $siglaMateria;
        $this->semestre = $semestre;
        
        $sql = "SELECT * FROM materias WHERE nombre_materia = '{$this->materia}' ";//2 tipos iguales
        $result = $this->select_all($sql);
      
        if (empty($result)) 
        {
            $query = "INSERT INTO materias(nombre_materia,sigla_materia, semestre) VALUES (?,?,?)";
            $data = array($this->materia, $this->semestre, $this->semestre);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }
        else 
        {
            $return = "existe";
        }   
        return $return;
    }
    
    public function actualizarMaterias( int $idMateria,string $materia, string $siglaMateria, string $semestre)
    { 
        $return = "";
        $this->idMateria = $idMateria;
        $this->materia = $materia;
        $this->siglaMateria = $siglaMateria;
        $this->semestre = $semestre;
        $verificar = "SELECT * FROM materias WHERE nombre_materia = '{$this->materia}' and id_materia !='{$this->idMateria}'";
        $result = $this->select_all($verificar);
        if(empty($result))
        {
        $query = "UPDATE materias SET nombre_materia=?, sigla_materia=?, semestre=? WHERE id_materia=?";
        $data = array( $this->materia,$this->siglaMateria, $this->semestre, $this->idMateria);
        $resul = $this->update($query, $data);
        $return = $resul;
        }
        else
        {
            $return ="existe";
        }
        return $return;
    }

    public function eliminarMaterias(int $idMateria)
    {        
        $return = "";
        $this->id = $idMateria;
        $consulta = "UPDATE materias SET status = ? WHERE id_materia='{$this->id}'";
        $data = array(0);
        $result = $this->update($consulta,$data);
        return $result;
    } 
    
}