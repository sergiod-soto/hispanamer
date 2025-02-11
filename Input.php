<?php

/*
 *  --- version 8.1.0 de PHP ---
 *
 * clase usada para facilitar la creacion de elementos de entrada de datos
 */
class Input
{

    const Button = "";

    public function Input($nombreElemento)
    {
        echo self::$$nombreElemento;
    }

}


?>