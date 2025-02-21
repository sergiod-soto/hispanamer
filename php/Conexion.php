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
        $this->conn = new mysqli(
            $servername,
            $username,       // root
            $password,       // 025811
            $baseDatos,
        );
        $this->conn->set_charset("utf8");

        // Check connection
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public function consulta($consulta)
    {
        if ($this->conn == null) {
            throw new Exception("conexion NULL");
        }
        $result = $this->conn->query($consulta);













        $r = [];
        if ($result->num_rows > 0) {
            // Salida de cada fila de resultado
            while ($row = $result->fetch_assoc()) {
                $r[] = $row["nombre"];
            }
        } else {
            echo "0 resultados";
        }


        $this->conn->close();


        return $r;
    }
}









?>