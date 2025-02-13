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
    public $estilo;
    public $elementoPadre;
    public $clase;

    public $programa;

    function __construct($id, $clase, $modo, $elementoPadre, $programa, $html, $estilo)
    {
        $this->id = $id;
        if ($clase == null) {
            $this->clase = '';
        } else {
            $this->clase = $clase;
        }
        $this->visible = true;      // por defecto es visible
        $this->elementoPadre = $elementoPadre;
        $this->programa = $programa;    // objeto de la clase Programa
        $this->html = $html;
        $this->estilo = $estilo;
        $this->modo = $modo;            // modo no es opcional. aunque no sea editable, hace
        // falta para propagar la edicion a los elementos hijos
    }

    abstract public function hide();
    abstract public function show();
}
?>