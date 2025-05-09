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
}
