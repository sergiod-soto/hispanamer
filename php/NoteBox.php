<?php

class NoteBox extends Elemento
{
    public function __construct($id, string $clase, $text, $placeHolder, $titulo, $padre)
    {
        $tituloHtml = "";
        if ($titulo != null && $titulo != "") {
            $tituloHtml = "<label for=\"$id\">$titulo</label><br>";
        }
        $html =
            "
            $tituloHtml
            <textarea id=\"$id\" placeholder=\"$placeHolder\" class=\"textbox-multiline $clase\" data-tipo=\"NoteBox\">$text</textarea>
            ";


        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            $html,
        );
    }

    /*
           patron de diseño para crear un noteBox con modo creado, el cual con el propio noteBox
           y evitar dependencia circular
       */
    public static function crear($id, string $clase, $text, $placeHolder, $titulo, $padre)
    {
        // Crea el noteBox
        $noteBox = new self(
            $id,
            $clase,
            $text,
            $placeHolder,
            $titulo,
            $padre,
        );

        return $noteBox;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>