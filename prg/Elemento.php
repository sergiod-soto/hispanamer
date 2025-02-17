<?php

// class autoloader
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});

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
    public $elementoPadre;
    public $clase;

    function __construct($id, $clase, $modo, $elementoPadre, $html)
    {
        $this->id = $id;
        if ($clase == null) {
            $this->clase = '';
        } else {
            $this->clase = $clase;
        }
        $this->visible = true;      // por defecto es visible
        $this->elementoPadre = $elementoPadre;
        $this->html = $html;
        $this->modo = $modo;            // modo no es opcional. aunque no sea editable, hace
        // falta para propagar la edicion a los elementos hijos
    }
    public function setModo($modo)
    {
        $this->modo = $modo;
    }

    abstract public function hide();
    abstract public function show();
}
?>