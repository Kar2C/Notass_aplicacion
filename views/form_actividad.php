<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Actividad';
$urlAction = "accion_registro_actividad.php";
$actividad = new Actividad();
if (!empty($id)){
    $titulo ='Modificar Actividad';
    $urlAction = "accion_modificar_Actividad.php";
    $usuarioController = new ActividadController();
    $actividad = $actividadController->readRow($id);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>form actividad</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction;?>" method="post">
        <label>
            <span>Id:</span>
            <input type="number" name="id" min="1" value="<?php echo $usuario->getId(); ?>" required>
        </label>
        <br>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $usuario->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" min="1" value="<?php echo $usuario->getNota(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>