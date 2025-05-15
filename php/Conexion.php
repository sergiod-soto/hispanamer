<?php

/**
 * abstraccion de la conexion a la base de datos
 * puede haber tantas como se quiera, incluyendo a diferentes
 * bases de datos
 */


class Conexion
{

    const SERVERNAME = "localhost";
    const DATABASE = "hispanamer";
    const USUARIO = "root";
    const PASSWORD = "025811";
    public $conn; // 

    public function __construct($servername, $baseDatos, $username, $password)
    {
        try {

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
        } catch (Exception $e) {
            echo "               
                    <!DOCTYPE html>
                    <html lang='es'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        </head>

                        <body>
                            <h1>Error fatal conectando a la base de datos</h1>
                            <p>$e</p>
                        </body>
                    </html>
                ";
            exit();
        }
    }

    public function consulta($consulta)
    {
        try {
            if ($this->conn == null) {
                throw new Exception("conexion NULL");
            }
            $result = $this->conn->query($consulta);


            while ($row = $result->fetch_assoc()) {
                $matriz[] = array_values($row);  // Guarda toda la fila en el array
            }
            $this->conn->close();
            return $matriz;
        } catch (Exception $e) {
            echo "               
                    <!DOCTYPE html>
                    <html lang='es'>
                        <head>
                            <meta charset='UTF-8'>
                            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                        </head>

                        <body>
                            <h1>Error fatal consultando la base de datos</h1>
                            <p>$e</p>
                        </body>
                    </html>
                ";
            exit();
        }
    }
}









?>