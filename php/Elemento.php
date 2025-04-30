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
    public $fila;
    public $columna;

    // contador para la gestion de ids de los
    public static $idElemento = 0;


    function __construct($id, string $clase, $html, int $fila, int $columna)
    {
        $this->id = $id;
        $this->clase = $clase;
        $this->html = $html;
        $this->fila = $fila;
        $this->columna = $columna;
    }

    public static function getNewId()
    {
        return "id_" . Elemento::$idElemento++;
    }

    abstract public function renderizar();
}
?>