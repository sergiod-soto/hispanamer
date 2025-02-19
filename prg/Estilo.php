<?php

/*

*/
class Estilo
{
    public $activo;
    public $css;
    public $elementos;

    /*
        algunas de las propiedades css basicas para un control
        facil, rapido y comodo.
        para otras propiedades, introducir las etiquetas manualmente.
    */
    public $fontObject = new Font;                      // font como objeto
    public $font = $this->fontObject->toString();       // font como string
    public $colorLetra = Color::rgb(0, 0, 0);
    public $colorFondo = Color::rgba(255, 255, 255, 0);
    public $estiloBordeIzq;
    public $estiloBordeDer;
    public $estiloBordeSuperior;
    public $estiloBordeInferior;
    public $lineaBorde;
    public $colorBorde;
    public $margenIzq;
    public $margenDer;
    public $margenSuperior;
    public $margenInferior;
    public $anchura;
    public $altura;
    public $anchuraMaxima;
    public $alturaMaxima;
    public $alineamiento = "left";
    public $display;

    public function __construct(array $propiedades = [])
    {
        $this->css = "";
        $this->activo = true;

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
    public function setElementos($elementos)
    {
        $this->elementos = $elementos;
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
        $css .= $this->elementos . "{";          // a que elementos afecta, segun tipo, id o clase
        //                                      //
        //                                      // ej: p{ ... }     //     .p, .h1{ ... }

        $css .= $this->fontObject->toString();  // font como string

        $css .= "color:" . $this->colorLetra . "; ";
        $css .= "color:" . $this->colorFondo . "; ";
        $css .= $this->estiloBordeIzq == null
            ? ""
            : "border-left-style:" . $this->estiloBordeIzq . "; ";
        $css .= $this->estiloBordeDer == null
            ? ""
            : "border-right-style:" . $this->estiloBordeDer . "; ";
        $css .= $this->estiloBordeSuperior == null
            ? ""
            : "border-top-style:" . $this->estiloBordeSuperior . "; ";
        $css .= $this->estiloBordeInferior == null
            ? ""
            : "border-botton-style:" . $this->estiloBordeInferior . "; ";
        $css .= $this->margenIzq == null
            ? ""
            : "margin-left:" . $this->margenIzq . "; ";
        $css .= $this->margenDer == null
            ? ""
            : "margin-right:" . $this->margenDer . "; ";
        $css .= $this->margenSuperior == null
            ? ""
            : "margin-top:" . $this->margenSuperior . "; ";
        $css .= $this->margenInferior == null
            ? ""
            : "margin-bottom:" . $this->margenInferior . "; ";
        $css .= $this->anchura == null
            ? ""
            : "";
        $css .= $this->altura == null
            ? ""
            : "";
        $css .= $this->anchuraMaxima == null
            ? ""
            : "";
        $css .= $this->alturaMaxima == null
            ? ""
            : "";
        $css .= " ;"; // alineamiento
        $css .= $this->display == null
            ? ""
            : "";

        $css .= "}";
        $css .= "</style>";

        return $this->css;
    }
}
?>