<?php

/*
 * cuadro de texto, rectangulo donde se puede escribir
 * es un Elemento
 */
class TextBox extends Elemento implements IEditable
{

    public $texto;





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