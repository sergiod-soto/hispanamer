<?php

/*
    checkbox, funciona como un interruptor
*/
class ChechBox extends Elemento implements Input
{

    private $text;
    private $value;

    public function __construct($id, $clase, $text, $value, $modo, $padre)
    {
        $html = "<input type='checkbox' id='$id' name='$value' value='$text'>";
        $this->text = $text;
        $this->value = $value;

        parent::__construct($id, $clase, $modo, $padre, $html);

    }
    public function crear($id, $clase, $text, $value, $modo, $padre)
    {
        // Crea el botón
        $checkBox = new self(
            $id,
            $clase,
            $text,
            $value,
            $modo,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $checkBox);

        // Asigna el modo al botón
        $checkBox->setModo($modo);

        return $checkBox;
    }

    public function getText()
    {
        return $this->text;
    }
    public function setText($text)
    {
        $this->text = $text;
        $this->html = "<input type='checkbox' id='$this->id' name='$this->value' value='$text'>";
    }


    function hide()
    {

    }
    function show()
    {

    }
    function setEditableOn()
    {

    }
    function setEditableOff()
    {

    }
    function summit()
    {

    }
}
?>