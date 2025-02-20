<?php

/*

*/
abstract class Estilos
{
    public static $estilos;

    public function __construct()
    {
        $this->estilos = [];

        // estilo 1
        $this->estilos[""] = new Estilo();

        // estilo 2
        $this->estilos[""] = new Estilo();
    }
}
?>