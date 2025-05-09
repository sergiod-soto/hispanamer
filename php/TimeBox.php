<?php

/*
    introduccion de hora
*/
class TimeBox extends Elemento
{
    public function __construct($id, string $clase)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html =
            "
            <div id=\"$id\" class=\"timeBox-Container $clase\" data-tipo=\"TimeBox\">
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
        patron de diseño para crear un timeBox con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase
        );

        return $boton;
    }

    function renderizar()
    {

        return $this->html;
    }
}
?>