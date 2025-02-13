<?php

/*
 *  una seccion es un elemento que sirve para dividir el programa.
 *  es invisible por defecto pero se le puede anhadir borde 
 *  modificando el html.
 * 
 *  puede contener cualquier otro tipo de "Elemento", incluyendo otras secciones.
 */
class Seccion extends Elemento implements IRenderizable
{
    public $elementos;

    public function __construct($id, $modo, $padre, $programa, $estilo)
    {
        $html = " ";
        parent::__construct($id, $modo, $padre, $programa, $html, $estilo);
        $this->elementos = [];
    }

    /*  
        patron de diseño para crear una seccion con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, $padre, $programa, $estilo)
    {
        // Crea la seccion
        $seccion = new self(
            $id,
            null,
            $padre,
            $programa,
            $estilo,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $seccion);

        // Asigna el modo al botón
        $seccion->setModo($modo);

        // agrego el boton a la lista de elementos del programa
        $programa->elementos[] = $seccion;

        return $seccion;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }


    // TODO
    function hide()
    {

    }

    // TODO
    function show()
    {

    }

    /*

    */
    function add($elemento, $fila, $columna)
    {
        $elementos = $this->elementos; // meto '$this->elementos' en una variable por comodidad

        $numFilas = count($elementos);

        if ($numFilas < $fila) {                                   // hay menos filas de las necesarias
            for ($i = $numFilas; $i < $fila; $i++) {               // se crean las filas necesarias
                $elementos = [];
            }
        } else {
            $numColumnas = count($elementos[$columna]);     // cuento el numero de columnas que hay en la fila solicitada

            if ($numColumnas < $columna) {                         // hay menos columnas de las necesarias
                for ($j = $numColumnas; $j < $columna; $j++) {
                    $elementos[$fila] = [];
                }
            }
        }

        // ya tengo la matriz preparada para la insercion
        $elementos[$fila][$columna] = $elemento;
    }

    function renderizar()
    {
        return $this->html;
    }


    /*
        metodo auxiliar para debug
    */
    function printMatriz()
    {
        echo("MATRIZ-------");
        $i = 0;
        foreach ($this->elementos as $fila) {
            $j = 0;
            foreach ($fila as $columna) {
                echo ("[$i, $j] ");
            }
        }
        echo("------------");
    }
}
?>