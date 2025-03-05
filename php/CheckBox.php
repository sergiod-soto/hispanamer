<?php

/*
    checkbox, funciona como un interruptor
*/
class CheckBox extends Elemento
{

    public $text;
    public $value;
    public $sigTab;

    public function __construct($id, string $clase, $text, $name, $value, $sigTab, $padre)
    {
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

        $this->text = $text;
        $this->value = $value;
        $this->sigTab = $sigTab;

        parent::__construct($id, $clase, $padre, $html);

    }
    public static function crear($id, string $clase, $text, $name, $value, $sigTab, $padre)
    {
        // Crea el checkBox
        $checkBox = new self(
            $id,
            $clase,
            $text,
            $name,
            $value,
            $sigTab,
            $padre,
        );

        return $checkBox;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>