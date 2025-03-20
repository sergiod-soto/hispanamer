<?php

/**
 * 
 */

class Desplegable extends Elemento
{
    public function __construct($id, string $clase)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html =
            "
            <div id=\"contextMenu\" class=\"context-menu\">
                <ul>
                    <li onclick=\"copyProperties()\">Copiar Propiedades</li>
                    <li onclick=\"pasteProperties()\">Pegar Propiedades</li>
                </ul>
            </div>
            ";

        parent::__construct($id, $clase, $html, 0, 0);

    }
    public static function crear($id, string $clase)
    {
        // Crea el checkBox
        $desplegable = new self(
            $id,
            $clase
        );

        return $desplegable;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>