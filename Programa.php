<?php

//

require_once "Modo.php";

//
//namespace framework;

/*
 *  el elemento mas basico. solo hay uno y contiene
 *  dentro todos los elementos que lo conforman
 */
class Programa extends Modo
{

    public $conexion;           // conexion a la base de datos
    public $cookies;            // gestion de informacion
    public $elementos;          // gestion de los elementos 
    public $estilo;             // estilo del programa     
    public $html;               // html de la pagina del programa

    public function __construct()
    {
        $this->cookies = [];
        $this->elementos = [];
        $this->html = "";
    }

    //..........................................................................
    //..........................................................................

    /*
       Metodo especial. Es el encargado de materializar
       el programa en una pagina.
    */
    public function Main()
    {
        // TODO
        $this->html = '
            <!DOCTYPE html>
            <html lang="es-ES">
            <head>
                <meta charset="utf-8">
                <title>Ejemplo con 2 cabeceras</title>
            </head>
            <body>
                <h1>Esto es una cabecera h1</h1>
                <p>Esto es un párrafo.</p>
                <h2>Esto es una cabecera h2</h2>
                <p>Esto es otro párrafo.</p>
            </body>
            </html>
        ';
    }

    //..........................................................................
    //..........................................................................

    public function getNewIdElemento()
    {
        $newId = count($this->elementos);

        for ($i = 0; $i < $this->elementos; $i++) {
            if ($this->elementos[$i] == null) {
                return $i;
            }
        }
        return $newId;
    }
    public function addElemento($id, $elemento)
    {
        $this->elementos[$id] = $elemento;
    }
    public function removeElemento($elementoId)
    {
        if ($this->elementos == null || !array_key_exists($elementoId, $this->elementos)) {
            throw new Exception(
                "Se ha intentado eliminar un elemento en la clase Programa que no existe"
            );
        }
        unset($elementos[$elementoId]);
    }

    public function addElementoModo($id, $elemento)
    {
        // TODO
    }
    public function removeElementoModo($elementoId)
    {
        // TODO
    }


}
?>

<!DOCTYPE html>
<html lang="es-ES">

<head>
    <meta charset="utf-8">
    <title>Ejemplo con 2 cabeceras</title>
</head>

<body>
    <h1>Esto es una cabecera h1</h1>
    <p>Esto es un párrafo.</p>
    <h2>Esto es una cabecera h2</h2>
    <p>Esto es otro párrafo.</p>
</body>

</html>