<?php

/*

*/
class Texto extends Elemento implements IRenderizable
{
    public function __construct($id, string $clase, string $text, $fila, $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $text,
            $fila,
            $columna
        );
    }

    public static function crear($id, string $clase, string $text, $fila, $columna)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase,
            $text,
            $fila,
            $columna
        );

        return $texto;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>