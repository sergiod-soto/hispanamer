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


    public function __construct($id, $clase)
    {
        $html = "";
        parent::__construct(
            $id,
            $clase,
            $html,
        );
        $this->elementos = [];
    }

    /*  
        patron de diseño para crear una seccion con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, string $clase)
    {
        // Crea la seccion
        $seccion = new self(
            $id,
            $clase,
        );

        return $seccion;
    }

    /**
     * Anhade un Elemento a la Seccion
     * @param Elemento $elemento
     * @param int $fila
     * @param int $columna
     */
    function add($elemento, int $fila, int $columna): Seccion|null
    {
        $this->elementos[$fila][$columna] = $elemento;

        if (get_class($elemento) == "Seccion") {
            return $elemento;
        }
        return null;
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
            $htmlReturn .= "<span id='$this->id'>";  //encapsulo la fila
            foreach ($elementos[0] as $item) {
                $htmlReturn .= $item->renderizar();
            }
            $htmlReturn .= "</span>";  //encapsulo la fila
            return $htmlReturn;
        }
        $htmlReturn .= "<div id='$this->id'>";  //encapsulo la fila
        foreach ($elementos as $fila) {

            // Pongo <div>s a cada fila

            $htmlReturn .= "<div>";  //encapsulo la fila

            foreach ($fila as $item) {
                $htmlReturn .= $this->replaceOuterDivs($item->renderizar());
            }

            $htmlReturn .= "</div>"; // fin fila

        }
        $htmlReturn .= "</div>";  //encapsulo la fila
        return $htmlReturn;
    }

    /*
        metodo auxiliar de renderizar() al cual se le pasa
        un elemento renderizado y, si esta encapsulado por
        <div>, lo sustituye por <span>
    */
    private function replaceOuterDivs($html)
    {
        // Expresión regular mejorada para detectar el <div> externo aunque tenga espacios o saltos de línea
        $pattern = '/^\s*<div([^>]*)>([\s\S]*?)<\/div>\s*$/';

        // Reemplaza solo si el primer y último tag son <div> y </div>
        $replacement = '<span$1>$2</span>';

        return preg_replace($pattern, $replacement, $html);
    }

    function replaceOuterSpans($html)
    {
        // Expresión regular para detectar un <span> externo y su cierre </span>
        $pattern = '/^\s*<span([^>]*)>([\s\S]*?)<\/span>\s*$/';

        // Reemplaza solo si el primer y último tag son <span> y </span>
        $replacement = '<div$1>$2</div>';

        return preg_replace($pattern, $replacement, $html);
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