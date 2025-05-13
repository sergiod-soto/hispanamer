<?php

/**
 *  Bastante autoexplicativo. es un popup.
 */


/**
 *  enum para controlar
 */
enum PopupEstado: string
{
    case OK = "bien";
    case WARNING = "advertencia ";
    case ERROR = "error ";
    case NORMAL = "normal";
}


class PopUp extends Elemento
{
    public function __construct($id, string $clase, $text, $estado)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html =
            "
            <div id='$id' class='popup $estado $clase'>
            $text
            </div>
            ";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html
        );
    }

    /*
       patron de diseño para crear un boton con modo creado, el cual con el propio boton
       y evitar dependencia circular
   */
    public static function crear($id, string $clase, $text, $estado)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        
        // Crea el popup
        $popup = new self(
            $id,
            $clase,
            $text,
            $estado,
        );

        return $popup;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>