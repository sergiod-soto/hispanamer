<?php

/*

*/
class Texto extends Elemento
{
    public $text;

    public function __construct($id, $clase, $modo, $text, $padre, $programa, $estilo)
    {
        $html = "";
        $this->text = $text;
        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $programa,
            $html,
            $estilo
        );
    }

    public static function crear($id, $clase, $text, $padre, $programa, $estilo)
    {
        // Crea el texto
        $texto = new self(
            $id,
            $clase,
            $text,
            $padre,
            $programa,
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

        // agrego el texto a la lista de elementos del programa
        $programa->elementos[] = $texto;

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

    }
    public function show()
    {

    }
}


?>