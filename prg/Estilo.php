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
    public $lineaBorde = "solid";
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