<?php

/*

*/
class Estilo
{
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

    public function __construct(array $propiedades = [])
    {
        foreach ($propiedades as $propiedad => $valor) {
            if (property_exists($this, $propiedad)) {
                $this->$propiedad = $valor;
            }
        }
    }
}
?>