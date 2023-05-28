<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseControllers_actividad.php';
require '../../controllers/actividadController.php';

use actividad\Actividad;
use actividadController\ActividadController;

$id = $_GET['id'];
$codigo = $_GET['codigo'];
$actividad = new Actividad();
$actividad->setid($id);
$actividad->setDescripcion($_POST['descripcion']);
$actividad->setNota($_POST['nota']);
$actividad->setCodigoEstudiante($codigo);

$actividadController = new ActividadController();
$resultado = $actividadController->update($actividad->getId(), $actividad);
$url = '../../index_actividad.php?codigo='.$codigo;
if ($resultado) {
    $msj = '<h1>se modifico la actividad</h1>';
} else {
    $msj = '<h1>No se pudo modificar la actividad</h1>';
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
