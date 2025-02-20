<?php

/*
 *  abstraccion de la conexion a la base de datos
 *  puede haber tantas como se quiera, incluyendo a diferentes
 *  bases de datos
 */


class Conexion
{
    public $conn; // 

    public function __construct($servername, $baseDatos, $username, $password)
    {

        // Create connection
        $conn = new mysqli(
            $servername,
            $username,       // root
            $password,       // 025811
            $baseDatos,
        );

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            echo "Connected successfully";
        }
    }

    public function consulta($consulta)
    {

    }
}









?>