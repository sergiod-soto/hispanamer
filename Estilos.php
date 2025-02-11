<?php

abstract class Estilos
{

    private $estilos = array();

    public function __construction()
    {
        $estilos[""] = "";

    }

    public function estilo1()
    {
        return $this->estilos[""];
    }
}
?>