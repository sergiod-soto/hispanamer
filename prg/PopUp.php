<?php

/*
    bastante autoexplicativo. es un popup.

    FALTA INTEGRAR EL CSS Y EL JS




    (FROM CHATGPT)

    CSS:
    .popup {
        position: fixed; // Fija la posición del popup //
        bottom: 10px; // Ajusta la posición desde el borde inferior //
        right: 10px; // Ajusta la posición desde el borde derecho //
        width: 4cm; // Establece el ancho del popup //
        height: 3cm; // Establece la altura del popup //
        background-color: rgba(0, 0, 0, 0.7); // Fondo semi-transparente //
        color: white; // Color del texto //
        text-align: center; // Centra el texto //
        display: none; // Inicialmente oculto //
        justify-content: center;
        align-items: center;
        border-radius: 5px; // Bordes redondeados //
    }

    JS:

    // Muestra el popup durante 2 segundos y luego lo oculta
    function showPopup() {
        var popup = document.getElementById('popup');
        popup.style.display = 'flex'; // Muestra el popup
        setTimeout(function() {
            popup.style.display = 'none'; // Oculta el popup después de 2 segundos
        }, 2000);
    }




*/
class PopUp extends Elemento
{

    public $html;
    public $text;

    public function __construct($id, string $clase, $modo, $text, $padre)
    {
        $html =
            "
            <div id='$id' class='$clase'>
            $text
            </div>
            ";

        $this->text = $text;


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
    public static function crear($id, string $clase, $text, $padre)
    {
        // Crea el popup
        $popup = new self(
            $id,
            $clase,
            null,
            $text,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo($modoPadre, $popup);

        // Asigna el modo al botón
        $popup->setModo($modo);

        return $popup;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
    }


    function hide()
    {

    }

    /*
        show() especial.
        al llamarse, aparece el popup durante 2 segundos y 
        pasado ese tiempo, automaticamente desaparece
    */
    function show()
    {

    }
    function setVisible($visible)
    {

    }
    function setEditableOff()
    {

    }
    function setEditableOn()
    {

    }
    function renderizar()
    {

    }
    public function setSiguienteFoco($elemento)
    {
        return;
    }
}
?>