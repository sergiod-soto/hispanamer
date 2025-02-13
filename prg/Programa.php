<?php

// class autoloader
spl_autoload_register(function ($class_name) {
    include "../../programa/prg/" . $class_name . '.php';
});



/*
 *  el elemento mas basico. solo hay uno y contiene
 *  dentro todos los elementos que lo conforman
 */
class Programa extends Modo implements IRenderizable
{

    public $conexion;           // conexion a la base de datos
    public $cookies;            // gestion de informacion
    public $estilo;             // estilo del programa     
    public $html;               // html de la pagina del programa
    public $cabecera;
    public $titulo;             // titulo que aparece en la pestanha del navegador
    public $cuerpo;
    public $modo;
    public $elementos;

    public function __construct()
    {
        $this->titulo = "";
        $this->cookies = [];
        $this->elementos = [];
        $this->cabecera = "";
        $this->cuerpo = "";
    }

    /*
        patron de diseño para crear un boton con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear()
    {
        // Crea el botón
        $programa = new self();

        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo(null, $programa);

        // Asigna el modo al botón
        $programa->setModo($modo);

        return $programa;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
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
        if ($newId == 0) {
            return 0;
        }
        for ($i = 0; $i < count($this->elementos); $i++) {
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
    function nuevaLinea()
    {
        return "<br>";
    }

    /*
        
    */
    function renderizar()
    {
        return $this->html =
            "
            <!DOCTYPE html>
            <html lang='es'>
                <head>
                    $this->cabecera 
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                </head>

                <body>
                    $this->cuerpo    
                </body>
            </html>
            ";
    }
}
?>