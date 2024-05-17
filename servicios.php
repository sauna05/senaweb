<?php
require 'conexion.php';
//llenar el combobox
try {
    $conexion = new Conexion();
    $sql = "SELECT DISTINCT nombre FROM categoriasservicios";
    $stm = $conexion->conexion->prepare($sql);
    $stm->execute();
    $categorias = $stm->fetchAll(PDO::FETCH_COLUMN);
} catch (PDOException $Ex) {
    // Manejo de excepciones
}
$servicios_categoria = []; // Inicializar la variable antes del bloque try

if (isset($_GET['categoria'])) {
    try {
        $conexion = new Conexion();
        $categoria = $_GET['categoria'];
        if ($categoria != '') {
            $sql = "SELECT servicios.nombre AS servicio, categoriasservicios.nombre AS categoria
                    FROM categoriasservicios
                    INNER JOIN servicios ON categoriasservicios.id = servicios.idcategoriaservicio
                    WHERE categoriasservicios.nombre = :nombre";
            $stm = $conexion->conexion->prepare($sql);
            $stm->bindParam(':nombre', $categoria);
        } else {
            $sql = "SELECT DISTINCT nombre FROM servicios";
            $stm = $conexion->conexion->prepare($sql);
        }
        
        $stm->execute();
        $servicios_categoria = $stm->fetchAll(PDO::FETCH_COLUMN);
    } catch (PDOException $ex) {
        // Manejo de excepciones de PDO
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Servicios Disponibles</title>
    <style>
        body {
            background-color: #A6CEC4;
        }

        .menu {
            margin: 5px;
            background-color: #408FA8;
            width: 1900px;
            height: 120px;
        }

        .logo {
            width: 520px;
            height: 120px;
        }

        .registrate {
            background-color: white;
            width: 100px;
            border-radius: 8px;
            height: 30px;
            margin: 20px;
        }

        .iniciar {
            background-color: white;
            width: 100px;
            border-radius: 8px;
            height: 30px;
            margin: 60px;
            float: right;
        }

        .servicios {
            position: relative;
            justify-content: center;
            left: 8vw;
            width: 6vw;
            height: 8vw;
            bottom: 2vw;
            color: #ccc;
            font-size: 1.0vw;
        }

        .manzanas {
            position: relative;
            justify-content: center;
            left: 14vw;
            width: 6vw;
            height: 8vw;
            bottom: 2vw;
            color: #ccc;
            font-size: 1.0vw;
        }

        .mostrar {
            width: 1200px;
            border-radius: 4px;
            height: 900px;
            position: relative;
            justify-content: center;
            background-color: #45956A;
            left: 18vw;
        }

        form {
            margin: 20px;
        }

        h3 {
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

        table {
            width: 100%;
        }

        th, td {
            border: 1px solid white;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #408FA8;
            color: white;
        }

        td {
            background-color: #A6CEC4;
        }
    </style>
</head>
<body>
<div class="menu">
    <img class="logo" src="imagenes/logo_manzanas.png" alt="">
    <a class="servicios" href="principal.php"> Manzanas del cuidado </a>
    <a class="manzanas" href="servicios.php"> servicios gratuitos</a>
    <button class="iniciar">
        <a href="login.php">Iniciar sesión</a>
    </button>
</div>
<button class="registrate">
    <a href="registro_mujer.html"> Registrate </a>
</button>
</div>
<div class="mostrar">
    <form action="" method="post">
        <h3>buscar por categoria</h3>
        <select name="categoria" id="categoria" onchange="window.location.href='?categoria='+this.value">
            <option value="">Todas las categorías</option>
            <?php foreach ($categorias as $cat) { ?>
                <option value="<?php echo $cat; ?>" <?php echo ($categoria == $cat) ? 'selected' : ''; ?>><?php echo $cat; ?></option>
            <?php } ?>
        </select>

        <table>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                 
            <thead>
            <tr>
                <th>Nombre</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($servicios_categoria as $servicio) { ?>
                <tr>
                    <td><?php echo $servicio; ?></td>

                </tr>
            <?php } ?>
            </tbody>
        </table>
    </form>
</div>
</body>
</html>