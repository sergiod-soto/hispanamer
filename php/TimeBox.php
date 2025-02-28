<?php

/*
    introduccion de hora
*/
class TimeBox extends Elemento implements IEditable
{

    public $tiempo;

    public function __construct($id, string $clase, $modo, $padre)
    {

        $html =
            "
            <span id=\"$id\" class=\"timeBox-Container $clase\" data-tipo=\"TimeBox\">
            <input type=\"text\" class=\"timeInput\" placeholder=\"h/min\" readonly>
            
            <div class=\"overlay-timeBox\"></div>
            
            <div class=\"modal\">
                <div class=\"modalTitle\">Selecciona la Hora</div>
                <div class=\"modalContent\">
                <div class=\"dialContainer\">
                    <div class=\"markers\"></div>
                    <div class=\"timeDisplay\">--:--</div>
                </div>
                <div class=\"adjustButtons\">
                    <button class=\"plusBtn\">+</button>
                    <button class=\"minusBtn\">−</button>
                </div>
                </div>
                <div class=\"modalFooter\">
                <button class=\"confirmBtn\">Confirmar</button>
                <button class=\"cancelBtn\">Cancelar</button>
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
        patron de diseño para crear un timeBox con modo creado, el cual con el propio boton
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