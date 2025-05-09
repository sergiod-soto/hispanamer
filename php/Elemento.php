<?php



/*
 *   un elemento es un objeto abstracto. puede ser desde una caja de escritura o
 *   un icono, hasta un cuadrado divisor.
 */
abstract class Elemento implements IRenderizable
{

    public $html;
    public $id;
    public $clase;


    // contador para la gestion de ids de los
    public static $idElemento = 0;


    function __construct($id, string $clase, $html)
    {
        $this->id = $id;
        $this->clase = $clase;
        $this->html = $html;
    }

    public static function getNewId()
    {
        return "id_" . Elemento::$idElemento++;
    }

    abstract public function renderizar();
}
?>