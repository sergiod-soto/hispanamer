<?php

/*

*/
class Texto extends Elemento implements IRenderizable
{
    public $text;

    public function __construct($id, string $clase, $modo, $text, $padre, $estilo)
    {
        $this->text = $text;
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            "" . $text . "",
        );
    }

    public static function crear($id, string $clase, $text, $padre, $estilo)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase,
            null,
            $text,
            $padre,
            $estilo
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $texto);

        // Asigna el modo al botón
        $texto->setModo($modo);

        return $texto;
    }

    /*
       funcion auxiliar para la factory
   */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }

    public function hide()
    {
        // TODO
    }
    public function show()
    {
        // TODO
    }
    function setVisible($visible)
    {

    }

    function renderizar()
    {
        return $this->html;
    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}
?>