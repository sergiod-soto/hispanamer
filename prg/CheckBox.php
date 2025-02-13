<?php

/*
    checkbox, funciona como un interruptor
*/
class ChechBox extends Elemento
{

    public $text;

    public function CheckBox($id, $visible = true, $text, $modo)
    {
        parent::__construct($id, $visible, $modo);

        $this->text = $text;
    }

    function hide()
    {

    }
    function show()
    {

    }
    function setEditableOn()
    {

    }
    function setEditableOff()
    {

    }
}




?>