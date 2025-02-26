<?php

/*
    introduccion de fecha
*/
class DateBox extends Elemento implements Input, IEditable
{

    public function __construct($id, $clase, $placeHolder, $modo, $padre)
    {
        if ($clase == null) {
            $clase = "";
        }


        $html =
            "
            <div id = \"$id\" class=\"datepicker-container $clase\">
                <input type=\"text\" id=\"fechaInput\" readonly placeholder=\"$placeHolder\">
                <div class=\"calendar\" id=\"calendar\">
                    <select id=\"monthSelect\"></select>
                    <select id=\"yearSelect\"></select>
                    <div class=\"days-container\" id=\"daysContainer\"></div>
                </div>
            </div>
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
    public static function crear($id, string $clase, $placeHolder, $padre)
    {
        // Crea el dateBox
        $dateBox = new self(
            $id,
            $clase,
            $placeHolder,
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