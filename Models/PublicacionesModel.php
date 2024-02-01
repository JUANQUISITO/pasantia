<?php
class PublicacionesModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    public function selectPublicaciones()
    {
        $sql = "SELECT
            p.id_convocatoria,
            p.titulo, 
            /*p.area,*/
            p.cantidad_pasantes,
            p.remuneracion,
            p.beneficios,
            p.tiempo_pasantia,
            p.descripcion_puesto,
            p.fecha_publicacion,
            p.fecha_limite_postulacion,
            p.persona_referencia,
            p.telefono_referencia,
            p.status,
            p.empresa_id_empresa,
            p.carrera_id_carrera,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.telefono_contacto,
            e.persona_contacto,
            e.fecha,
            e.telefono,         
            e.direccion,
            e.ciudad,         
            e.cargo,  
            e.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status

         FROM publicacion p
         INNER JOIN empresa e
        on p.empresa_id_empresa = e.id_empresa
        INNER JOIN carrera ca         
        on p.carrera_id_carrera = ca.id_carrera

        WHERE p.status !=0";     
        $data = $this->select_all($sql);
    
        return $data; 
    }

    
    public function selectPublicacionesEliminados()
    {
        $sql = "SELECT
            p.id_convocatoria,
            p.titulo, 
            /*p.area,*/
            p.cantidad_pasantes,
            p.remuneracion,
            p.beneficios,
            p.tiempo_pasantia,
            p.descripcion_puesto,
            p.fecha_publicacion,
            p.fecha_limite_postulacion,
            p.persona_referencia,
            p.telefono_referencia,
            p.status,
            p.empresa_id_empresa,
            p.carrera_id_carrera,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.telefono_contacto,
            e.persona_contacto,
            e.fecha,
            e.telefono,         
            e.direccion,
            e.ciudad,         
            e.cargo,  
            e.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status

         FROM publicacion p
         INNER JOIN empresa e
        on p.empresa_id_empresa = e.id_empresa
        INNER JOIN carrera ca         
        on p.carrera_id_carrera = ca.id_carrera

        WHERE p.status !=1";
       
        $data = $this->select_all($sql);
    
        return $data; 
    }

    public function selectPublicacion(int $idPublicacion)
    {   
        $this->idPublicacion = intval($idPublicacion);
        // $query = "SELECT * FROM usuarios WHERE idPublicacion = $this->idPublicacion";
        $query = "SELECT
            p.id_convocatoria,
            p.titulo, 
            p.area,
            p.cantidad_pasantes,
            p.remuneracion,
            p.beneficios,
            p.tiempo_pasantia,
            p.descripcion_puesto,
            p.fecha_publicacion,
            p.fecha_limite_postulacion,
            p.persona_referencia,
            p.telefono_referencia,
            p.status,
            p.empresa_id_empresa,
            p.carrera_id_carrera,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.telefono_contacto,
            e.persona_contacto,
            e.fecha,
            e.telefono,         
            e.direccion,
            e.ciudad,         
            e.cargo,  
            e.status,

            ca.id_carrera,
            ca.carrera,
            ca.descripcion,
            ca.status
            
            FROM publicacion p
         INNER JOIN empresa e
        on p.empresa_id_empresa = e.id_empresa
        INNER JOIN carrera ca         
        on p.carrera_id_carrera = ca.id_carrera
        WHERE p.id_convocatoria = $this->idPublicacion";
        $result = $this->select($query);
        if(empty($result))
        {
            $result =0;
        }       
        return $result;
    }
    
    public function insertarPublicaciones(string $titulo,string $institucion,int $cantPasantes,int $remuneracion,string $beneficios,string $tiempoPasantia,string $descripcion, string $area,string $fechaLimite,string $fechaPublicacion, string $contacto, string $telContacto) 
    {
        // var_dump($_POST);
        // die();
        $return = "";
       
        $this-> titulo  =  $titulo; 
        $this-> institucion  =  $institucion; 
        $this-> area   =  $area; 
        $this-> cantPasantes  =  $cantPasantes; 
        $this-> remuneracion  =  $remuneracion; 
        $this-> beneficios  =  $beneficios; 
        $this-> tiempoPasantia  =  $tiempoPasantia; 
        $this-> descripcion  =  $descripcion;
        $this-> contacto   =  $contacto; 
        $this-> telContacto   =  $telContacto; 
        $this-> fechaLimite   =  $fechaLimite; 
        $this-> fechaPublicacion  =  $fechaPublicacion; 
        
        $sql = "SELECT * FROM publicacion WHERE titulo = '{$this->titulo}' ";
        $result = $this->select_all($sql);
      
        if (empty($result)) {
            $query = "INSERT INTO publicacion( titulo,empresa_id_empresa, cantidad_pasantes, remuneracion, beneficios, tiempo_pasantia, descripcion_puesto, carrera_id_carrera, fecha_limite_postulacion, fecha_publicacion, persona_referencia, telefono_referencia) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)";
            $data = array($this->titulo,$this-> institucion, $this-> cantPasantes, $this->remuneracion,$this-> beneficios, $this->tiempoPasantia,$this->descripcion,$this-> area,$this-> fechaLimite,$this-> fechaPublicacion,$this-> contacto,$this-> telContacto );
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return = "existe";
        }     
        return $return;
    }
  
    public function actualizarPublicaciones(string $titulo,string $institucion,int $cantPasantes,int  $remuneracion,string $beneficios,string $tiempoPasantia,string $descripcion, string $area,string $fechaLimite,string $fechaPublicacion, string $contacto, string $telContacto, int $idPublicacion)
    { 
        $return = "";
        $this->idPublicacion = $idPublicacion;
        $this-> titulo  =  $titulo; 
        $this-> institucion  =  $institucion;  
        $this-> cantPasantes  =  $cantPasantes; 
        $this-> remuneracion  =  $remuneracion; 
        $this-> beneficios  =  $beneficios; 
        $this-> tiempoPasantia  =  $tiempoPasantia; 
        $this-> descripcion  =  $descripcion;
        $this-> area   =  $area;
        $this-> fechaLimite   =  $fechaLimite; 
        $this-> fechaPublicacion  =  $fechaPublicacion; 
        $this-> contacto   =  $contacto; 
        $this-> telContacto   =  $telContacto; 
        
        //$verificar ="SELECT * FROM publicacion WHERE  id_convocatoria != '{$this->idPublicacion}'";
        //$result = $this->select_all($verificar);

        //if(empty($result))
        //{            
            $query = "UPDATE publicacion SET titulo=?, empresa_id_empresa=?,cantidad_pasantes=?,remuneracion=?,beneficios=?,tiempo_pasantia=?,descripcion_puesto=?, carrera_id_carrera=?,fecha_limite_postulacion=?,fecha_publicacion=?, persona_referencia=?,telefono_referencia=? WHERE id_convocatoria='{$this->idPublicacion}'";
            $data = array($this->titulo,$this-> institucion, $this-> cantPasantes, $this->remuneracion,$this-> beneficios, $this->tiempoPasantia,$this->descripcion,$this-> area,$this-> fechaLimite,$this-> fechaPublicacion,$this-> contacto,$this-> telContacto);
            $resul = $this->update($query, $data);
            $return = $resul;
        //}else
       // {
           // $return = "existe";
        //}      
        return $return;
    }

    public function eliminarPublicaciones(int $idPublicacion)
    {
        $this->idPublicacion = $idPublicacion;
        $query = " UPDATE publicacion SET status =? WHERE id_convocatoria = $this->idPublicacion ";
        $data = array(0);
        $result = $this->update($query,$data);
        return $result;
    }

    public function reingresar(int $idPublicacion)
    {
        $this->idPublicacion = $idPublicacion;
        $query = " UPDATE publicacion SET status =? WHERE id_convocatoria = $this->idPublicacion ";
        $data = array(1);
        $result = $this->update($query,$data);
        return $result;
    }
    
}