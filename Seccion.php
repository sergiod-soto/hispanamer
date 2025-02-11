<?php

/*
 *  una seccion es un elemento que sirve para dividir el programa.
 *  es invisible por defecto pero se le puede anhadir borde 
 *  modificando el html.
 * 
 *  puede contener cualquier otro tipo de "Elemento", incluyendo otras secciones.
 */
class Seccion extends Elemento
{
    public $elementos;

    public function __constructor($id, $visible = true, $elementoPadre, $modo, $estilo)
    {
        $html = "";
        parent::__construct($id, $visible, $modo, $elementoPadre, $html, $estilo);
        $this->elementos = [];

        // html del elemento

    }

    // TODO
    function hide()
    {

    }

    // TODO
    function show()
    {

    }
}

?>