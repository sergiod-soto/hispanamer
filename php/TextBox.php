<?php

/*
 * cuadro de texto, rectangulo donde se puede escribir
 * es un Elemento
 */
class TextBox extends Elemento implements IEditable
{

    public $texto;

<<<<<<< HEAD
    public function __construct($id, string $clase, $modo, $text, $placeHolder, $padre)
=======
    public function __construct($id, string $clase, $modo, $text, $padre)
>>>>>>> fea2cfbc2576ef37a17a9de0475d0ea0e3589daa
    {
        $html = "<span id=\"$id\" ";
        if ($clase != null && $clase != "") {
            $html .= "class=\"$clase\"";
        }
<<<<<<< HEAD
        $html .= "><input type=\"text\" placeholder=\"$placeHolder\" />$text</span>";
=======
        $html .= ">$text</span>";
>>>>>>> fea2cfbc2576ef37a17a9de0475d0ea0e3589daa

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
        patron de diseño para crear un boton con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
<<<<<<< HEAD
    public static function crear($id, string $clase, $text, $placeHolder, $padre)
=======
    public static function crear($id, string $clase, $text, $padre)
>>>>>>> fea2cfbc2576ef37a17a9de0475d0ea0e3589daa
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            null,
            $text,
<<<<<<< HEAD
            $placeHolder,
=======
>>>>>>> fea2cfbc2576ef37a17a9de0475d0ea0e3589daa
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $boton);

        // Asigna el modo al botón
        $boton->setModo($modo);

        return $boton;
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
    function renderizar()
    {
        return $this->html;
    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}
?>