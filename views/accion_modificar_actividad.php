<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use actividad\Actividad;
use usuarioController\UsuarioController;

$actividad = new Actividad();
$actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);


$usuarioController = new UsuarioController();
$resultado = $usuarioController->update($actividad->getId(),$codigo);
if ($resultado) {
    echo '<h1>Actividad modificada</h1>';
} else {
    echo '<h1>No se pudo modificar la actividad</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>