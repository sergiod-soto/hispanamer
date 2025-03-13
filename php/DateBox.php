<?php

/*
    introduccion de fecha
*/
class DateBox extends Elemento
{
    public function __construct($id, $clase, $placeHolder, $fila, $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html =
            "
            <div class=\"datepicker-container\" id=\"$id\" data-tipo=\"DateBox\">
                <input type=\"text\" class=\"fechaInput\" readonly placeholder=$placeHolder>
                <div class=\"calendar\">
                    <div class=\"calendar-header\">
                        <select class=\"monthSelect\"></select>
                        <select class=\"yearSelect\"></select>
                    </div>
                    <div class=\"days-container\"></div>
                    <div class=\"calendar-footer\">
                        <button class=\"btnHoy\">Hoy</button>
                    </div>
                </div>
            </div>
            ";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
            $fila,
            $columna
        );
    }

    /*
       patron de diseño para crear un boton con modo creado, el cual con el propio boton
       y evitar dependencia circular
   */
    public static function crear($id, string $clase, $placeHolder, $fila, $columna)
    {
        // Crea el dateBox
        $dateBox = new self(
            $id,
            $clase,
            $placeHolder,
            $fila,
            $columna
        );

        return $dateBox;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>