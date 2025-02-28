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
    case Neutral = "neutral";
}


class PopUp extends Elemento
{

    public $html;
    public $text;

    public function __construct($id, string $clase, $modo, $text, $estado, $padre)
    {
        $html =
            "
            <span id='$id' class='popup .$estado $clase'>
            $text
            </span>
            ";

        $this->text = $text;


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
       patron de diseño para crear un boton con modo creado, el cual con el propio boton
       y evitar dependencia circular
   */
    public static function crear($id, string $clase, $text, $estado, $padre)
    {
        // Crea el popup
        $popup = new self(
            $id,
            $clase,
            null,
            $text,
            $estado,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $popup);

        // Asigna el modo al botón
        $popup->setModo($modo);

        return $popup;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }

    function setEditableOff()
    {

    }
    function setEditableOn()
    {

    }
    function renderizar()
    {
        return $this->html;
    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}
?>