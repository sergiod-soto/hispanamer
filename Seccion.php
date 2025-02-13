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

    public function __construct($id, $clase, $modo, $padre, $estilo)
    {
        $html = " ";
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $html,
            $estilo
        );
        $this->elementos = [];
    }

    /*  
        patron de diseño para crear una seccion con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, $clase, $padre, $estilo)
    {
        // Crea la seccion
        $seccion = new self(
            $id,
            $clase,
            null,
            $padre,
            $estilo,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando la seccion en el constructor
        $modo = new Modo($modoPadre, $seccion);

        // Asigna el modo al botón
        $seccion->setModo($modo);

        return $seccion;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }


    /*

    */
    function hide()
    {
        // TODO
    }

    /*

    */
    function show()
    {
        // TODO
    }

    /*

    */
    function add($elemento, $fila, $columna)
    {
        $this->elementos[$fila][$columna] = $elemento;
    }

    function renderizar()
    {

        $cuerpoSeccion = "";

        $elementos = $this->elementos;



        foreach ($elementos as $fila) {             // recorro cada fila

            $cuerpoSeccion .= "<div>";
            foreach ($fila as $celda) {             // recorro cada celda de la fila
                $cuerpoSeccion .= $celda->html;
            }

            //......................................// nueva fila
            $cuerpoSeccion .= "</div>";
        }

        //.........................................// fin ultima fila
        $cuerpoSeccion .= "</div>";





        $this->html =
            "<div id= '$this->id' class='$this->clase'>" .
            $cuerpoSeccion .
            "</div>";
        return $this->html;
    }


    /*
        metodo auxiliar para debug
    */
    function printMatriz()
    {
        $elementos = $this->elementos;

        echo ("--------------MATRIZ--------------<br><br>");

        $maxIKey = 0;
        foreach (array_keys($elementos) as $iKey) {
            if ($iKey > $maxIKey) {
                $maxIKey = $iKey;
            }
        }

        $maxJKey = 0;
        foreach ($elementos as $fila) {
            foreach (array_keys($fila) as $jKey) {
                if ($jKey > $maxJKey) {
                    $maxJKey = $jKey;
                }
            }
        }

        $maxIKey++;
        $maxJKey++;

        for ($i = 0; $i < $maxIKey; $i++) {
            if (array_key_exists($i, $elementos)) {
                for ($j = 0; $j < $maxJKey; $j++) {
                    if (array_key_exists($j, $elementos[$i])) {
                        $t = "null";
                        if ($elementos[$i][$j] != null) {
                            $t = $elementos[$i][$j]->text;
                        }
                        echo ("[$i, $j]->" . $t . "     ");
                    } else {
                        echo ("[ ]");
                    }
                }
                echo ("<br>");
            } else {
                for ($j = 0; $j < $maxJKey; $j++) {
                    echo ("[ ]");
                }
                echo ("<br>");
            }
        }
        echo ("<br>------------------------------------");
    }
}
?>