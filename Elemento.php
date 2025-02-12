<?php

/*
 *   un elemento es un objeto abstracto. puede ser desde una caja de escritura o
 *   un icono, hasta un cuadrado divisor.
 */
abstract class Elemento
{

    public $html;
    public $id;
    public $visible;
    public $modo;
    public $estilo;
    public $elementoPadre;

    public $programa;

    function __construct($id, $visible = true, $modo = null, $elementoPadre, $programa, $html, $estilo)
    {
        $this->id = $id;
        $this->visible = $visible;      // por defecto es visible
        $this->elementoPadre = $elementoPadre;
        $this->programa = $programa;    // objeto de la clase Programa
        $this->html = $html;
        $this->estilo = $estilo;
        $this->modo = $modo;            // modo no es opcional. aunque no sea editable, hace
        // falta para propagar la edicion a los elementos hijos
    }

    abstract function hide();
    abstract function show();
}



?>