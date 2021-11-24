<?php
class Conexion{

    private $servidor = 'localhost';
    private $baseDatos = 'GlobalService2021';
    private $user = 'gbuser';
    private $pass = 'asd123';

    protected $conexion;
    protected $secure;


    function __construct()
    {

        $this->conexion = new mysqli($this->servidor,$this->user,$this->pass,$this->baseDatos);
        if($this->conexion->connect_error){
            die("Error al conectar a MySQL: ".$this->conexion->connect_errno." ".$this->conexion->connect_error);
        }
    }
    protected function prepare($consulta){
        if(!($consulta = $this->conexion->prepare($consulta))){
            die("Fallo la conexión");
        }
        return $consulta;
    }
    protected function execute($sentencia){
        if(!$sentencia->execute()){
            die("Fallo la ejecución de la consulta");
        }
        return $sentencia;
    }
}
$conexion = new Conexion;