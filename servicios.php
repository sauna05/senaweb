<?php
require 'conexion.php';

try{
    $conexion = new Conexion();
    $sql="SELECT DISTINCT nombre FROM categoriasservicios";
    $stm=$conexion->conexion->prepare($sql);
    $stm->execute();
    $categorias=$stm->fetchAll(PDO::FETCH_COLUMN);
    
}catch(PDOException $Ex){
  
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>servicios disponibles</title>
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
        .mostrar{
            width: 1200px;
            border-radius: 4px;
            height: 900px;
            position: relative;
            justify-content: center;
            background-color: #45956A;
            left: 18vw;

        }
        form{
            margin: 20px;
        }
        h3{
            color: white;
            font-weight: bold;
        }
        select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
<div class="menu" >
        <img class="logo" src="imagenes/logo_manzanas.png" alt="">
        <a class="servicios" href="principal.php"> Manzanas del cuidado </a>
        <a class="manzanas" href="servicios.php"> servicios gratuitos</a>


        <button  class="iniciar">
            <a href="login.php">Iniciar sesión</a>
        </button>
        
    </div>
            <button class="registrate" >
            <a href="registro_mujer.html"> Registrate </a>
            </button>
    </div>
    <div class="mostrar">
    <form action="" method="post"> 
        <h3>buscar por categoria</h3>
        <select name="categoria"  onchange="window.location.href='?categoria='+this.value">
            <option value="">Todas las categorías</option>
            <?php foreach ($categorias as $cat) { ?>
                <option value="<?php echo $cat; ?>" <?php echo $categorias == $cat ? 'selected' : ''; ?>><?php echo $cat; ?></option>
            <?php } ?>
        </select>
    </form>

    </div>
    
    
</body>
</html>