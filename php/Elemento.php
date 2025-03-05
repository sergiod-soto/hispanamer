<?php



/*
 *   un elemento es un objeto abstracto. puede ser desde una caja de escritura o
 *   un icono, hasta un cuadrado divisor.
 */
abstract class Elemento implements IRenderizable
{

    public $html;
    public $id;
    public $visible;
    public $elementoPadre;
    public $clase;
    public $siguienteFoco;
    public static $idElemento = 0;


    function __construct($id, string $clase, $elementoPadre, $html)
    {
        $this->id = $id;
        $this->clase = $clase;
        $this->siguienteFoco = null;                // por defecto, no hay siguiente foco
        $this->visible = true;                      // por defecto es visible
        $this->elementoPadre = $elementoPadre;
        $this->html = $html;
    }

    public static function getNewId()
    {
        return "id_" . Elemento::$idElemento++;
    }

    abstract public function renderizar();
}
?>