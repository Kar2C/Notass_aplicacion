<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$actividad = new Actividad();
// $actividad->setId($_POST['id']);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($_POST['codigo']);
$codigo = $_POST['codigo'];


$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);

if ($resultado) {
    echo '<h1>Avtividad registrada</h1>';
} else {
    echo '<h1>No se pudo registrar la actividad</h1>';
}
?>
<br>
<a href="../indexActividad.php?codigo=<?php echo $codigo; ?>">Regresar a la lista de actividades</a>