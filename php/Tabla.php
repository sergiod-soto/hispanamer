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

    // variable para el id de las filas de la tabla
    public static $idFila = 0;

    public function __construct($id, string $clase, array $cabecera, array $datos, $padre)
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
    public static function crear($id, string $clase, array $cabecera, array $datos, $padre)
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
                    null,
                );
            }
            $filas[] = Tabla_Fila::crear(          // creo nueva fila y la guardo
                "",
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
    function setVisible($visible)
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

        $html = "<span class=\"tabla-contenedor\"><div class=\"tabla-scroll\"><table id=\"$this->id\"";
        if ($this->clase != null && $this->clase != "") {
            $html .= " class=\"$this->clase\">";
        }

        // obtengo id para cada cabecera
        $cabeceraId = [];
        for ($i = 0; $i < count($this->cabecera); $i++) {
            $cabeceraId[] = Elemento::getNewId();
        }


        // anhado el <colgroup>
        $html .= "<colgroup>";
        for ($i = 0; $i < count($cabeceraId); $i++) {
            $html .= "<col id=\"" . $cabeceraId[$i] . "\">";
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
            $html .= "<th><div class = \"div_borde_cabecera\">";
            if (is_string($cabecera)) {
                $html .= $cabecera . "</td>";
            } else {
                if (is_object($cabecera) && method_exists($cabecera, 'renderizar')) {
                    $html .= $cabecera->renderizar() . "</td>";
                } else {
                    $html .= "[NULL]" . "</td>";
                }
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
        $html .= $htmlFilas . "</table></div></span>";

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

    public static function getIdFila()
    {
        return Tabla::$idFila++;
    }
}

?>