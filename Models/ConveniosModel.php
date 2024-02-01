<?php
class ConveniosModel extends Mysql{
    

    public function __construct()
    {
        parent::__construct(); //cargar el contructor del mysql
    }
    
    public function selectConvenios()
    {
        $sql = "SELECT
                c.id_convenio,
                c.tipo_convenio_id_tipo_convenio, 
                c.codigo,
                c.empresa_id_empresa,
                c.fecha_inicio,
                c.fecha_final,
                c.archivo,
                c.status,
                c.fecha_creada,
                t.id_tipo_convenio,
                t.nombre_tipo,
                t.descripcion_tipo,
                t.status,

                e.id_empresa,
                e.nombre_empresa,
                e.area_empresa,
                e.nit,
                e.ciudad,
                e.direccion,
                e.telefono,
                e.persona_contacto,
                e.cargo,
                e.telefono_contacto,
                e.fecha

            FROM convenios c
            INNER JOIN tipo_convenio t         
            on c.tipo_convenio_id_tipo_convenio = t.id_tipo_convenio
            INNER JOIN empresa e
            on c.empresa_id_empresa = e.id_empresa
            WHERE c.status !=0
            ORDER BY fecha_creada DESC";     
        $data = $this->select_all($sql);
    
        return $data; 
    }


    public function selectConveniosEliminados()
    {
        $sql = "SELECT
            c.id_convenio,
            c.tipo_convenio_id_tipo_convenio, 
            c.codigo,
            c.empresa_id_empresa,

            c.fecha_inicio,
            c.fecha_final,
            c.archivo,
            c.status,

            t.id_tipo_convenio,
            t.nombre_tipo,
            t.descripcion_tipo,
            t.status,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.ciudad,
            e.direccion,
            e.telefono,
            e.persona_contacto,
            e.cargo,
            e.telefono_contacto,
            e.fecha,
            e.status

         FROM convenios c
         INNER JOIN tipo_convenio t
        on c.tipo_convenio_id_tipo_convenio = t.id_tipo_convenio
        INNER JOIN empresa e
        on c.empresa_id_empresa = e.id_empresa
        WHERE c.status !=1";
       
        $data = $this->select_all($sql);
    
        return $data; 
    }

   // public function insertarConvenios(int $idConvenio, string $codigo, string $empresa, string $tipoConvenio,string $fechaInicio, string $fechaFinal)
    public function insertarConvenios(string $codigo, string $empresa, string $tipoConvenio,string $fechaInicio, string $fechaFinal,string $ruta) 
    {
        $return = "";
        $this->codigo = $codigo;
        $this->empresa = $empresa;
        $this->tipoConvenio = $tipoConvenio;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;
        $this->convenio_pdf = $ruta;

        $sql = "SELECT * FROM convenios WHERE codigo = '{$this->codigo}' ";
        $result = $this->select_all($sql);
      
        if (empty($result)) {
            $query = "INSERT INTO convenios(codigo, empresa_id_empresa, tipo_convenio_id_tipo_convenio, fecha_inicio, fecha_final,archivo, fecha_creada) VALUES (?,?,?,?,?,?,now())";
            $data = array($this->codigo, $this->empresa, $this->tipoConvenio, $this->fechaInicio, $this->fechaFinal, $this->convenio_pdf);
            $resul = $this->insert($query, $data);
            $return = $resul;
        }else {
            $return =false;
        }
        return $return;
    }

    public function selectConvenio(int $idConvenio)
    {   
        $this->idConvenio = intval($idConvenio);
        // $query = "SELECT * FROM usuarios WHERE idConvenio = $this->idConvenio";
        $query = "SELECT
            c.id_convenio,
            c.tipo_convenio_id_tipo_convenio, 
            c.codigo,
            c.empresa_id_empresa,

            c.fecha_inicio,
            c.fecha_final,
            c.archivo,
            c.status,

            t.id_tipo_convenio,
            t.nombre_tipo,
            t.descripcion_tipo,
            t.status,

            e.id_empresa,
            e.nombre_empresa,
            e.area_empresa,
            e.nit,
            e.ciudad,
            e.direccion,
            e.telefono,
            e.persona_contacto,
            e.cargo,
            e.telefono_contacto,
            e.fecha,
            e.status
            
         FROM convenios c
         INNER JOIN tipo_convenio t
        on c.tipo_convenio_id_tipo_convenio = t.id_tipo_convenio
        INNER JOIN empresa e
        on c.empresa_id_empresa = e.id_empresa
        WHERE c.id_convenio = $this->idConvenio";
        $result = $this->select($query);
        if(empty($result))
        {
            $result =0;
        }       
        return $result;
    }

    public function selectidconvenio(int $idconvenio)
    {
        $this->id = $idconvenio;
        $sql = "SELECT
        *
        FROM
        convenios where id_convenio = '{$this->id}' "; 
        
        $res = $this->select($sql);
        return $res;
    }
   
    public function actualizarConvenios(string $codigo, string $empresa, string $tipoConvenio, string $fechaInicio, string $fechaFinal,string $archivo, int $idConvenio)
    { 
        $return = "";
        $this->idConvenio = $idConvenio;
        $this->codigo = $codigo;
        $this->empresa = $empresa;
        $this->tipoConvenio = $tipoConvenio;
        //$this->status = $status;
        $this->fechaInicio = $fechaInicio;
        $this->fechaFinal = $fechaFinal;
        $this->convenio_pdf = $archivo;
        
        $verificar ="SELECT * FROM convenios WHERE codigo = '{$this->codigo}' and  id_convenio != '{$this->idConvenio}'";
        $result = $this->select_all($verificar);

        if(empty($result))
        { 
            //$query = "UPDATE convenios SET codigo=?, empresa=?, tipoConvenio=?, status=?, fechaInicio=?,fechaFinal=? WHERE idConvenio=?";
            $query = "UPDATE convenios SET codigo=?, empresa_id_empresa=?, tipo_convenio_id_tipo_convenio=?, fecha_inicio=?,fecha_final=?, fecha_actualizada=now(), archivo=? WHERE id_convenio='{$this->idConvenio}'";
            $data = array($this->codigo, $this->empresa, $this->tipoConvenio, $this->fechaInicio, $this->fechaFinal,$this->convenio_pdf);
            $resul = $this->update($query, $data);
            $return = $resul;
        }else
        {
            $return = "existe";
        }      
        return $return;
    }

    public function eliminarConvenios(int $idConvenio)
    {
        $this->idConvenio = $idConvenio;
        $query = " UPDATE convenios SET status =? WHERE id_convenio = $this->idConvenio ";
        $data = array(0);
        $result = $this->update($query,$data);
        return $result;
    }

    public function reingresar(int $idConvenio)
    {
        $this->idConvenio = $idConvenio;
        $query = " UPDATE convenios SET status =?,fecha_actualizada = now() WHERE id_convenio = $this->idConvenio ";
        $data = array(1);
        $result = $this->update($query,$data);
        return $result;
    }
    public function ObtenerCodigoConvenio(){
        // 1. generar el CODIGO de manera automatica = SOL20220001
       $sql = "SELECT
                    count(id_convenio) as cantidad_conv
                FROM convenios
                WHERE YEAR(fecha_creada) = DATE_FORMAT(now(), '%Y' )";
       $data = $this->select($sql);
       $cantidad_conv= $data["cantidad_conv"] + 1;
       return "CONV".date("Y").str_pad($cantidad_conv, 4, "0", STR_PAD_LEFT);
   }
    
    
}