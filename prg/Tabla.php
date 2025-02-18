<?php

/*
    clase para generar una tabla


*/
class Tabla extends Elemento
{

    public $cabecera;
    public $datos;
    public $filas;
    public $filaSeleccionada;

    public function __construct($id, string $clase, $modo, $cabecera, $datos, $padre)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            "",
        );

        $this->cabecera = $cabecera;
        $this->datos = $datos;
    }

    /*
        patron de diseño para crear una tabla con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $modo, $cabecera, $datos, $padre)
    {
        // Crea el botón
        $tabla = new self(
            $id,
            $clase,
            null,
            $cabecera,
            $datos,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando la tabla en el constructor
        $modo = new Modo($modoPadre, $tabla);

        // Asigna el modo al botón
        $tabla->setModo($modo);

        return $tabla;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }

    function hide()
    {

    }
    function show()
    {

    }
    function renderizar()
    {
        // preparo las columnas
        $htmlFilas = "";
        foreach ($this->filas as $fila) {
            $htmlFilas .= $fila->renderizar();
        }
        //

        $html = "<table";
        if ($this->clase != null && $this->clase != "") {
            $html .= " class=\"$this->clase\" ";
        }

        $html .= ">" . $htmlFilas . "</table>";
        
        return $html;
    }
    function setEditableOff()
    {
        return;
    }
    function setEditableOn()
    {
        return;
    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}

?>