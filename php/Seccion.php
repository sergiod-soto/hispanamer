<?php

/*
 *  una seccion es un elemento que sirve para dividir el programa.
 *  es invisible por defecto pero se le puede anhadir borde 
 *  modificando el html.
 * 
 *  puede contener cualquier otro tipo de "Elemento", incluyendo otras secciones.
 */
class Seccion extends Elemento
{
    public $elementos;


    public function __construct($id, $clase, $fila, $columna)
    {
        if ($id == null || $id == "") {
            $id = Elemento::getNewId();
        }

        $html = "";
        parent::__construct(
            $id,
            $clase,
            $html,
            $fila,
            $columna
        );
        $this->elementos = [];
    }

    /*  
        patron de diseño para crear una seccion con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $fila, $columna)
    {
        // Crea la seccion
        $seccion = new self(
            $id,
            $clase,
            $fila,
            $columna
        );

        return $seccion;
    }

    /**
     * Anhade un Elemento a la Seccion
     * @param Elemento[]|Elemento $elementos
     * @param int $fila
     * @param int $columna
     */
    function add($elementos)
    {


        if (count($elementos) == 0) {
            throw new Exception("Se ha intentado anhadir un elemento, pero no se ha encontrado ninguno");
        }



        // echo $elementos;
        // echo("<br>");
        // echo count($elementos);
        // echo("<br>");
        // var_dump($elementos[0]);
        // echo("<br>");




        for ($i = 0; $i < count($elementos); $i++) {
            $elemento = $elementos[$i];
            $fila = $elementos[$i]->fila;
            $columna = $elementos[$i]->columna;
            $this->elementos[$fila][$columna] = $elemento;
        }
    }


    /*
        Implementacion muy cerda :/ 
        Primero recorre toda la matriz para compactarla
        y luego la vuelve a recorrer para renderizarla
    */
    function renderizar()
    {
        $elementos = $this->elementos;
        $elementosReturn = [];

        $maxIKey = 0;
        foreach (array_keys($elementos) as $iKey) {
            if ($iKey > $maxIKey) {
                $maxIKey = $iKey;
            }
        }

        $maxJKey = 0;
        foreach ($elementos as $fila) {
            foreach (array_keys($fila) as $jKey) {
                if ($jKey > $maxJKey) {
                    $maxJKey = $jKey;
                }
            }
        }

        $maxIKey++;
        $maxJKey++;

        $iIte = 0;
        $jIte = 0;

        for ($i = 0; $i < $maxIKey; $i++) {
            $jIte = 0;
            if (array_key_exists($i, $elementos)) {                     // existe fila
                for ($j = 0; $j < $maxJKey; $j++) {
                    if (array_key_exists($j, $elementos[$i])) {         // existe columna/celda
                        if ($elementos[$i][$j] != null) {
                            $elementosReturn[$iIte][$jIte] = $elementos[$i][$j];    // inserto el elemento
                            $jIte++;
                        }

                    }
                }
                $iIte++;
            }
        }

        /*
            tras compactar la matriz, la renderizo
        */
        $elementos = $elementosReturn;
        $htmlReturn = "";

        if (count($elementos) < 1) {
            return $htmlReturn;
        }
        if (count($elementos) == 1) {                // NO se ponen <div>s
            $htmlReturn .= "<div id='$this->id' class=\"$this->clase\">";  //encapsulo la fila
            foreach ($elementos[0] as $item) {
                $htmlReturn .= $item->renderizar();
            }
            $htmlReturn .= "</div>";  //encapsulo la fila
            return $htmlReturn;
        }
        $htmlReturn .= "<div id='$this->id' class=\"$this->clase\">";  //encapsulo la fila
        foreach ($elementos as $fila) {

            // Pongo <div>s a cada fila

            $htmlReturn .= "<div>";  //encapsulo la fila

            foreach ($fila as $item) {
                $htmlReturn .= $item->renderizar();
            }
            $htmlReturn .= "</div>"; // fin fila
        }
        $htmlReturn .= "</div>";  //encapsulo la fila
        return $htmlReturn;
    }



    /*
        metodo auxiliar para debug
    */
    function printMatriz($matriz = null)
    {
        $elementos = $this->elementos;
        if ($matriz != null) {
            $elementos = $matriz;
        }

        echo ("--------------MATRIZ--------------<br><br>");

        $maxIKey = 0;
        foreach (array_keys($elementos) as $iKey) {
            if ($iKey > $maxIKey) {
                $maxIKey = $iKey;
            }
        }

        $maxJKey = 0;
        foreach ($elementos as $fila) {
            foreach (array_keys($fila) as $jKey) {
                if ($jKey > $maxJKey) {
                    $maxJKey = $jKey;
                }
            }
        }

        $maxIKey++;
        $maxJKey++;

        for ($i = 0; $i < $maxIKey; $i++) {
            if (array_key_exists($i, $elementos)) {
                for ($j = 0; $j < $maxJKey; $j++) {
                    if (array_key_exists($j, $elementos[$i])) {
                        $t = "null";
                        if ($elementos[$i][$j] != null) {
                            $t = $elementos[$i][$j]->text;
                        }
                        echo ("[$i, $j]->" . $t . "     ");
                    } else {
                        echo ("[ ]");
                    }
                }
                echo ("<br>");
            } else {
                for ($j = 0; $j < $maxJKey; $j++) {
                    echo ("[ ]");
                }
                echo ("<br>");
            }
        }
        echo ("<br>------------------------------------");
    }
}
?>