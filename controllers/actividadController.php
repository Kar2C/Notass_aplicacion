<?php

namespace actividadController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use actividad\Actividad;

class ActividadController extends BaseController
{

    function create($actividad)
    {
        $sql = 'insert into actividades ';
        $sql .= '(id, descripcion, nota, codigoEstudiante) values ';
        $sql .= '(';
        $sql .= $actividad->getId() . ',';
        $sql .= '"' . $actividad->getdescripcion() . '",';
        $sql .= '"' . $actividad->getNota() . '",';
        $sql .= '"' . $actividad->getCodigoEstudiante() . '"';
        $sql .= ')';

        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();

        if ($resultadoSQL) {
            return true;
        } else {
            return false;
        }
    }

    function read()
    {
        $sql = 'select * from actividades';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividades = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad = new Actividad();
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoEstudiante($registro['codigoEstudiante']);
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function readRow($id)
    {
        $sql = 'select * from actividades';
        $sql .= ' where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $actividad = new Actividad();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $actividad->setId($registro['id']);
            $actividad->setDescripcion($registro['descripcion']);
            $actividad->setNota($registro['nota']);
            $actividad->setCodigoEstudiante($registro['codigoEstudiante']);
            array_push($notas, $actividad);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($id, $actividad)
    {
        $sql = 'update actividades set ';
        $sql .= 'descripcion= "' . $actividad->getDescripcion() . '",';
        $sql .= 'nota= "' . $actividad->getNota() . '",';
        $sql .= 'codigoEstudiante= "' . $actividad->getCodigoEstudiante() . '"';
        $sql .= ' where id= ' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }


    function delete($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
