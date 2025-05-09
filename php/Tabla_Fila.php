<?php

// class autoloader
spl_autoload_register(function ($class_name) {
    $file = "php/" . $class_name . '.php';
    include_once $file;
});

/*
    clase interna de Tabla
*/
class Tabla_Fila extends Elemento
{

    public $columnas;

    public function __construct($id, string $clase, $columnas)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            ""
        );

        $this->columnas = $columnas;
    }

    /*
        patron de diseño para crear una fila con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $columnas)
    {
        // Crea la fila
        $tabla_fila = new self(
            $id,
            $clase,
            $columnas,
        );

        return $tabla_fila;
    }



    function renderizar()
    {
        // preparo la fila
        $htmlFila = "";

        foreach ($this->columnas as $celda) {
            $htmlFila .= $celda->renderizar();
        }
        //

        $html = "<tr id=\"idFila_" . Tabla::getIdFila() . "\"";
        if ($this->clase != null && $this->clase != "") {
            $html .= " class=\"$this->clase\" ";
        }
        $html .= ">" . $htmlFila . "</tr>";

        return $html;
    }
}
?>