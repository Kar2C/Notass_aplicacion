<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Modificar</title>
</head>

<body>
    <h1>Modificar notas</h1>

    <?php
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    echo "El codigo del estudiante es: <b>" . $codigo . "</b> <br>";
    echo "El nombre del estudiante es: <b>" . $nombre . " " . $apellido . "</b>";
    ?>

    <form>
        <p> Actividad: <input type="text" name="actividad">
            Nota: <input type="number" name="nota">
            <input type="submit" value="Guardar">
        </p>
    </form>

    <form action="modificarNota.php" method="post"></form>
    <input type="submit" value="Modificar">
</body>

</html>