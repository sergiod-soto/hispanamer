<?php

/*
    clase para generar una tabla


*/
class Tabla extends Elemento
{

    public $cabecera;
    public $datos;
    public $filas;

    // variable para el id de las filas de la tabla
    public static $idFila = 0;

    public function __construct($id, string $clase, array $cabecera, array $datos)
    {
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            "",
        );

        $this->cabecera = $cabecera;
        $this->datos = $datos;
    }

    /*
        patron de diseño para crear una tabla con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, array $cabecera, array $datos)
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
        //
        $html = "<div class=\" div-tabla-$this->id table-container\"><div class=\"tabla-scroll\"><table id=\"$this->id\"  class=\"$this->clase\"";

        // obtengo id para cada cabecera
        $cabeceraId = [];
        for ($i = 0; $i < count($this->cabecera); $i++) {
            $cabeceraId[] = Elemento::getNewId();
        }


        // anhado el <colgroup>
        $html .= "<colgroup>";
        for ($i = 0; $i < count($cabeceraId); $i++) {
            $html .= "<col id=\" $cabeceraId[$i] \">";
        }
        $html .= "</colgroup>";


        $html .= "<thead>";


        // anhado la cabecera
        $html .=
            "
            <tr>
            ";
        for ($i = 0; $i < count($this->cabecera); $i++) {
            $cabecera = $this->cabecera[$i];
            $html .= "<th><div class = \"div_borde_cabecera $i\">";

            if (is_string($cabecera)) {
                $html .= $cabecera . "</td>";

            } elseif (is_int($cabecera)) {
                $html .= (string) $cabecera . "</td>";

            } elseif (is_object($cabecera) && method_exists($cabecera, 'renderizar')) {
                $html .= $cabecera->renderizar() . "</td>";

            } else {
                $html .= "[NULL]" . "</td>";
            }


            if ($i == (count($this->cabecera) - 1)) {
                $html .= "<div class=\"resizer\" data-left-col=\"" . $cabeceraId[$i] . "\"></div></div></th>";
            } else {
                $html .= "<div class=\"resizer\" data-left-col=\"" . $cabeceraId[$i] .
                    "\" data-right-col=\"" . $cabeceraId[$i + 1] . "\"></div></div></th>";
            }
        }
        $html .=
            "
            </tr></div></thead>
            ";


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