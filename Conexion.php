<?php

/*
 *  abstraccion de la conexion a la base de datos
 *  puede haber tantas como se quiera, incluyendo a diferentes
 *  bases de datos
 */


class Conexion
{

    private $tabla;
    private $direccion;

    function __construct($tabla)
    {
        $this->tabla = $tabla;
    }

    function getDireccion()
    {
        return $this->direccion;
    }
}









?>