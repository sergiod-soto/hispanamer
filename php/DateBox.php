<?php

/*
    introduccion de fecha
*/
class DateBox extends Elemento implements Input
{
    public $sigTab = null;

    public function __construct($id, $clase, $placeHolder, $sigTab, $modo, $padre)
    {
        if ($clase == null) {
            $clase = "";
        }


        $html =
            "
            <span class=\"datepicker-container\" id=\"$id\" data-tipo=\"DateBox\">
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
    public static function crear($id, string $clase, $placeHolder, $sigTab, $padre)
    {
        // Crea el dateBox
        $dateBox = new self(
            $id,
            $clase,
            $placeHolder,
            $sigTab,
            null,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $dateBox);

        // Asigna el modo al botón
        $dateBox->setModo($modo);

        return $dateBox;
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
    public function renderizar()
    {
        return $this->html;
    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}


?>