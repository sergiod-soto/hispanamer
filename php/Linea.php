<?php

/*

*/
class Linea extends Elemento implements IRenderizable
{
    public function __construct($id, string $clase, $fila, $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        $html = "<hr id=\"$id\" class=\"$clase\" data-tipo=\"Linea\">";
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
            $fila,
            $columna
        );
    }

    public static function crear($id, string $clase, int $fila, int $columna)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase,
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