<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividadController\ActividadController;

$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
if ($resultado) {
    echo '<h1>Usuario borrado</h1>';
} else {
    echo '<h1>No se pudo borrar el usuario</h1>';
}
