<?php

/**
 *  Bastante autoexplicativo. es un popup.
 */


/**
 *  enum para controlar
 */
enum PopupEstado: string
{
    case Ok = "bien";
    case Warning = "advertencia ";
    case Error = "error ";
    case Normal = "normal";
}


class PopUp extends Elemento
{

    public $html;
    public $text;

    public function __construct($id, string $clase, $text, $estado, $padre)
    {
        $html =
            "
            <div id='$id' class='popup $estado $clase'>
            $text
            </div>
            ";

        $this->text = $text;


        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            $html,
        );
    }

    /*
       patron de diseño para crear un boton con modo creado, el cual con el propio boton
       y evitar dependencia circular
   */
    public static function crear($id, string $clase, $text, $estado, $padre)
    {
        // Crea el popup
        $popup = new self(
            $id,
            $clase,
            $text,
            $estado,
            $padre,
        );

        return $popup;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>