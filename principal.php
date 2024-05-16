<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manzana cuidadora</title>
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
        .registrate{
            background-color: white;
            width:  100px;
            border-radius:  8px;
            height: 30px;
            margin: 20px;

         
        }
        .iniciar{
            background-color: white;
            width:  100px;
            border-radius: 8px;
            height: 30px;
            margin: 60px;
            float: right;
        }
        h3{
            color: #2A4383;
            text-align: center;
            font-size: 40px;
            font-weight: bold;
        }
        .imagen{
            position:relative;
            justify-content: center;
            width: 22vw;
            height: 10vw;
            left: 20vw;
            top: 2vw;
        }
        .imagenes2{
            position: relative;
            justify-content: center;
            width: 22vw;
            height: 10vw;
            left: 31vw;
           bottom: 9vw;
        }
        .imagenes3{
            position: relative;
            justify-content: center;
            width: 22vw;
            height: 10vw;
            left: 31vw;
            bottom: 3vw;

        }
        .imagenes4{
            position: relative;
            justify-content: center;
            width: 22vw;
            height: 10vw;
            left: 4vw;
            bottom: 3vw;
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



    </style>
</head>
<body >
    <div class="menu" >
        <img class="logo" src="imagenes/logo_manzanas.png" alt="">
        <a class="servicios" href="servicios.php"> Manzanas del cuidado </a>
        <a class="manzanas" href="servicios.php"> servicios gratuitos</a>


        <button  class="iniciar">
            <a href="login.php">Iniciar sesión</a>
        </button>
        
    </div>

    <button class="registrate" >
    <a href="registro_mujer.html"> Registrate </a>
    </button>

    <h3> Encuentra la manzana mas cercana atu ubicación </h3>
    <div class="imagenes">
        <img class="imagen" src="imagenes/logo_manzanas.png" alt="">

    </div>
    <div class="imagenes2">
        <img class="imagen" src="imagenes/logo_manzanas.png" alt="">

    </div>
    <div class="imagenes3">
        <img class="imagen" src="imagenes/logo_manzanas.png" alt="">

    </div>
    
     

</body>
</html>