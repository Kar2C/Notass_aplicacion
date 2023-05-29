<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$codigo = $_GET['codigo'];
$actividades = $actividadController->read($codigo);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Actividad</title>
</head>

<body>
    <main>
        <h1>Lista de actividades</h1>
        <a href="views/form_actividad.php?codigo=<?php echo $codigo; ?>">Registrar notas</a>
        <br><br>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $contador = 0;
                $nota = 0;
                $promedio = 0;
                foreach ($actividades as $actividad) {
                    $contador += 1;
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    $nota = $actividad->getNota() + $nota;
                    $promedio = $nota / $contador;
                    echo '      <a href="views/form_actividad.php?id=' . $actividad->getId() . '&codigo=' . $codigo . '">Modificar</a>';
                    echo '      <a href="views/accion_borrar_actividades.php?id=' . $actividad->getId() . '&codigo=' . $codigo . '">Borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
        <?php

        if ($promedio <3 && $promedio >0) {
            echo '<h2 style="color: red">Su promedio es: ' . $promedio . ' </h2>';
            echo '<h2 style="color: red">No aprobaste </h2>';
        } else if ($promedio >= 3) {
            echo '<h2 style="color: green">Su promedio es: ' . $promedio . ' </h2>';
            echo '<h2 style="color: green">Felicidades, aprobaste </h2>';
        } else if ($promedio == 0) {
            echo '<h2 style="color: black">Primero debe registrar las notas</h2>';
        }
        ?>
    </main>
    <br>
    <a href="indexEstudiante.php">Regresar a la lista de estudiantes</a>
</body>

</html>