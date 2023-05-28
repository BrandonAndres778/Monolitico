<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseControllers_actividad.php';
require '../../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$codigo = $_GET['codigo'];
$actividad = new Actividad();
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($_GET['codigo']);

$actividadController = new ActividadController();
$resultado = $actividadController->create($actividad);
$url = '../../index_actividad.php?codigo='.$codigo;
if ($resultado) {
    $msj = '<h1>se registro la actividad</h1>';
} else {
    $msj = '<h1>No se pudo registrar la actividad</h1>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="../CSS/msjAccion.css">
</head>
<body>
    <header>
        <h1><?php echo($msj) ?></h1>
    </header>
    <a href="<?php echo($url)?>">Volver al inicio</a>
</body>
</html>