<?php


require_once "Programa.php";


/*
    Cuadro con elementos que se pone encima de todo e inabilita la interaccion con el
    resto del programa hasta que no se cierre
*/
class BoxOverlay extends Elemento
{
    public static $contador = 0;

    static function crearBoxOverlays($overlays)
    {
        return "
                    <div id=\"overlayBaseID\" class=\"overlay-hidden\" data-tipo=\"BoxOverlay\">
                        $overlays
                    </div>
                ";
    }

    public function __construct($id, string $clase, $htmlInterno, $fijo)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }
        $html = "
                    <div class=\"overlay-content content-hidden\" id=\"$id\" data-tipo=\"$fijo\">
                        $htmlInterno
                    </div>
                ";



        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $html,
            55965 + $this->contador++,
            52898
        );
    }

    /*
        
    */
    public static function crear($id, string $clase, $htmlInterno, $fijo)
    {
        // Crea el boxOverlay
        $boxOverlay = new self(
            $id,
            $clase,
            $htmlInterno,
            $fijo
        );

        return $boxOverlay;
    }

    /*
        retorna el html asociado
    */
    function renderizar()
    {
        return $this->html;
    }
}
?>