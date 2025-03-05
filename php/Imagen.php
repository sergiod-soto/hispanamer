<?php

/*
    imagen estatica. 
*/
class Imagen extends Elemento
{
    public function __construct($id, string $clase, $url, $alternateText, $padre)
    {
        $html = "<img src=\"$url\" alt=\"$alternateText\">";




        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            $html,
        );
    }

    /*
        patron de diseño para crear un boton con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $text, $funcion, $padre)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            $text,
            $funcion,
            $padre,
        );

        return $boton;
    }


    public function renderizar()
    {
        return $this->html;
    }
}
?>