<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use estudiante\Estudiante;
use usuarioController\UsuarioController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombre']);

$usuarioController = new UsuarioController();
$resultado = $usuarioController->update($estudiante->getCodigo(),$codigo);
if ($resultado) {
    echo '<h1>Estudiante modificado</h1>';
} else {
    echo '<h1>No se pudo modificar el estudiante</h1>';
}
?>
<br>
<a href="../index.php">Volver al inicio</a>