<?php namespace baseControler;

abstract class BaseController
{
    abstract function create($estudiante);
    abstract function read();
    abstract function update($id, $actividad);
    abstract function delete($codigo);
    abstract function readRow($model);
}

