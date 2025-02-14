<?php

/*

*/
abstract class Estilos
{
    public function __construction()
    {
        $estilos[""] = "";

    }

    public function estilo1()
    {
        $estilo = new Estilo();
        $estilo->font = new Font();





        // return $this->estilos[""];
    }
}
?>