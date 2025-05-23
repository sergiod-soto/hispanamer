<?php

class NoteBox extends Elemento
{
    public function __construct($id, string $clase, $text, $placeholder, $titulo)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $tituloHtml = "";
        if ($titulo != null && $titulo != "") {
            $tituloHtml = "<label for=\"$id\">$titulo</label><br>";
        }
        $html =
            "
            $tituloHtml
            <textarea id=\"$id\" placeholder=\"$placeholder\" class=\"textbox-multiline $clase\" data-tipo=\"NoteBox\">$text</textarea>
            ";


        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html
        );
    }

    /*
           patron de diseño para crear un noteBox con modo creado, el cual con el propio noteBox
           y evitar dependencia circular
       */
    public static function crear($id, string $clase, $text, $placeholder, $titulo)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        
        // Crea el noteBox
        $noteBox = new self(
            $id,
            $clase,
            $text,
            $placeholder,
            $titulo
        );

        return $noteBox;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>