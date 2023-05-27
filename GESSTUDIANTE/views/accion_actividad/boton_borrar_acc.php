<?php
require '../../models/actividad.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseControllers_actividad.php';
require '../../controllers/actividadController.php';

use actividadController\ActividadController;

$codigo = $_GET['codigo'];
$actividadController = new ActividadController();
$resultado = $actividadController->delete($_GET['id']);
$url = '../../index_actividad.php?codigo='.$codigo;
if ($resultado) {
    echo '<h1>se borro la actividad</h1>';
} else {
    echo '<h1>No se pudo borrar la actividad</h1>';
}
?>
<br>
<a href="<?php echo($url)?>">Volver al inicio</a>