<?php

require_once "Programa.php";

/*
    boton con texto. al presionarse ejecuta la funcion "funcion"
*/
class Button extends Elemento implements IEditable, IRenderizable
{

    public $funcion;
    public $text;

    private $programa;

    public function __construction($id, $visible = true, $modo, $text = "", $funcion = null, $padre, $programa, $estilo)
    {
        $html = "";
        // Llamamos al constructor de la clase Elemento
        parent::__construct($id, $visible, $modo, $padre, $programa, $html, $estilo);

        $this->text = $text;
        $this->funcion = $funcion;


    }

    /*
        TODO
    */
    public function setEditableOn()
    {

    }

    /*
        TODO
    */
    public function setEditableOff()
    {

    }

    /*
        TODO
    */
    function hide()
    {

    }

    /*
        TODO
    */
    function show()
    {

    }

    /*
        TODO
    */
    function Renderizar()
    {
        return "TODO";
    }

}
?>