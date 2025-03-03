<?php

class SelectBox extends Elemento implements Input, IEditable
{


    public function __construct($id, string $clase, $name, $modo, $valores, $default, $etiquetas, $padre)
    {

        $htmlDefault = "";
        if ($default != null) {
            $htmlDefault = $default;
        }

        $htmlOptions = "";
        for ($i = 0; $i < count($etiquetas); $i++) {
            if ($i == $default) {
                $htmlOptions .= "<option value=\"" . $valores[$i] . "\" selected>" . $etiquetas[$i] . "</option>";
            } else {
                $htmlOptions .= "<option value=\"" . $valores[$i] . "\">" . $etiquetas[$i] . "</option>";
            }
        }


        $html =
            "
            <form id=\"$id\" data-tipo=\"SelectBox\">
                <select id=\"select$id\" name=\"$name\">
                    $htmlOptions
                </select>
            </form>
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
        patron de diseño para crear un SelectBox con modo creado, el cual con el propio SelectBox
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $name, $valores, $etiquetas, int $default, $padre)
    {
        if (count($etiquetas) == 0) {
            throw new Exception("Error, no hay etiquetas.");
        }

        if ($valores == null || $valores == "" || $valores == []) {
            // no se han pasado valores, asi que toman el 
            // mismo valor que la etiqueta correspondiente
            $valores = $etiquetas;
        }

        // miramos que valores y etiquetas midan lo mismo
        if (count($valores) != count($etiquetas)) {
            throw new Exception("valores (" . count($valores) . ") y etiquetas (" .
                count($etiquetas) . ") deben tener la misma longitud.");
        }




        // Crea el botón
        $selectBox = new self(
            $id,
            $clase,
            null,
            $name,
            $valores,
            $default,
            $etiquetas,
            $padre,


        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el SelectBox en el constructor
        $modo = new Modo($modoPadre, $selectBox);

        // Asigna el modo al SelectBox
        $selectBox->setModo($modo);

        return $selectBox;
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