<?php


enum Target: string
{
    case Self = "_self";     // - Default. Opens the document in the same window/tab as it was clicked (por defecto)
    case Blank = "_blank";    // - Opens the document in a new window or tab (Nueva pestaña/ventana)
    case Parent = "_parent";   // - Opens the document in the parent frame (No rompe iframe)
    case Top = "_top";      // - Opens the document in the full body of the window (machacar la pagina, rompe iframe)

}

/*
    Elemento el cual, al hacer clic, ejecuta una funcion
*/

class Link extends Elemento
{
    public $url;
    public $elementoInterno;
    public $titulo;

    public function __construct($id, string $clase, $url, Target $target, $elementoInterno, $titulo, $modo, $padre)
    {
        $contenido = "";
        if (is_string($elementoInterno)) {
            $contenido .= $elementoInterno . "</td>";

        } elseif (is_int($elementoInterno)) {
            $contenido .= (string) $elementoInterno . "</td>";

        } elseif (is_object($elementoInterno) && method_exists($elementoInterno, 'renderizar')) {
            $contenido .= $elementoInterno->renderizar() . "</td>";

        } else {
            throw new Exception("Link vacío. \$elementoInterno: $elementoInterno");
        }

        $html =
            "
            <a href=\"$url\" target=\"$target->value\" title=\"$titulo\">
                $contenido
            </a>
            ";

        $this->url = $url;
        $this->elementoInterno = $elementoInterno;

        parent::__construct($id, $clase, $modo, $padre, $html);

    }
    public static function crear($id, string $clase, $url, $target, $elementoInterno, $titulo, $padre)
    {
        // Crea el Link
        $link = new self(
            $id,
            $clase,
            $url,
            $target,
            $elementoInterno,
            $titulo,
            null,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el Link en el constructor
        $modo = new Modo($modoPadre, $link);

        // Asigna el modo al Link
        $link->setModo($modo);

        return $link;
    }

    function hide()
    {

    }
    function show()
    {

    }
    public function renderizar()
    {
        return $this->html;
    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}

?>