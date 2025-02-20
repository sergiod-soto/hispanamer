<?php

require_once "Programa.php";

/*
    boton con texto. al presionarse ejecuta la funcion "funcion"
*/
class Button extends Elemento implements Input
{

    public $funcion;
    public $text;

    public function __construct($id, string $clase, $modo, $text, $padre)
    {
        if ($clase != null && $clase != "") {
            $html = "<button id=\"$id\" class=\"$clase\" type='button'>$text</button>";
        } else {
            $html = "<button id=\"$id\" type='button'>$text</button>";
        }
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
    public static function crear($id, string $clase, $text, $padre)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            null,
            $text,
            $padre,
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
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
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
    function setVisible($visible)
    {
        // TODO
    }

    /*
        se cambia el texto que aparece en el boton
    */
    function cambiarText($text)
    {
        $this->text = $text;
        if ($this->clase != null && $this->clase != "") {
            $this->html = "<button id=\"$this->id\" class=\"$this->clase\" type='button'>$text</button>";
        } else {
            $this->html = "<button id=\"$this->id\" type='button'>$text</button>";
        }
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