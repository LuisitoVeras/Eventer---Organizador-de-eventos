<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilosAgregar.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:ital,opsz,wght@0,6..12,200..1000;1,6..12,200..1000&family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
    <title>Eventer</title>
</head>
<body>
    <div class="title-container">
        <p>EVENTER</p>
        <a href="eventos.php">EVENTOS</a>
        <a href="index.php">INICIO</a>
    </div>

    <p class="agregar">Agregar eventos</p>
    
    <div class="form-container">
        <form id="eventoForm" method="post">
            <input type="text" name="nombre" placeholder="Nombre del evento" required><br><br>
            <input type="date" name="fecha" required><br><br>
            <input type="time" name="hora" placeholder="Hora" required><br><br>
            <input type="text" name="lugar" placeholder="Lugar" required><br><br>
            <input type="text" name="descripcion" placeholder="Descripción" required></input><br><br>
            <input type="submit" value="Agregar" name="enviarAgr"></input>
        </form>
    
        <?php

        $conexion = mysqli_connect("localhost","root","","eventos");

        if (isset($_POST['enviarAgr'])) {

            $nombre = $conexion -> real_escape_string($_POST['nombre']);
            $fecha = $conexion -> real_escape_string($_POST['fecha']);
            $hora = $conexion -> real_escape_string($_POST['hora']);
            $lugar = $conexion -> real_escape_string($_POST['lugar']);
            $descripcion = $conexion -> real_escape_string($_POST['descripcion']);

            $consultaAgregar = "INSERT INTO `evento`(`nombre`, `fecha`, `hora`, `lugar`, `descripcion`) VALUES ('".$nombre."','".$fecha."','".$hora."','".$lugar."','".$descripcion."');";

            if ($conexion->query($consultaAgregar)) {

            }

            else {
                echo "<p>No se ha podido completar la accion.</p>";
            }
        }

        ?>
</body>
</html>