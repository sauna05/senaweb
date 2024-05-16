<?php
//hacer la conexion a la base de datos
class Conexion{
    public $url="mysql:host=localhost;dbname=prueba";
    public $usuario="root";
    public $contrasenia="";
    public $conexion;
    
    public function __construct()
    {
    try{
        $this->conexion = new PDO($this->url,$this->usuario,$this->contrasenia);
    }catch(PDOException $ex){
        echo $ex->getMessage();
    }   
    }
}


