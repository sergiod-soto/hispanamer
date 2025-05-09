<?php

/*
 *  una seccion es un elemento que sirve para dividir el programa.
 *  es invisible por defecto pero se le puede anhadir borde 
 *  modificando el html.
 * 
 *  puede contener cualquier otro tipo de "Elemento", incluyendo otras secciones.
 */

use Dom\Element;

class Seccion extends Elemento
{
    public $elementos;
    public $horizontal;

    public function __construct($id, $clase, $horizontal)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        parent::__construct(
            $id,
            $clase,
            "",
        );
        $this->horizontal = $horizontal;
        $this->elementos = [];
    }

    /*  
        patron de diseño para crear una seccion
    */
    public static function crear($id, string $clase, $horizontal)
    {
        // Crea la seccion
        $seccion = new self(
            $id,
            $clase,
            $horizontal
        );

        return $seccion;
    }

    /**
     * Anhade un Elemento a la Seccion
     * @param Elemento[]|Elemento $elementos
     */
    function add($elementos)
    {
        $this->elementos = $elementos;
    }


    /*
        Implementacion muy cerda :/ 
        Primero recorre toda la matriz para compactarla
        y luego la vuelve a recorrer para renderizarla
    */
    function renderizar()
    {
        $direccion = $this->horizontal === true ? 'row' : 'column';
        $html = "<div id=\"$this->id\" class=\"$this->clase\" style=\"display: flex; flex-direction: $direccion>";

        foreach ($this->elementos as $elemento) {
            $html .= "<div id=\"div_$elemento->id\">" . $elemento->renderizar() . "</div>";
        }

        $html .= "</div>";

        return $html;
    }


    /*
        metodo auxiliar para debug
    */
    function printMatriz($matriz = null)
    {
        $elementos = $this->elementos;
        if ($matriz != null) {
            $elementos = $matriz;
        }

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
