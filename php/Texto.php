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
        $html = "<div id=\"$id\" class=\"$clase\" data-tipo=\"Texto\">$text</div>";
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
            $fila,
            $columna
        );
    }

    public static function crear($id, string $clase, string $text, int $fila, int $columna)
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