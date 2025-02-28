<?php

/*
    checkbox, funciona como un interruptor
*/
class CheckBox extends Elemento implements Input, IEditable
{

    public $text;
    public $value;

    public function __construct($id, string $clase, $text, $name, $value, $modo, $padre)
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

        parent::__construct($id, $clase, $modo, $padre, $html);

    }
    public static function crear($id, string $clase, $text, $name, $value, $padre)
    {
        // Crea el botón
        $checkBox = new self(
            $id,
            $clase,
            $text,
            $name,
            $value,
            null,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $checkBox);

        // Asigna el modo al checkBox
        $checkBox->setModo($modo);

        return $checkBox;
    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }

    public function getText()
    {
        return $this->text;
    }
    public function setText(string $text)
    {
        $this->text = $text;
        $this->html = "<input type='checkbox' id='$this->id' name='$this->value' value='$text'>";
    }

    public function renderizar()
    {
        return $this->html;
    }

    function setEditableOn()
    {

    }
    function setEditableOff()
    {

    }


}
?>