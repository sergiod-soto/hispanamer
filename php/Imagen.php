<?php

/*
    imagen estatica. 
*/
class Imagen extends Elemento
{
    public function __construct($id, string $clase, $imagen, int $fila, int $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html = "<img id=\"$id\" class=\"$clase\" $imagen->value>";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
            $fila,
            $columna
        );
    }

    /*
        patron de diseño para crear una imagen
    */
    public static function crear($id, string $clase, $imagen, $fila, $columna)
    {
        // Crea la imagen
        $imagen = new self(
            $id,
            $clase,
            $imagen,
            $fila,
            $columna
        );

        return $imagen;
    }


    public function renderizar()
    {
        return $this->html;
    }
}
?>