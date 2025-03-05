<?php

/*

*/
class Texto extends Elemento implements IRenderizable
{
    public $text;

    public function __construct($id, string $clase, string $text, $padre)
    {
        $this->text = $text;
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            $text,
        );
    }

    public static function crear($id, string $clase, string $text, $padre)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase,
            $text,
            $padre,
        );

        return $texto;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>