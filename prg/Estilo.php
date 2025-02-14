<?php

/*

*/
class Estilo
{
    public $activo;
    public $css;
    public $elemento;

    /*
        algunas de las propiedades css basicas para un control
        facil, rapido y comodo.
        para otras propiedades, introducir las etiquetas manualmente.
    */
    public $fontObject = new Font; // font como objeto
    public $font = $this->fontObject->toString();       // font como string
    public $colorLetra = Color::rgb(0, 0, 0);
    public $colorFondo = Color::rgba(255, 255, 255, 0);
    public $grosorBorde = "2px";
    public $lineaBorde = "none";
    public $colorBorde = Color::rgb(0, 0, 0);
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
        
    */
    public function getCSS()
    {
        if (!$this->activo) {
            return "";
        }
        $css = $this->css;

        $css .= "<style>";
        $css .= $this->elemento . "{";          // a que elementos afecta, segun tipo, id o clase
        //                                      //
        //                                      // ej: p{ ... }     //     .p, .h1{ ... }

        $css .= $this->fontObject->toString();  // font como string

        $css .= $this->colorLetra == null ? Color::rgb(0, 0, 0) . " " : $this->colorLetra . " ";
        $css .= $this->colorFondo == null ? Color::rgb(255, 255, 255) . " " : $this->colorFondo . " ";
        $css .= $this->grosorBorde == null ? "" : "";
        $css .= $this->lineaBorde == null ? "" : "border-style: groove; ";
        $css .= $this->colorBorde == null ? "" : "";
        $css .= $this->margenIzq == null ? "" : "";
        $css .= $this->margenDer == null ? "" : "";
        $css .= $this->margenSuperior == null ? "" : "";
        $css .= $this->margenInferior == null ? "" : "";
        $css .= $this->anchura == null ? "" : "";
        $css .= $this->altura == null ? "" : "";
        $css .= $this->anchuraMaxima == null ? "" : "";
        $css .= $this->alturaMaxima == null ? "" : "";
        $css .= $this->alineamiento == null ? "" : "";
        $css .= $this->display == null ? "" : "";

        $css .= "}";
        $css .= "</style>";

        return $this->css;
    }
}
?>