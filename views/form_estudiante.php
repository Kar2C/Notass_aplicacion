<?php
require '../models/estudiante.php';
require '../controllers/conexionDbController.php';
require '../controllers/baseController.php';
require '../controllers/usuariosController.php';

use estudiante\Estudiante;
use usuarioController\UsuarioController;

$codigo = empty($_GET['codigo']) ? '' : $_GET['codigo'];
$titulo = 'Registrar Estudiantes';
$urlAction = "accion_registro_estudiante.php";
$estudiante = new Estudiante();
if (!empty($codigo)) {
    $titulo = 'Modificar Estudiante';
    $urlAction = "accion_modificar_estudiante.php";
    $usuarioController = new UsuarioController();
    $estudiante = $usuarioController->readRow($codigo);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Form estudiante</title>
</head>

<body>
    <h1><?php echo $titulo; ?></h1>
    <form action="<?php echo $urlAction; ?>" method="post">
        <label>
            <span>Código:</span>
            <input type="number" name="codigo" min="1" value="<?php echo $usuario->getCodigo(); ?>" required>
        </label>
        <br>
        <label>
            <span>Nombre:</span>
            <input type="text" name="nombre" value="<?php echo $usuario->getNombre(); ?>" required>
        </label>
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>

</html>