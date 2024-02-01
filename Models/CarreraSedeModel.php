<?php
class CarreraSedeModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
/*
    public function selectConvenios()
    {
        $sql = "SELECT * FROM carrera_sede WHERE status = 1";
        $res = $this->select_all($sql);
        return $res;
    }
*/
    public function selectCarreraSedes()
    {
        $sql = "SELECT
            cs.id_carrera_sede,
            cs.carrera_id_carrera, 
            cs.sedes_id_sedes,
            cs.status,

            s.id_sedes,
            s.sede,
            s.descripcion,
            s.direccion,
            s.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status

         FROM carrera_sede cs
         INNER JOIN sedes s
        on cs.sedes_id_sedes = s.id_sedes
        INNER JOIN carrera ca
        on cs.carrera_id_carrera = ca.id_carrera
        WHERE cs.status !=0";
       
        $data = $this->select_all($sql);
    
        return $data; 
    }

    //select para usuarios
    public function selectCarreraSedesUsuarios()
    {
        $sql = 
        "SELECT
            CONCAT( carrera.carrera, ' - ', sedes.sede ) AS carrera_sede, 
            carrera_sede.id_carrera_sede, 
            carrera_sede.carrera_id_carrera, 
            carrera_sede.sedes_id_sedes, 
            sedes.sede, 
            carrera.carrera, 
            carrera_sede.`status`
        FROM
            carrera_sede
            INNER JOIN
            carrera
            ON 
                carrera_sede.carrera_id_carrera = carrera.id_carrera
            INNER JOIN
            sedes
            ON 
                carrera_sede.sedes_id_sedes = sedes.id_sedes
        WHERE
            carrera_sede.status <> 0
        ORDER BY 'DESC' DESC";
       
        $data = $this->select_all($sql);
    
        return $data; 
    }
    
    public function selectCarreraSedesEliminados()
    {
        $sql = "SELECT
            cs.id_carrera_sede,
            cs.carrera_id_carrera, 
            cs.sedes_id_sedes,
            cs.status,

            s.id_sedes,
            s.sede,
            s.descripcion,
            s.direccion,
            s.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status

         FROM carrera_sede cs
         INNER JOIN sedes s
        on cs.sedes_id_sedes = s.id_sedes
        INNER JOIN carrera ca
        on cs.carrera_id_carrera = ca.id_carrera
        WHERE cs.status !=1";
       
        $data = $this->select_all($sql); 
        return $data; 
    }

    public function insertarCarreraSedes( string $nombreCarrera, string $nombreSede) 
    {
        //var_dump($);
        $return = "";
  
        $this->nombreCarrera = $nombreCarrera;
        $this->nombreSede = $nombreSede;
        $sql = "SELECT * FROM carrera_sede WHERE carrera_id_carrera = '{$this->nombreCarrera}' and sedes_id_sedes = '{$this->nombreSede}' ";
        $result = $this->select_all($sql);
      
        if (empty($result)) {
            $query = "INSERT INTO carrera_sede(carrera_id_carrera, sedes_id_sedes) VALUES (?,?)";
            $data = array( $this->nombreCarrera, $this->nombreSede);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }       
        return $return;
    }
 
    public function selectCarreraSede(int $idCarreraSede)
    {          
        $this->idCarreraSede = intval($idCarreraSede);
        // $query = "SELECT * FROM usuarios WHERE  = $this->";
        $query = "SELECT
            cs.id_carrera_sede,
            cs.carrera_id_carrera, 
            cs.sedes_id_sedes,
            cs.status,

            s.id_sedes,
            s.sede,
            s.descripcion,
            s.direccion,
            s.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status

         FROM carrera_sede cs
         INNER JOIN sedes s
        on cs.sedes_id_sedes = s.id_sedes
        INNER JOIN carrera ca
        on cs.carrera_id_carrera = ca.id_carrera
        WHERE cs.id_carrera_sede = $this->idCarreraSede";
        $result = $this->select($query);
        if(empty($result))
        {
            $result =0;
        }    
        return $result;
    }
   
    public function actualizarCarreraSedes( string $nombreCarrera, string $nombreSede, int $idCarreraSede)
    { 
	//nombre de carrera se puede repetir
	//nombre de sede no se puede repetir 
	//el id tampoco se puede repetir 
        $return = "";
        $this-> idCarreraSede = $idCarreraSede;
        $this->nombreCarrera = $nombreCarrera;
        $this->nombreSede = $nombreSede;
          
		$query = "UPDATE carrera_sede SET  carrera_id_carrera=?, sedes_id_sedes=? WHERE id_carrera_sede={$this->idCarreraSede}";
		$data = array( $this->nombreCarrera, $this->nombreSede);
		$resul = $this->update($query, $data);
		$return = $resul;
        return $return;
    }

    public function eliminarCarreraSedes(int $idCarreraSede)
    {
        $this->idCarreraSede = $idCarreraSede;
        $query = " UPDATE carrera_sede SET status =? WHERE id_carrera_sede = $this->idCarreraSede ";
        $data = array(0);
        $result = $this->update($query,$data);
        return $result;
    }

    public function reingresar(int $idCarreraSede)
    {
        $this->idCarreraSede = $idCarreraSede;
        $query = " UPDATE carrera_sede SET status =? WHERE id_carrera_sede = $this->idCarreraSede ";
        $data = array(1);
        $result = $this->update($query,$data);
        return $result;
    }
    
}