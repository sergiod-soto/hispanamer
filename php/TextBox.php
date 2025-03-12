<?php

/*
 * cuadro de texto, rectangulo donde se puede escribir
 * es un Elemento
 */
class TextBox extends Elemento
{

    public $texto;

    public function __construct($id, string $clase, $text, $placeHolder)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        
        $html =
            "
            <div><input type=\"text\" class=\"$clase\" id=\"$id\" placeholder=\"$placeHolder\" data-tipo=\"TextBox\"/>
                $text
            </div>";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
        );
    }

    /*
        patron de diseño para crear un TextBox con modo creado, el cual con el propio TextBox
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $text, $placeHolder)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            $text,
            $placeHolder,
        );

        return $boton;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>