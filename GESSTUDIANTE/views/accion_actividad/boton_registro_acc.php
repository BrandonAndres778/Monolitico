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
    echo '<h1>se registro la actividad</h1>';
} else {
    echo '<h1>No se pudo registrar la actividad</h1>';
}
?>
<br>
<a href="<?php echo($url)?>">Volver al inicio</a>
