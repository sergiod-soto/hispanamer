<?php

class SelectBox extends Elemento
{


    public function __construct($id, string $clase, $name, array $valores, int $default, array $etiquetas)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        if (count($etiquetas) <= 0) {
            throw new Exception("array 'valores' vacío.");
        }

        for ($i = 0; $i < count($valores); $i++) {
            if (gettype($valores[$i]) == "integer") {
                $valores[$i] = (string) $valores[$i];
            }
        }
        for ($i = 0; $i < count($etiquetas); $i++) {
            if (gettype($etiquetas[$i]) == "integer") {
                $etiquetas[$i] = (string) $etiquetas[$i];
            }
        }

        $htmlOptions = "";
        for ($i = 0; $i < count($etiquetas); $i++) {
            $selected = "";
            if ($i == $default) {
                $selected .= " selected";
            }
            $htmlOptions .= "<option value=\"$valores[$i]\"$selected> $etiquetas[$i] </option>";

        }

        $html =
            "
            <form id=\"$id\" class=\"$clase\" data-tipo=\"SelectBox\">
                <select id=\"select$id\" name=\"$name\">
                    $htmlOptions
                </select>
            </form>
            ";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html
        );
    }

    /*
        patron de diseño para crear un SelectBox con modo creado, el cual con el propio SelectBox
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, string $name, array $valores, array $etiquetas, int $default)
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
            $name,
            $valores,
            $default,
            $etiquetas
        );

        return $selectBox;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>