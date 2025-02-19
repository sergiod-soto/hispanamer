<?php

/*
    clase interna de Tabla
*/
class Tabla_Celda extends Elemento
{

    public $contenido;
    public $funcion;
    public $tabla;

    public function __construct($id, string $clase, $elemento, $funcion, $padre)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            null,
            $padre,
            "",
        );
        $this->tabla = null;
        $this->contenido = $elemento;
        $this->funcion = $funcion;
    }


    /*
        patron de diseño para crear una celda con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $elemento, $funcion, $padre)
    {
        // Crea la celda
        $tabla_celda = new self(
            $id,
            $clase,
            $elemento,
            $funcion,
            $padre,
        );

        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando la celda en el constructor
        $modo = new Modo($modoPadre, $tabla_celda);

        // Asigna el modo al botón
        $tabla_celda->setModo($modo);

        return $tabla_celda;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
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
        $html = "<td";

        // anhado clase
        if ($this->clase != null && $this->clase != "") {
            $html .= " class=\"$this->clase\" ";
        }
        if (is_string($this->contenido)) {
            $html .= ">" . $this->contenido . "</td>";
        }
        if (is_object($this->contenido) && method_exists($this->contenido, 'renderizar')) {
            $html .= ">" . $this->contenido->renderizar() . "</td>";
        }


        return $html;
    }
    function hide()
    {

    }
    function show()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}
?>