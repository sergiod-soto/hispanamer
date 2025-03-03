<?php

enum TipoPassword: string
{
    case registro = "new-password";
    case login = "current-password";
    case off = "off";
}

class PasswordBox extends Elemento
{
    private $iconoOjo = "../multimedia/iconos/ojo.png";
    public $input;
    public $sigTab;

    public function __construct($id, string $clase, $placeholder, $modo, $padre, $minLength, $maxLength, $tipoPW, $sigTab)
    {
        $this->sigTab = $sigTab;





        $html =
            "
            <form>
                <div id=\"$id\" class=\"password-container\" data-tipo=\"PasswordBox\">
                    <input type='password' id='input$id' class='$clase' name='$id' 
                        minlength='$minLength' maxlength=\"$maxLength\" 
                            placeholder=\"$placeholder\" autocomplete=\"$tipoPW->value\">
                    <img src=\"$this->iconoOjo\" id=\"toggleIcon$id\" class=\"toggle-password\" alt=\"Mostrar contraseña\">
                </div>
            </form>
            ";

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
        patron de diseño para crear un TextBox con modo creado, el cual con el propio TextBox
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $placeholder, $minLength, $maxLength, $tipoPw, $sigTab, $padre)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            $placeholder,
            null,
            $padre,
            $minLength,
            $maxLength,
            $tipoPw,
            $sigTab,

        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el TextBox en el constructor
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


    public function renderizar()
    {
        return $this->html;
    }
    public function hide()
    {

    }
    public function show()
    {

    }
    function setVisible($visible)
    {

    }
    public function setSiguienteFoco($elemento)
    {
        $this->siguienteFoco = $elemento;
    }
}
?>