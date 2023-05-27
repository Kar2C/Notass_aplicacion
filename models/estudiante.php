<?php

namespace estudiante;

class Estudiante
{
    private $codigo;
    private $nombre;

    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($value)
    {
        $this->codigo = $value;
    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($value)
    {
        $this->nombre = $value;
    }
}
