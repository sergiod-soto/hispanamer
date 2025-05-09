<?php

require_once "Programa.php";

/*
    boton con texto. al presionarse ejecuta la funcion "funcion"
*/
class Button extends Elemento
{

    public $funcion;
    public $text;

    public function __construct($id, string $clase, $text, $title, $funcion)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        $html = "<button id=\"$id\" data-tipo=\"Button\" class=\"$clase\"  onclick=\"$funcion\" title=\"$title\" type='button'>$text</button>";

        $this->text = $text;


        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
        );
    }

    /*
        patron de diseño para crear un boton con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $text, $title, $funcion)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            $text,
            $title,
            $funcion
        );

        return $boton;
    }

    /*
        retorna el html asociado
    */
    function renderizar()
    {
        return $this->html;
    }
}
?>