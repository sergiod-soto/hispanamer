<?php

require_once "Programa.php";

/*
    boton con texto. al presionarse ejecuta la funcion "funcion"
*/
class Button extends Elemento implements IEditable, IRenderizable
{

    public $funcion;
    public $text;
    public $programa;

    public function __construct($id, $modo, $text, $funcion, $padre, $programa, $estilo)
    {
        $html = "<button type='button'>$text</button>";
        $this->text = $text;
        $this->funcion = $funcion;


        // Llamamos al constructor de la clase Elemento
        parent::__construct($id, $modo, $padre, $programa, $html, $estilo);

    }

    /*
        patron de diseño para crear un boton con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, $text, $funcion, $padre, $programa, $estilo)
    {
        // Crea el botón
        $boton = new self(
            $id,
            null,
            $text,
            $funcion,
            $padre,
            $programa,
            $estilo
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $boton);

        // Asigna el modo al botón
        $boton->setModo($modo);
        return $boton;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
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