<?php

/*
    PopUp para seleccionar fecha
*/
class DateSelector extends Elemento implements IEditable, Input
{


    public function __constructor($id, $visible = false, $modo)
    {
        parent::__construct($id, $visible, $modo);
    }

    function hide()
    {

    }
    function show()
    {

    }
    function setVisible($visible)
    {

    }
    function setEditableOff()
    {

    }
    function setEditableOn()
    {

    }
    public function renderizar()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}

?>