<?php

/*

*/
class Texto extends Elemento implements IRenderizable
{
    public function __construct($id, string $clase, string $text)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $text,
        );
    }

    public static function crear($id, string $clase, string $text)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase,
            $text,
        );

        return $texto;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>