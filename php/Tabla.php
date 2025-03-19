<?php

/*
    clase para generar una tabla



    HAY UN BUG QUE PROBOCA QUE, EN CASO DE NO SER FILA Y COLUMNA == 0 EN EL CONSTRUCTOR,
    EL PROGRAMA SE ROMPE INCLUSO CUANDO AL VALER $FILA == 0 Y $COLUMNA == 0.
    
    SI EL 0 ES VALOR POR REFERENCIA SE ROMPE

*/
class Tabla extends Elemento
{

    public $cabecera;
    public $datos;
    public $filas;

    // variable para el id de las filas de la tabla
    public static $idFila = 0;

    public function __construct($id, string $clase, array $cabecera, array $datos, $fila, $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            "",
            $fila,
            $columna
        );

        $this->cabecera = $cabecera;
        $this->datos = $datos;
    }

    /*
        patron de diseño para crear una tabla con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, array $cabecera, array $datos, $fila, $columna)
    {
        //////////////////////////////////////////////////////////////////////
        //
        //  inicio programacion defensiva
        //

        /*
            comprobamos que la tabla contenga datos
        */
        if (count($datos) <= 0) {
            throw new Exception("Matriz de datos vacia");
        }
        if (gettype($datos[0]) != "array") {
            throw new Exception("Datos es un array, no una matriz");
        }
        if (count($datos[0]) < 1) {
            throw new Exception("Matriz de datos vacia");
        }

        /*
           comprobamos que la cabecera contenga datos
        */
        if (count($cabecera) < 1) {
            throw new Exception("Cabecera vacia");
        }

        /*
            comprobamos que la matriz de datos sea rectangular
        */
        for ($i = 0; $i < count($datos); $i++) {
            if (count($datos[0]) != count($datos[$i])) {
                throw new Exception(
                    "Matriz de datos no rectangular, error en fila [0] ó [$i] creando la tabla"
                );
            }
        }

        /* 
            comprobamos que la longitud de la cabecera
            y del numero de columnas de los datos concuerde
        */
        if (count($cabecera) != count($datos[0])) {
            throw new Exception(
                "Discrepancia entre la longitud de la cabecera (" . count($cabecera) .
                ") y el número de columnas (" . count($datos[0]) . ")"
            );
        }

        //
        //  fin programacion defensiva
        //
        //////////////////////////////////////////////////////////////////////



        // genero las filas
        $filas = [];

        foreach ($datos as $fila) {

            // creo la fila de celdas
            $columnas = [];
            foreach ($fila as $elemento) {
                $columnas[] = Tabla_Celda::crear(
                    "",
                    "",
                    $elemento,
                );
            }
            $filas[] = Tabla_Fila::crear(          // creo nueva fila y la guardo
                "",
                "",                         // por defecto, las filas no tienen clase, se pueden recorrer y anhadirseles a posteriori
                $columnas,
            );

        }

        // Crea la tabla
        $tabla = new self(
            $id,
            $clase,
            $cabecera,
            $datos,
            0,
            0
        );

        $tabla->filas = $filas;




        return $tabla;
    }


    function renderizar()
    {
        // preparo las columnas
        $htmlFilas = "";

        foreach ($this->filas as $fila) {
            $htmlFilas .= $fila->renderizar();
        }

        $cabecera = $this->cabecera;


        $htmlCabecera = "<div id =\"cabecera$this->id\" class=\"cabeceraTabla $this->id\">";

        for ($i = 0; $i < count($this->cabecera); $i++) {
            $htmlCabecera .= "<div>";

            if (is_string($cabecera[$i])) {
                $htmlCabecera .= $cabecera[$i];

            } elseif (is_int($cabecera[$i])) {
                $htmlCabecera .= (string) $cabecera[$i] . "</td>";

            } elseif (is_object($cabecera[$i]) && method_exists($cabecera[$i], 'renderizar')) {
                $htmlCabecera .= $cabecera[$i]->renderizar() . "</td>";

            } else {
                $htmlCabecera .= "$cabecera[$i]" . "</td>";
            }
            $htmlCabecera .= "</div>";
        }



        $htmlCabecera .= "</div>";
        //
        $html = "
                    <div id=\"$this->id\" class=\"div-tabla-$this->id table-container\" data-tipo=\"Tabla\">
                        $htmlCabecera
                        <div id=\"tabla-scroll-$this->id\" class=\"tabla-scroll\">
                        <table class=\"$this->clase\"
                ";

        // obtengo id para cada cabecera
        $cabeceraId = [];
        for ($i = 0; $i < count($this->cabecera); $i++) {
            $cabeceraId[] = Elemento::getNewId();
        }


        // anhado el <colgroup>
        $html .= "<colgroup>";
        for ($i = 0; $i < count($cabeceraId); $i++) {
            $html .= "<col id=\"col-$i-tabla-$this->id\" class=\"col-$i tabla-$this->id\">";
        }
        $html .= "</colgroup>";













        // anhado el cuerpo
        $html .= $htmlFilas . "</table></div></div>";

        return $html;
    }
    public static function getIdFila()
    {
        return Tabla::$idFila++;
    }

    /**
     * pasa de      
     *              [
     *                  [a,b],
     *                  [c,d]
     *              ] 
     * a            
     *              [
     *                  [0,a,b],
     *                  [1,c,d]
     *              ]
     * 
     * @param mixed $matriz
     * @return array[]
     */
    public static function addId($matriz, $offSet)
    {
        $matriz_con_indices = [];

        // Recorrer cada fila de la matriz original
        foreach ($matriz as $indice => $fila) {
            // Añadir el índice al inicio de la fila
            array_unshift($fila, ($indice + $offSet));
            // Añadir la fila modificada a la matriz resultante
            $matriz_con_indices[] = $fila;
        }
        return $matriz_con_indices;
    }
}
?>