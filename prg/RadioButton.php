<?php

class RadioButton extends Elemento
{


    public $labels;
    public $horizontal;

    function __construct($id, $labels, $visible = true, $modo = null, $horizontal = true)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct($id, $visible, $modo);

        // Inicializamos el atributo específico de RadioButton
        $this->labels = $labels;
        $this->horizontal = $horizontal;
    }


    public function setEditableOn()
    {

    }
    public function setEditableOff()
    {

    }
    function hide()
    {

    }
    function show()
    {

    }
    function renderizar()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}
?>