<?php

/*
 * cuadro de texto, rectangulo donde se puede escribir
 * es un Elemento
 */
class TextBox extends Elemento
{

    public $texto;

    public function __construct($id, string $clase, $modo, $text, $placeHolder, $padre)
    {
        $html = "<span ";
        if ($clase != null && $clase != "") {
            $html .= "class=\"$clase\"";
        }
        $html .= "><input type=\"text\" id=\"$id\" placeholder=\"$placeHolder\" data-tipo=\"TextBox\"/>$text</span>";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $html,
        );
    }

    /*
        patron de diseño para crear un TextBox con modo creado, el cual con el propio TextBox
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $text, $placeHolder, $padre)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            null,
            $text,
            $placeHolder,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el TextBox en el constructor
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
    function setVisible($visible)
    {

    }
    function renderizar()
    {
        return $this->html;
    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}
?>