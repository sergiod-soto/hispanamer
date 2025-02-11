<?php

//namespace framework;

/*
 *  el elemento mas basico. solo hay uno y contiene
 *  dentro todos los elementos que lo conforman
 */
class Programa extends Modo
{

    public $conexion;           // conexion a la base de datos
    public $cookies;            // gestion de informacion
    public $elementos;          // gestion de los elementos 
    public $estilo;             // estilo del programa     

    public function __construct()
    {
        $this->cookies = [];
        $this->elementos = [];
    }

    public function getNewIdElemento()
    {
        $newId = count($this->elementos);

        for ($i = 0; $i < $this->elementos; $i++) {
            if ($this->elementos[$i] == null) {
                return $i;
            }
        }
        return $newId;
    }
    public function addElemento($id, $elemento)
    {
        $this->elementos[$id] = $elemento;
    }
    public function removeElemento($elementoId)
    {
        if ($this->elementos == null || !array_key_exists($elementoId, $this->elementos)) {
            throw new Exception(
                "Se ha intentado eliminar un elemento en la clase Programa que no existe"
            );
        }
        unset($elementos[$elementoId]);
    }

    public function addElementoModo($id, $elemento)
    {

    }
    public function removeElementoModo($elementoId)
    {

    }
}
?>