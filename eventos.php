<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventer</title>
    <link rel="stylesheet" href="estilosEventos.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <div class="title-container">
        <p>EVENTER</p>
        <a href="index.php">INICIO</a>
        <a href="agregar.php">AGREGAR</a>
    </div>

    <p class="agregar">Eventos</p>

    <div class="table-container">
        <table>
            <tr class="cabecera">
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Lugar</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>

                <?php

                $conexion = mysqli_connect("localhost", "root", "","eventos");

                $sql = "SELECT * FROM evento";
                $query = $conexion->query($sql);

                $nombres = [];

                if ($query->num_rows > 0) {
                    while ($row = $query->fetch_assoc()) {
                        echo "<tr class='registros'> 
                        <td>".$row['nombre']."</td> 
                        <td>".$row['fecha']."</td> 
                        <td>".$row['hora']."</td> 
                        <td>".$row['lugar']."</td> 
                        <td>".$row['descripcion']."</td> 
                        <td> 
                        <a href='?editar=".$row['id']."'>Editar</a>
                        <a href='?eliminar=".$row['id']."'>Eliminar</a>
                        </td>
                        </tr>"; 
                    }
                }
                ?>

                <?php
                $conexion = mysqli_connect("localhost","root","","eventos");

                if (isset($_GET['eliminar'])) {
                    $nombre = $_GET['eliminar'];
                    $consultaBorrar = "DELETE FROM evento where id = '$nombre'";

                    if ($conexion->query($consultaBorrar)) {
                        header("Location: ".$_SERVER["PHP_SELF"]);
                        exit;
                    }
                }

                if (isset($_GET['editar'])) {
                    header("Location: editar.php");
                    session_start();

                    $_SESSION['ID'] = $_GET['editar'];
                }

                ?>
        </table>

    </div>
</body>
</html>