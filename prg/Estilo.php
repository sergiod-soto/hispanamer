<?php

/*

*/
class Estilo
{
    public $elemento;
    public $css;


    /*
        algunas de las propiedades css basicas para un control
        facil, rapido y comodo.
        para otras propiedades, introducir las etiquetas manualmente.
    */
    public $font;
    public $colorLetra;
    public $colorFondo;
    public $colorBorde;
    public $margenIzq;
    public $margenDer;
    public $margenSuperior;
    public $margenInferior;
    public $anchura;
    public $altura;
    public $anchuraMaxima;
    public $alturaMaxima;
    public $alineamiento;
    public $display;

    public function __construct($elemento, array $propiedades = [])
    {
        $css = "";
        $this->elemento = $elemento;

        foreach ($propiedades as $propiedad => $valor) {
            if (property_exists($this, $propiedad)) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function getCSS()
    {
        $css = $this->css;

        $css .= "<style>";
        $css .= $this->elemento . "{";          // a que elementos afecta, segun tipo, id o clase
        //                                      //
        //                                      // ej: p{ ... }     //     .p, .h1{ ... }

        if ($this->font != null) {
            $css .= "";
        }
        if ($this->colorLetra != null) {
            $css .= "";
        }
        if ($this->colorFondo != null) {
            $css .= "";
        }
        if ($this->colorBorde != null) {
            $css .= "";
        }
        if ($this->margenIzq != null) {
            $css .= "";
        }
        if ($this->margenDer != null) {
            $css .= "";
        }
        if ($this->margenSuperior != null) {
            $css .= "";
        }
        if ($this->margenInferior != null) {
            $css .= "";
        }
        if ($this->anchura != null) {
            $css .= "";
        }
        if ($this->altura != null) {
            $css .= "";
        }
        if ($this->anchuraMaxima != null) {
            $css .= "";
        }
        if ($this->alturaMaxima != null) {
            $css .= "";
        }
        if ($this->alineamiento != null) {
            $css .= "";
        }
        if ($this->display != null) {
            $css .= "";
        }

        $css .= "}";
        $css .= "</style>";

        return $this->css;
    }
}
?>