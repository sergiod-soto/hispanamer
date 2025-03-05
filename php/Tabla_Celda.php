<?php

/*
    clase interna de Tabla
*/
class Tabla_Celda extends Elemento
{

    public $contenido;
    public $funcion;
    public $tabla;

    public function __construct($id, string $clase, $elemento, $padre)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            "",
        );
        $this->tabla = null;
        $this->contenido = $elemento;
    }


    /*
        patron de diseño para crear una celda con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $elemento, $padre)
    {
        // Crea la celda
        $tabla_celda = new self(
            $id,
            $clase,
            $elemento,
            $padre,
        );

        return $tabla_celda;
    }


    public function setFila($fila)
    {
        $this->elementoPadre = $fila;
    }
    public function setTabla($tabla)
    {
        $this->tabla = $tabla;
    }

    function renderizar()
    {
        $html = "<td class=\"$this->clase\">";

        if (is_string($this->contenido)) {
            return $html .= $this->contenido . "</td>";
        }
        if (is_int($this->contenido)) {
            return $html .= (string) $this->contenido . "</td>";
        }
        if (is_object($this->contenido) && method_exists($this->contenido, 'renderizar')) {
            return $html .= $this->contenido->renderizar() . "</td>";
        }
        return $html .= "[NULL]" . "</td>";
    }
}
?>