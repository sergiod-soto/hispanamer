<?php

/*
    introduccion de hora
*/
class TimeBox extends Elemento implements IEditable
{

    public $tiempo;

    public function __construct($id, string $clase, $modo, $padre)
    {
        $tagClase = "";
        if ($clase != null && $this->clase != "") {
            $this->html = " class=\"$clase\">";
        }
        $html =
            "
            <span id=\"$id\" $tagClase>
            <input type=\"text\" id=\"timeInput\" placeholder=\"h/min\" readonly>
            
            <div id=\"overlay\"></div>
            
            <div id=\"modal\">
                <div id=\"modalTitle\">Selecciona la Hora</div>
                <div id=\"modalContent\">
                <div id=\"dialContainer\">
                    <div id=\"markers\"></div>
                    <div id=\"timeDisplay\">--:--</div>
                </div>
                <div id=\"adjustButtons\">
                    <button id=\"plusBtn\">+</button>
                    <button id=\"minusBtn\">−</button>
                </div>
                </div>
                <div id=\"modalFooter\">
                <button id=\"confirmBtn\">Confirmar</button>
                <button id=\"cancelBtn\">Cancelar</button>
                </div>
            </div>
            </span>
            ";


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
    public static function crear($id, string $clase, $padre)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            null,
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