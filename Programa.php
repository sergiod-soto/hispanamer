<?php

//

require_once "Modo.php";



/*
 *  el elemento mas basico. solo hay uno y contiene
 *  dentro todos los elementos que lo conforman
 */
class Programa extends Modo implements IRenderizable
{

    public $conexion;           // conexion a la base de datos
    public $cookies;            // gestion de informacion
    public $elementos;          // gestion de los elementos 
    public $estilo;             // estilo del programa     
    public $html;               // html de la pagina del programa
    public $titulo;             // titulo que aparece en la pestanha del navegador

    public function __construct()
    {
        $this->titulo = "mi primer programa";
        $this->cookies = [];
        $this->elementos = [];
        $this->html =
            '
                <!DOCTYPE html>
                <html lang="es">
                <head>
                    <meta charset="UTF-8">
                    <title>' . $this->titulo . '</title>
                </head>
                <body>
                    <h1>Hola, mundo</h1>
                </body>
                </html>
            ';
    }

    //..........................................................................
    //..........................................................................



    //..........................................................................
    //..........................................................................

    /*
        suministra un id valido al elemento que lo solicite
    */
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

    /*
        anhade un nuevo elemento a la lista
    */
    public function addElemento($id, $elemento)
    {
        $this->elementos[$id] = $elemento;
    }

    /*
        se elimina un elemento de la lista
    */
    public function removeElemento($elementoId)
    {
        if ($this->elementos == null || !array_key_exists($elementoId, $this->elementos)) {
            throw new Exception(
                "Se ha intentado eliminar un elemento en la clase Programa que no existe"
            );
        }
        unset($elementos[$elementoId]);
    }

    /*
        
    */
    function Renderizar()
    {
        return $this->html;
    }




}

/*
    ejecucion del programa
*/

$programa = new Programa();

echo ($programa->Renderizar());
?>