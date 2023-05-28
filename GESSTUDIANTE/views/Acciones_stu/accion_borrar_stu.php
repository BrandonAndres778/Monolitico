<?php
require '../../models/estudiante.php';
require '../../controllers/conexionDbController.php';
require '../../controllers/baseController.php';
require '../../controllers/estudiantesController.php';

use estudianteController\EstudianteController;

$estudianteController = new EstudianteController();
$resultado = $estudianteController->delete($_GET['codigo']);
if ($resultado) {
    $msj = '<h1>estudiante borrado</h1>';
} else {
    $msj = '<h1>No se pudo borrar el estudiante</h1>';
}
$url = "../../index.php";
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