<?php

/*

*/
class Estilo
{
    public $css;
    public $elemento;

    /*
        algunas de las propiedades css basicas para un control
        facil, rapido y comodo.
        para otras propiedades, introducir las etiquetas manualmente.
    */
    public $fontObject = new Font; // font como objeto
    public $font = $this->fontObject->toString();       // font como string
    public $colorLetra = rgb(0, 0, 0);
    public $colorFondo = rgba(255, 255, 255, 0);
    public $grosorBorde = "2px";
    public $lineaBorde = "none";
    public $colorBorde = rgb(0, 0, 0);
    public $margenIzq = "20px";
    public $margenDer = "20px";
    public $margenSuperior = "15px";
    public $margenInferior = "15px";
    public $anchura;
    public $altura;
    public $anchuraMaxima;
    public $alturaMaxima;
    public $alineamiento = "center";
    public $display;

    public function __construct(array $propiedades = [])
    {
        $css = "";

        foreach ($propiedades as $propiedad => $valor) {
            if (property_exists($this, $propiedad)) {
                $this->$propiedad = $valor;
            }
        }
    }

    /*
        Se le pasa un elemento como parametro para que este estilo lo afecte

        NO es un elemento de la clase "Elemento", si no un elemento CSS,
        por ejemplo: una clase, un id o una etiqueta html, como "div" o "p"
    */
    public function addElemento($elemento)
    {

    }
    public function removeElemento($elemento)
    {

    }

    /*
        TODO
    */
    public function getCSS()
    {
        $css = $this->css;

        $css .= "<style>";
        $css .= $this->elemento . "{";          // a que elementos afecta, segun tipo, id o clase
        //                                      //
        //                                      // ej: p{ ... }     //     .p, .h1{ ... }

        $css .= $this->fontObject->toString();       // font como string
        $css .= $colorLetra = rgba(0, 0, 0, 1);
        $css .= $colorFondo = rgba(255, 255, 255, 0);
        $css .= $grosorBorde = "2px";
        $css .= $lineaBorde = "none";
        $css .= $colorBorde = rgb(0, 0, 0);
        $css .= $margenIzq = "20px";
        $css .= $margenDer = "20px";
        $css .= $margenSuperior = "15px";
        $css .= $margenInferior = "15px";
        $css .= $anchura;
        $css .= $altura;
        $css .= $anchuraMaxima;
        $css .= $alturaMaxima;
        $css .= $alineamiento = "center";
        $css .= $display;


        $css .= "}";
        $css .= "</style>";

        return $this->css;
    }
}
?>