<?php

enum PosicionTexto: string
{
    case IZQUIERDA = "IZQUIERDA";
    case DERECHA = "DERECHA";
}

class RadioButton extends Elemento
{
    public $contador = 0;
    function __construct($id, $labels, $name, $values, $default, $posicionTexto, $clase, int $fila, int $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

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
            $posicionTexto = PosicionTexto::IZQUIERDA;
        }

        $this->contador = 0;

        // preparo el html de cada elemento
        $htmlRadios = "";

        for ($i = 0; $i < count($labels); $i++) {
            $checked = "";
            $labelIzq = "";
            $labelDer = "";

            if ($posicionTexto == PosicionTexto::DERECHA->value) {
                $labelDer = $labels[$i];
            } else {
                $labelIzq = $labels[$i];
            }

            if ($i == $default) {
                $checked = "checked";
            }

            $htmlRadios .=
                "
                <label>$labelIzq<input type=\"radio\" id=\"rb_" . $id . "_" . $this->contador++ . "\" class=\"selector\" 
                name=\"$name\" value=\"" . $values[$i] . "\" $checked>$labelDer</label>
                ";
        }

        $html =
            "
            <div id=\"$id\" class=\"$clase divRadioButton\" data-tipo=\"RadioButton\">
                <form id=\"form_$id\">
                    $htmlRadios
                </form>
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
        patron de diseño para crear un radioButton con modo creado, el cual con el propio radioButton
        y evitar dependencia circular
    */
    public static function crear($id, $labels, $name, $values, $default, $posicionTexto, string $clase, $fila, $columna)
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
            $fila,
            $columna
        );

        return $radioButton;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>