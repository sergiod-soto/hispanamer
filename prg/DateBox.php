<?php

/*
    introduccion de fecha
*/
class DateBox extends Elemento implements Input, IEditable
{

    public function DateBox($id, $visible = true, $modo)
    {
        parent::__construct($id, $visible, $modo);
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
    public function renderizar()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}


?>