<?php

namespace baseController;

abstract class BaseControllerActividad
{
    abstract function create($model);
    abstract function read($codigoEstudiante);
    abstract function update($id,$model);
    abstract function delete($id);
    abstract function readRow($id);
}
