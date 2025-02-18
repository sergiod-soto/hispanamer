<?php

class PasswordBox extends Elemento
{

    public $input;

    public function __construct($id, string $clase, $modo, $text, $funcion, $padre, $minLength)
    {
        $html =
            "
            <label for='$id'>$text</label>
            <input type='password' id='$id' class='$clase' name='$id' minlength='$minLength'>
            ";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $html,
        );
    }
    public function renderizar()
    {

    }
    public function hide()
    {

    }
    public function show()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}
?>