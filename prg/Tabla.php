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

    public function __construct($id, string $clase, $cabecera, $datos, $padre)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            null,
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
    public static function crear($id, string $clase, $cabecera, $datos, $funcionCeldas, $padre)
    {
        /* 
            comprobamos que la longitud de la cabecera
            y del numero de columnas de los datos concuerde
        */
        if (count($cabecera) != count($datos[0])) {
            throw new Exception(
                "Discrepancia entre la longitud de la cabecera (" . count($cabecera) .
                " y el número de columnas (" . count($datos[0]) . ")"
            );
        }

        // genero las filas
        $filas = [];

        foreach ($datos as $fila) {

            // creo la fila de celdas
            $columnas = [];
            foreach ($fila as $elemento) {
                $columnas[] = Tabla_Celda::crear(
                    Elemento::getNewId(),
                    "",
                    $elemento,
                    $funcionCeldas,
                    null,
                );
            }
            $filas[] = Tabla_Fila::crear(          // creo nueva fila y la guardo
                Elemento::getNewId(),
                "",                         // por defecto, las filas no tienen clase, se pueden recorrer y anhadirseles a posteriori
                $columnas,
                null,
            );

        }

        // Crea la tabla
        $tabla = new self(
            $id,
            $clase,
            $cabecera,
            $datos,
            $padre,
        );

        $tabla->filas = $filas;

        // paso la tabla a las filas previamente creadas 
        for ($i = 0; $i < count($filas); $i++) {
            $filas[$i]->setTabla($tabla);

            // paso la fila y la tabla a las celdas previamente creadas
            for ($j = 0; $j < count($filas[$i]->columnas); $j++) {
                $filas[$i]->columnas[$j]->setFila($filas[$i]);
                $filas[$i]->columnas[$j]->setTabla($tabla);
            }
        }

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