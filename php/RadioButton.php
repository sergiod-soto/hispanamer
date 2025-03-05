<?php

enum PosicionTexto: string
{
    case izquierda = "izquierda";
    case derecha = "derecha";
}

class RadioButton extends Elemento
{


    public $labels;
    public $horizontal;

    function __construct($id, $labels, $name, $values, $default, $posicionTexto, $clase, $padre)
    {
        if ($default == null || $default == "") {
            $default = 0;
        }
        if (count($labels) != count($values)) {
            throw new Exception("número de etiquetas (" . count($labels) . ")" .
                " y valores (" . count($values) . ") debe ser igual.");
        }
        if ($default >= count($values)) {
            throw new Exception("RadioButton (name: $name) default: $default, count(\$values): " .
                count($values) . " (\$default maximo: " . count($values) - 1 . ")");
        }

        // preparo el html de cada elemento
        $htmlRadios = "";

        $checked = "";
        $labelIzq = "";
        $labelDer = "";

        for ($i = 0; $i < count($labels); $i++) {
            if ($posicionTexto == PosicionTexto::derecha) {
                $labelDer = $labels[$i];
            } else {
                $labelIzq = $labels[$i];
            }
            if ($i == $default) {
                $checked = "checked";
            } else {
                $checked = "";
            }
            $htmlRadios .=
                "
                <label>$labelIzq<input type=\"radio\" class=\"selector\" 
                name=\"$name\" value=\"" . $values[$i] . "\" $checked>$labelDer</label>
                ";
        }

        $html =
            "
            <span id= \"$id\" class=\"$clase spanRadioButton\" data-tipo=\"RadioButton\">
                <form id=\"form_$id\">
                    $htmlRadios
                </form>
            </span>
            ";
        ///////////////////////////////////////////














        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            $html
        );


    }

    /*
        patron de diseño para crear un radioButton con modo creado, el cual con el propio radioButton
        y evitar dependencia circular
    */
    public static function crear($id, $labels, $name, $values, $default, $posicionTexto, string $clase, $padre)
    {
        // Crea el botón
        $radioButton = new self(
            $id,
            $labels,
            $name,
            $values,
            $default,
            $posicionTexto->value,
            $clase,
            $padre,
        );

        return $radioButton;
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