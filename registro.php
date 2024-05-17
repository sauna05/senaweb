<?php
require 'conexion.php';

class Mujer {
    private $documento;
    private $nombre;
    private $apellido;
    private $telefono;
    private $ciudad;
    private $direccion;
    private $ocupacion;
    private $correo;
    private $contrasena;
    private $servicios;

    public function __construct($documento, $nombre, $apellido, $telefono, $ciudad, $direccion, $ocupacion, $correo, $contrasena, $servicios)
    {
        $this->documento = $documento;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->telefono = $telefono;
        $this->ciudad = $ciudad;
        $this->direccion = $direccion;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
        $this->ocupacion = $ocupacion;
        $this->servicios = $servicios;
    }

    public function registrar()
    {
        try {
            $conexion = new Conexion();
            $sql = "INSERT INTO mujerescuidadoras (documento, nombres, apellidos, telefono, correoelectronico, ciudad, direccion, ocupacion, serviciosinteres, contrasena) 
                    VALUES (:documento, :nombres, :apellidos, :telefono, :correoelectronico, :ciudad, :direccion, :ocupacion, :serviciosinteres, :contrasena)";
            $stm = $conexion->conexion->prepare($sql);
            $stm->bindParam(':documento', $this->documento);
            $stm->bindParam(':nombres', $this->nombre);
            $stm->bindParam(':apellidos', $this->apellido);
            $stm->bindParam(':telefono', $this->telefono);
            $stm->bindParam(':correoelectronico', $this->correo);
            $stm->bindParam(':ciudad', $this->ciudad);
            $stm->bindParam(':direccion', $this->direccion);
            $stm->bindParam(':ocupacion', $this->ocupacion);
            $stm->bindParam(':serviciosinteres', $this->servicios);
            $stm->bindParam(':contrasena', $this->contrasena);
            $stm->execute();
            return true;
        } catch(PDOException $ex) {
            // Manejo de excepciones
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $documento = $_POST['documento'];
    $nombre = $_POST['nombres'];
    $apellido = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $ciudad = $_POST['ciudad'];
    $direccion = $_POST['direccion'];
    $ocupacion = $_POST['ocupacion'];
    $servicios = $_POST['servicios'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
   
    // Crear objeto Mujer y registrar en la base de datos
    $mujer = new Mujer($documento, $nombre, $apellido, $telefono, $ciudad, $direccion, $ocupacion, $correo, $contrasena, $servicios);
    if($mujer->registrar()){
        header('location:login.php');
        exit;
    }
    else{
        echo"error";
    }
}
