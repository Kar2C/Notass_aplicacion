<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Notas</title>
</head>

<body>
    <h1>Notas</h1>

    <?php
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    echo "El codigo del estudiante es: <b>" . $codigo . "</b> <br>";
    echo "El nombre del estudiante es: <b>" . $nombre . " " . $apellido . "</b>";
    ?>

    <form action="modificar.php" method="post">
        <p>
            <input type="submit" value="Modificar estudiante">
            <input type="submit" value="Agregar notas">
            <input type="submit" value="Eliminar">
        </p>
    </form>

</body>

</html>