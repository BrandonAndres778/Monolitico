<?php

require 'models/actividad.php';
require 'models/estudiante.php';
require 'controllers/conexionDbController.php';
require 'controllers/baseController.php';
require 'controllers/baseControllers_actividad.php';
require 'controllers/actividadController.php';
require 'controllers/estudiantesController.php';

use estudianteController\EstudianteController;
$estudianteController = new EstudianteController();

use estudiante\Estudiante;

use actividadController\actividadController;
$actividadController = new actividadController();

$codigoEstudiante = $_GET['codigo'];
$codigo = $codigoEstudiante;
$actividades = $actividadController->read($codigoEstudiante);
$urlAction = "views/accion_actividad/form_actividad.php?codigo=".$codigoEstudiante;
$estudiante = new Estudiante();
$estudiante = $estudianteController->readRow($codigo);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <header>
        <h1>LISTA DE ACTIVIDADES</h1>
    </header>
    <main>
        <a  href="<?php echo $urlAction;?>">REGISTRAR ACTIVIDAD</a>
        <table>
            <thead>
                <tr>
                    <th  >Codigo</th>
                    <th >Nombres</th>
                    <th>Apellidos</th>
                </tr>
            </thead>
                <tbody>
                    <tr>
                        <td><?php echo $estudiante->getCodigo();?></td>
                        <td><?php echo $estudiante->getNombres()?></td>
                        <td><?php echo $estudiante->getApellidos()?></td>
                </tr>
        </table>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Descripcion</th>
                    <th>Nota</th>
                    <th>CodigoEstudiante</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sumaprome = 0.0;
                foreach ($actividades as $actividad) {
                    echo '<tr>';
                    echo '  <td >' . $actividad->getId() . '</td>';
                    echo '  <td >' . $actividad->getDescripcion() . '</td>';
                    echo '  <td  >' . $actividad->getNota() . '</td>';
                    echo '  <td >' . $actividad->getCodigoEstudiante() . '</td>';
                    echo '  <td>';
                    echo '      <a href="views/accion_actividad/form_actividad.php?id=' . $actividad->getId() . '&codigo= '. $codigoEstudiante .'">MODIFICAR</a>';
                    echo '  </td>';
                    echo '  <td>';
                    echo '      <a href="views/accion_actividad/boton_borrar_acc.php?id=' . $actividad->getId() . '&codigo= '. $codigoEstudiante .'">BORRAR</a>';
                    echo '  </td>';
                    echo '</tr>';
                    $sumaprome += $actividad->getNota(); 
                }
                $ms = "No hay notas";
                $promedio = "0.0";
                if(!empty($sumaprome)){
                $promedio = $sumaprome/count($actividades);
                if($promedio < 3){
                    $ms = "Lo sentimos esta perdiendo la materia con ";
                }else {
                    $ms = "Felicidades esta pasando la materia con ";
                }
                }
                ?>
            </tbody>
        </table>
        <div>
            <h2 id = "ms"><?php echo($ms)?></h2>
            <h2><?php echo($promedio)?></h2>
        </div>
        <a href="index.php">VOLVER A LA LISTA DE ESTUDIANTES</a>
    </main>
</body>

</html>