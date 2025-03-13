<?php

/*
    checkbox, funciona como un interruptor
*/
class CheckBox extends Elemento
{
    public function __construct($id, string $clase, $text, $name, $value, $fila, $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html =
            "
            <input type='checkbox' id='$id' data-tipo=\"CheckBox\"
            ";
        if ($clase != null && $clase != "") {
            $html .= " class=\"$clase\"";
        }
        $html .=
            "
            name='$name' value='$value'>
            <label for='$id'>$text</label>
            ";

        parent::__construct($id, $clase, $html, $fila, $columna);

    }
    public static function crear($id, string $clase, $text, $name, $value, $fila, $columna)
    {
        // Crea el checkBox
        $checkBox = new self(
            $id,
            $clase,
            $text,
            $name,
            $value,
            $fila,
            $columna
        );

        return $checkBox;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>