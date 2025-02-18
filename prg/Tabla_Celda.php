<?php

/*
    clase interna de Tabla
*/
class Tabla_Celda extends Elemento
{

    public $contenido;
    public $funcion;

    public function __construct($id, string $clase, $modo, $elemento, $funcion, $padre)
    {



        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            null,
        );
        $this->contenido = $elemento;
        $this->funcion = $funcion;
    }


    /*
        patron de diseño para crear una celda con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $elemento, $funcion, $padre)
    {
        // Crea el botón
        $tabla_celda = new self(
            $id,
            $clase,
            null,
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


    function setEditableOff()
    {

    }
    function setEditableOn()
    {

    }
    function hide()
    {

    }
    function show()
    {

    }
    function renderizar()
    {
        $html = "<td";

        // anhado clase
        if ($this->clase != null && $this->clase != "") {
            $html .= " class=\"$this->clase\" ";
        }
        $html .= ">" . $this->contenido->renderizar() . "</td>";
        
        return $html;
    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}
?>