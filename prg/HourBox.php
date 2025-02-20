<?php

/*

*/
class HourBox extends Elemento
{

    public $date;

    public function __construct($id, $clase, $modo, $padre)
    {
        $html =
            "
            <input type='text' id='timeInput" . $id . "' placeholder='h/min' readonly>
            <input type='time' id='timePicker" . $id . "'>
            ";

        $this->date = null;

        parent::__construct($id, $clase, $modo, $padre, $html);
    }

    public static function crear($id, string $clase, $padre)
    {
        // Crea el botón
        $checkBox = new self(
            $id,
            $clase,
            null,
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
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }

    public function setTime($time)
    {
        $this->date = $time;
    }
    public function getTime()
    {
        if ($this->date == null) {
            return null;
        }
        try {
            return date("H:i", $this->date);
        } catch (Exception $e) {
            throw new Exception("Error procesando la hora");
        }
    }

    public function hide()
    {

    }
    function renderizar()
    {
        return $this->html;
    }
    public function show()
    {

    }
    function setVisible($visible){

    }
}
?>