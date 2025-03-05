<?php

enum PosicionTexto: string
{
    case izquierda = "izquierda";
    case derecha = "derecha";
}

class RadioButton extends Elemento
{
    function __construct($id, $labels, $name, $values, $default, $posicionTexto, $clase)
    {

        if (count($labels) != count($values)) {
            throw new Exception("número de etiquetas (" . count($labels) . ")" .
                " y valores (" . count($values) . ") debe ser igual.");
        }
        if ($default >= count($values)) {
            throw new Exception("RadioButton (name: $name) default: $default, count(\$values): " .
                count($values) . " (\$default maximo: " . count($values) - 1 . ")");
        }
        if ($default == null || $default == "") {
            $default = 0;
        }
        if ($posicionTexto == null || $posicionTexto == "") {
            $posicionTexto = PosicionTexto::izquierda;
        }

        // preparo el html de cada elemento
        $htmlRadios = "";

        for ($i = 0; $i < count($labels); $i++) {
            $checked = "";
            $labelIzq = "";
            $labelDer = "";

            if ($posicionTexto == PosicionTexto::derecha->value) {
                $labelDer = $labels[$i];
            } else {
                $labelIzq = $labels[$i];
            }

            if ($i == $default) {
                $checked = "checked";
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

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html
        );
    }

    /*
        patron de diseño para crear un radioButton con modo creado, el cual con el propio radioButton
        y evitar dependencia circular
    */
    public static function crear($id, $labels, $name, $values, $default, $posicionTexto, string $clase)
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
        );

        return $radioButton;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>