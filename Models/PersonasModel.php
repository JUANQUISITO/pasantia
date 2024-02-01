<?php
    class PersonasModel extends Mysql
    {
        public $id_persona; 
        public $nombres;
        public $apellido_paterno;
        public $apellido_materno;
        public $e_mail;
        public $carnet;
        public $telefono;
        public $direccion;
        public $fecha_creada;
        public $status;
        
        public function __construct()
        {
            // echo "conectado";
            parent::__construct();
        }

        public function selectPersona(int $idPersona)
        {
            $this->id = $idPersona;
            $sql = "SELECT
            persona.usuario_id_persona, 
            persona.nombres, 
            persona.apellido_paterno, 
            persona.apellido_materno, 
            persona.e_mail, 
            persona.carnet, 
            persona.telefono, 
            persona.direccion,
            persona.status, 
            usuario.nombre_usuario, 
            usuario.clave
        FROM
            persona
            RIGHT JOIN
            usuario
            ON 
                persona.usuario_id_persona = usuario.id_persona
                where usuario.id_persona = {$this->id};
            ";  
            $data = $this->select($sql);
            return $data; 
        }

        public function selectPersonas()
        {
            $sql = "SELECT * FROM persona WHERE status !=0 ";
            $res = $this->select_all($sql);
            return $res;
        }
      
        //public function updateP(int $inputIdPersona,string $nombre,string $apellidoPaterno,string $apellidoMaterno,string $email,int $carnet,int $telefono,string $direccion)
        public function updateP(int $inputIdPersona,string $nombre,string $apellidoPaterno,string $apellidoMaterno,string $email,string $carnet, int $telefono,string $direccion)
        {
            $return = "";
            $this->id_persona = $inputIdPersona;
             $this->nombres = $nombre;
             $this->apellido_paterno = $apellidoPaterno;
             $this->apellido_materno = $apellidoMaterno;
             $this->e_mail = $email;
             $this->carnet = $carnet;
             $this->telefono = $telefono;
             $this->direccion = $direccion;

             $verificar = "SELECT * FROM persona WHERE carnet = '{$this->carnet}' ";
            $result = $this->select_all($verificar);
            var_dump($result);
            if($result)
            {
                $consulta = "UPDATE persona SET nombres = ?, apellido_paterno = ?,apellido_materno=?, e_mail=?, telefono=?, direccion=? WHERE usuario_id_persona  ='{$this->id_persona}'  ";
                $data = array($this->nombres,$this->apellido_paterno,  $this->apellido_materno, $this->e_mail, $this->telefono, $this->direccion);
                $result = $this->update($consulta,$data);
                $return = $result;
            }
            
            
            return $return;
        }

       

    }

?>