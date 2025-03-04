<?php

/*
    checkbox, funciona como un interruptor
*/
class CheckBox extends Elemento implements Input
{

    public $text;
    public $value;
    public $sigTab;

    public function __construct($id, string $clase, $text, $name, $value, $sigTab, $modo, $padre)
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

        parent::__construct($id, $clase, $modo, $padre, $html);

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
            null,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el checkBox en el constructor
        $modo = new Modo($modoPadre, $checkBox);

        // Asigna el modo al checkBox
        $checkBox->setModo($modo);

        return $checkBox;
    }
    public function setModo($modo)
    {
        $this->modo = $modo;
    }

    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }

    public function getText()
    {
        return $this->text;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>