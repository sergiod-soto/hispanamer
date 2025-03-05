<?php

/*
 * cuadro de texto, rectangulo donde se puede escribir
 * es un Elemento
 */
class TextBox extends Elemento
{

    public $texto;

    public function __construct($id, string $clase, $text, $placeHolder, $padre)
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
            $text,
            $placeHolder,
            $padre,
        );

        return $boton;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>