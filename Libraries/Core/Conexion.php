<?php
class Conexion{
    private $conect;
    public function __construct()
    {
        //$db = new pdo('mysql:dbname=test;host=localhost:3307','user','pass');
      $conexion = "mysql:host=".HOST.";dbname=".BD.";.CHARSET.";  
      try {
          $this->conect = new PDO($conexion, DB_USER, PASS);
          $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch (PDOException $e) {
          $this->conect = "Error en la conexion";
          echo "Error: " . $e->getMessage();
      }
    }
    public function conect()
    {
        return $this->conect;
    }
}

?>