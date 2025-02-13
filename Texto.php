<?php

/*

*/
class Texto extends Elemento implements IRenderizable
{
    public $text;

    public function __construct($id, $clase, $modo, $text, $padre, $estilo)
    {
        $html = "";             // Elemento especial que no se construye con html
        $this->text = $text;
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $html,
            $estilo
        );
    }

    public static function crear($id, $clase, $text, $padre, $estilo)
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

    function renderizar()
    {
        return $this->text;
    }
}
?>