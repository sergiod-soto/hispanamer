<?php

/*
    clase interna de Tabla
*/
class Tabla_Fila extends Elemento
{

    public $datos;
    public $columnas;

    public function __construct($id, string $clase, $modo, $datos, $columnas, $padre)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            "",
        );

        $this->datos = $datos;
        $this->columnas = $columnas;
    }

    /*
        patron de diseño para crear una fila con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $modo, $datos, $columnas, $padre)
    {
        // Crea el botón
        $tabla_fila = new self(
            $id,
            $clase,
            null,
            $datos,
            $columnas,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando la fila en el constructor
        $modo = new Modo($modoPadre, $tabla_fila);

        // Asigna el modo al botón
        $tabla_fila->setModo($modo);

        return $tabla_fila;
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
        // preparo la fila
        $htmlFila = "";

        foreach ($this->columnas as $celda) {
            $htmlFila .= $celda->renderizar();
        }
        //

        $html = "<tr";
        if ($this->clase != null && $this->clase != "") {
            $html .= " class=\"$this->clase\" ";
        }
        $html .= ">" . $htmlFila . "</tr>";

        return $html;
    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}
?>