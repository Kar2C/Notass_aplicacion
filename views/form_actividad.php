<?php
require '../models/actividad.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$id= empty($_GET['id']) ? '' : $_GET['id'];
$titulo= 'Registrar Actividad';
$actividad = new Actividad();
$urlAction = "accion_registro_actividad.php";
$codigo= $_GET['codigo'];

if (!empty($id)){
    $titulo ='Modificar Actividad';
    $urlAction = "accion_modificar_Actividad.php";
    $actividadController = new ActividadController();
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
    <?php
        if (!empty($actividad->getId())){
            echo '<label>';
            echo '<span>Id:  '.$actividad->getId().'</span>';
            echo '<input type="hidden" name="id" value="'.$actividad->getId().'" required >';
            echo '</label>';
            echo '<br>';
        }
        ?>
        <label>
            <span>Descripcion:</span>
            <input type="text" name="descripcion" value="<?php echo $actividad->getDescripcion(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nota:</span>
            <input type="number" name="nota" min="1" value="<?php echo $actividad->getNota(); ?>" min="0" max="5" required>
        </label>
        <label>
            <input type="hidden" name="codigo" value="<?php echo $codigo;?>" required>
        </label>
        <br> <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>