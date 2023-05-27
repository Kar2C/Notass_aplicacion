<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/estudianteController.php';

use estudiante\Estudiante;
use estudianteController\EstudianteController;

$estudiante = new Estudiante();
$estudiante->setCodigo($_POST['codigo']);
$estudiante->setNombre($_POST['nombres']);
$estudiante->setApellido($_POST['apellidos']);

$estudianteController = new EstudianteController();
$resultado = $estudianteController->create($estudiante);
if ($resultado) {
    echo '<h1>Estudiante registrado</h1>';
} else {
    echo '<h1>No se pudo registrar el estudiante</h1>';
}
?>
<br>
<a href="../indexEstudiante.php" > Inicio </a>