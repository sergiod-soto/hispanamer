<?php

/*

*/
class Linea extends Elemento implements IRenderizable
{
    public function __construct($id, string $clase)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        $html = "<hr id=\"$id\" class=\"$clase\" data-tipo=\"Linea\">";
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html
        );
    }

    public static function crear($id, string $clase)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase
        );

        return $texto;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>