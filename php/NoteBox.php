<?php

class NoteBox extends Elemento implements IEditable
{

    public function __construct($id, string $clase, $modo, $text, $placeHolder, $padre)
    {
        $html = "";


        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $html,
        );
    }

    /*
           patron de diseño para crear un noteBox con modo creado, el cual con el propio noteBox
           y evitar dependencia circular
       */
    public static function crear($id, string $clase, $text, $placeHolder, $padre)
    {
        // Crea el noteBox
        $noteBox = new self(
            $id,
            $clase,
            null,
            $text,
            $placeHolder,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el noteBox en el constructor
        $modo = new Modo($modoPadre, $noteBox);

        // Asigna el modo al noteBox
        $noteBox->setModo($modo);

        return $noteBox;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }

    public function setEditableOn()
    {

    }
    public function setEditableOff()
    {

    }
    function hide()
    {

    }
    function show()
    {

    }
    function setVisible($visible)
    {

    }
    public function renderizar()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }


}


?>