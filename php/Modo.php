<?php

/*
 * clase que permite gestionar el modo edicion de cada elemento
 * 
 * lo debe implementar cualquier Elemento que pueda tener elementos hijos,
 * independientemente de si es o no editable
 */
class Modo
{

    private $elemento;
    private $modos;
    public $enEdicion;

    function __construct($modoPadre, $elemento)
    {
        $this->elemento = $elemento;
        $this->modos = [];
        if ($modoPadre != null) {
            $modoPadre->addModo($this);        // anhado este modo al modo padre
        }
        $this->enEdicion = false;
    }

    function addModo($modo)
    {
        $this->modos[] = $modo;
    }

    function setModoEditar($flag)
    {
        if ($flag) {    // modo editar: ON

            $this->enEdicion = true;    // pongo la flag a modo editar

            /*
            if ($this->elemento instanceof IEditable) { // si el elemento es editable
                $this->elemento->setEditableOn();
            }
            */
        } else {          // modo editar: OFF

            $this->enEdicion = false;    // pongo la flag a modo NO editar

            /*
            if ($this->elemento instanceof IEditable) { // si el elemento es editable
                $this->elemento->setEditableOff();
            }
            */
        }

        foreach ($this->modos as $modo) { // propago el cambio
            $modo->setModoEditar($flag);
        }
    }
}
?>