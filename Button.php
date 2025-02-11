<?php

/*
    boton con texto. al presionarse ejecuta la funcion "funcion"
*/
class Button extends Elemento implements IEditable
{

    public $funcion;
    public $text;

    public function __construction($id, $visible = true, $modo, $text = "", $funcion = null)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct($id, $visible, $modo);

        $this->text = $text;
        $this->funcion = $funcion;
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
}




?>