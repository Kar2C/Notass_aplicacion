<?php

namespace usuarioController;

use baseControler\BaseController;
use conexionDb\ConexionDbController;
use estudiante\Estudiante;
use actividad\Actividad;

class UsuarioController extends BaseController
{

    function create($estudiante, $actividad)
    {
        $sql1 = 'insert into estudiantes ';
        $sql1 .= '(codigo, nombres) values ';
        $sql1 .= '(';
        $sql1 .= $estudiante->getCodigo() . ',';
        $sql1 .= '"' . $estudiante->getNombre() . '",';
        $sql1 .= ')';

        $sql2 = 'insert into actividades ';
        $sql2 .= '(id, descripcion, nota) values ';
        $sql2 .= '(';
        $sql2 .= $estudiante->getId() . ',';
        $sql2 .= '"' . $estudiante->getdescripcion() . '",';
        $sql2 .= '"' . $estudiante->getNota() . '",';
        $sql2 .= ')';

        $conexiondb = new ConexionDbController();
        $resultadoSQL1 = $conexiondb->execSQL($sql1);
        $resultadoSQL2 = $conexiondb->execSQL($sql2);
        $conexiondb->close();

        if ($resultadoSQL1 && $resultadoSQL2) {
            return true;
        } else {
            return false;
        }
    }

    function read()
    {
        $sql = 'select * from estudiantes';
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = [];
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante = new Estudiante();
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombres']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiantes;
    }

    function readActividad()
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
            array_push($actividades, $actividad);
        }
        $conexiondb->close();
        return $actividades;
    }

    function readRow($codigo)
    {
        $sql = 'select * from estudiantes';
        $sql .= ' where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $estudiante = new Estudiante();
        while ($registro = $resultadoSQL->fetch_assoc()) {
            $estudiante->setCodigo($registro['codigo']);
            $estudiante->setNombre($registro['nombre']);
            array_push($estudiantes, $estudiante);
        }
        $conexiondb->close();
        return $estudiante;
    }

    function readRowActividad($id)
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
            array_push($notas, $actividad);
        }
        $conexiondb->close();
        return $actividad;
    }

    function update($codigo, $actividad)
    {
        $sql = 'update actividades set ';
        $sql .= 'id=' . $actividad->getId() . '",';
        $sql .= 'descripcion=' . $actividad->getDescripcion() . '",';
        $sql .= 'nota=' . $actividad->getNota() . '",';
        $sql .= ' where id=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function delete($codigo)
    {
        $sql = 'delete from estudiantes where codigo=' . $codigo;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }

    function deleteActividad($id)
    {
        $sql = 'delete from actividades where id=' . $id;
        $conexiondb = new ConexionDbController();
        $resultadoSQL = $conexiondb->execSQL($sql);
        $conexiondb->close();
        return $resultadoSQL;
    }
}
