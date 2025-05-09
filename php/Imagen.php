<?php

/*
    imagen estatica. 
*/
class Imagen extends Elemento
{
    public function __construct($id, string $clase, $imagen)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        //echo ($imagen);
        $html = "<img id=\"$id\" class=\"$clase\" src=$imagen->value>";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html
        );
    }

    /*
        patron de diseño para crear una imagen
    */
    public static function crear($id, string $clase, $image)
    {
        // Crea la imagen
        $imagen = new self(
            $id,
            $clase,
            $image
        );

        return $imagen;
    }


    public function renderizar()
    {
        return $this->html;
    }
}
?>