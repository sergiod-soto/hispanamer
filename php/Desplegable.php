<?php

/**
 * 
 */

class Desplegable extends Elemento
{
    public static $contador = 0;

    public function __construct(string $clase, $etiquetas, $funciones)
    {
        if (count($etiquetas) != count($funciones)) {
            throw new Exception(
                "Longitud etiquetas (" . count($etiquetas) .
                ") != longitud funciones(" . count($funciones) . ")"
            );
        }
        $htmlLi = "";
        for ($i = 0; $i < count($etiquetas); $i++) {
            $htmlLi .= "<li onclick=\"$funciones[$i]\">$etiquetas[$i]</li>";
        }

        $id = "desplegableid_" . Desplegable::$contador++;
        $html =
            "
            <div id=\"$id\" class=\"context-menu\">
                <ul>
                    $htmlLi
                </ul>
            </div>
            ";

        parent::__construct($id, $clase, $html, Desplegable::$contador, 9999);

    }
    public static function crear(string $clase, $etiquetas, $funciones)
    {
        // Crea el checkBox
        $desplegable = new self(
            $clase,
            $etiquetas,
            $funciones
        );

        return $desplegable;
    }

    function renderizar()
    {
        return $this->html;
    }
}
?>