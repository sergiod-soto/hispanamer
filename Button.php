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
        $html = "<button type='button'>$text</button>";

        // Llamamos al constructor de la clase Elemento
        parent::__construct($id, $visible, $modo, $padre, $programa, $html, $estilo);

        $this->text = $text;
        $this->funcion = $funcion;


    }

    /*
        cambia el estilo a editable
    */
    public function setEditableOn()
    {
        // TODO
    }

    /*
        cambia el estilo a NO editable
    */
    public function setEditableOff()
    {
        // TODO
    }

    /*
        vuelve al elemento invisible
    */
    function hide()
    {
        // TODO
    }

    /*
        vuelve al elemento visible
    */
    function show()
    {
        // TODO
    }

    /*
        se cambia el texto que aparece en el boton
    */
    function cambiarText($text)
    {
        $this->text = $text;
        $this->html = "<button type='button'>$text</button>";
    }

    /*
        retorna el html asociado
    */
    function Renderizar()
    {
        return $this->html;
    }

}
?>