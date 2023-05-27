<?php
require 'models/actividad.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/usuariosController.php';

use usuarioController\UsuarioController;

$usuarioController = new UsuarioController();

$actividad = $usuarioController->read();
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
        <a href="views/form_actividad.php">Registrar actividad</a>
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
                foreach ($actividad as $actividad) {
                    echo '<tr>';
                    echo '  <td>' . $actividad->getId() . '</td>';
                    echo '  <td>' . $actividad->getDescripcion() . '</td>';
                    echo '  <td>' . $actividad->getNota() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/form_actividad.php?id=' . $usuario->getId() . '">modificar</a>';
                    echo '      <a href="views/accion_borrar_actividad.php?id=' . $usuario->getId() . '">borrar</a>';
                    echo '  </td>';
                    echo '</tr>';
                }
                ?>
            </tbody>
        </table>
    </main>
</body>

</html>