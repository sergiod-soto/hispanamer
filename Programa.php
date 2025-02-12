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
        $this->html =
            '
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <title>Mi Página2</title>
                </head>
                <body>
                    <h1>Hola, mundo</h1>
                </body>
                </html>
            ';
    }

    //..........................................................................
    //..........................................................................

    /*
       Metodo especial. Es el encargado de materializar
       el programa en una pagina.

       La funcionalidad de este metodo deberia dejarse lo 
       mas simple posible, dejando que el resto del programa
       modifique el html y este metodo simplemente lo renderice
    */
    public function Main()
    {
        echo ($this->html);
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

/*
    ejecucion del programa
*/

$programa = new Programa();

echo ($programa->Main());