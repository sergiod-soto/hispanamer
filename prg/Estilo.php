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
        $this->elemento = $elemento;
        
        foreach ($propiedades as $propiedad => $valor) {
            if (property_exists($this, $propiedad)) {
                $this->$propiedad = $valor;
            }
        }
    }

    public function getCSS()
    {
        return $css;
    }
}
?>