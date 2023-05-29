<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
$codigo= $_GET['codigo'];

if ($resultado) {
    echo '<h1>Actividad borrada</h1>';
} else {
    echo '<h1>No se pudo borrar la actividad</h1>';
}
?>
<br>
<a href="../indexActividad.php?codigo=<?php echo $codigo; ?>">Regresar a la lista de avtividades</a>
