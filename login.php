<?php
require 'conexion.php';
class Ini_sesion{
    public static function iniciar($correo_electronico,$contrasena){
        try{
            $conexion = new Conexion();
            $sql_consulta="select id from mujerescuidadoras where correoelectronico=:correoelectronico
            and contrasena=:contrasena";
            $stm= $conexion->conexion->prepare($sql_consulta);
            $stm->bindParam(':correoelectronico',$correo_electronico);
            $stm->bindParam(':contrasena',$contrasena);
            $stm->execute();
            if($usuario =$stm->fetch(PDO::FETCH_ASSOC)){
              $_SESSION['idmujercuidadora']=$usuario['id'];
              return true;
            }
        }catch(PDOException  $err)
        {
            echo $err->getMessage();
            return false;
        }   
    }
}
//traer datos del formulario verificar que se hayan enviado la imformacion mediante
//el metodo post
if($_SERVER['REQUEST_METHOD']=='POST'){
    $correo=$_POST['correo'];
    $contrasenia=$_POST['contrasena'];
    if(Ini_sesion::iniciar($correo,$contrasenia)){
        header('location:elegir.php');
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles_login.css">
    <style>
        body{
            background-color: #A6CEC4;
          
        }
        .menu{
            margin: 5px;
            background-color: #408FA8;
            width: 1900px;
            height: 120px;
        }
        .logo{
            width: 520px;
            height: 120px;
        }
        .servicios{
           position: relative;
           justify-content: center;
           left: 8vw;
           width: 6vw;
           height: 8vw;
           bottom: 2vw;
           color: #ccc;
           font-size: 1.0vw;
        }
        .manzanas{
            position: relative;
            justify-content: center;
            left: 14vw;
            width: 6vw;
            height: 8vw;
            bottom: 2vw;
            color: #ccc;
            font-size: 1.0vw;
        }
        .login{
            margin: 30px;
            position: relative;
            border-radius: 4px;
            justify-content: center;
            width: 500px;
            border: 4px solid gray;
            left: 30vw;
            height: 500px;
            background-color: #45956A;
        }
        h3{
            color: #2A4383;
            margin: 6px;
        }
        form{
            position: relative;
            justify-content:center ;
            left: 110px;
        }
        input{
            width: 250px;
            height: 30px;
            border-radius: 4px;
        }
        label{
            color: white;
            font-weight: bold;
            font-size: 16px;
        }
        a{
            position: relative;
            justify-content: center;
            left: 45px;
            color: blue;
        }

    </style>
</head>
<body >
<div class="menu" >
        <img class="logo" src="imagenes/logo_manzanas.png" alt="">
        <a class="servicios" href="principal.php"> Manzanas del cuidado </a>
        <a class="manzanas" href="servicios.php"> servicios gratuitos</a>
   
    
   <div class="login">
   <h3> Inicia sesion con tu nombre de usuario y contraseña</h3>
    <form  method="post" >
        
        <label for="">Correo</label>
        <br>
        <input name="correo" type="email" placeholder="su correo" require>
        <br>
        <label for="">Contraseña</label>
        <br>
        <input name="contrasena" type="password" placeholder="su contraseña" require>
        <br>
        <br>
        <br>
        <input type="submit" value="Iniciar sesion">
        <br>
        <br>
        <a href="">olvide mi contraseña</a>
    </form>
    
   </div> 
</body>
</html>


