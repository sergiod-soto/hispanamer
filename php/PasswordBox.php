<?php

enum TipoPassword: string
{
    case REGISTRO = "new-password";
    case LOGIN = "current-password";
    case OFF = "off";
}

class PasswordBox extends Elemento
{
    private $iconoOjo = "../multimedia/iconos/ojo.png";

    public function __construct($id, string $clase, $placeholder, $minLength, $maxLength, $tipoPW)
    {
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
            $html,
        );
    }

    /*
        patron de diseño para crear un TextBox con modo creado, el cual con el propio TextBox
        y evitar dependencia circular
    */
    public static function crear($id, string $clase, $placeholder, $minLength, $maxLength, $tipoPw)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $clase,
            $placeholder,
            $minLength,
            $maxLength,
            $tipoPw,
        );

        return $boton;
    }

    public function renderizar()
    {
        return $this->html;
    }
}
?>