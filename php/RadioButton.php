<?php



class RadioButton extends Elemento
{


    public $labels;
    public $horizontal;

    function __construct($id, $labels, $name, $values, $default, $posicionTexto, $clase, $padre)
    {

        if (count($labels) != count($values)) {
            throw new Exception("número de etiquetas (" . count($labels) . ")" .
                " y valores (" . count($values) . ") debe ser igual.");
        }

        // preparo el html de cada elemento
        $htmlRadios = "";

        if ($posicionTexto == RadioButton::posicionTextoDerecha()) {
            for ($i = 0; $i < count($labels); $i++) {
                if ($i != $default) {
                    $htmlRadios .=
                        "
                    <label><input type=\"radio\" class=\"selector\" 
                    name=\"$name\" value=\"" . $values[$i] . "\">" . $labels[$i] . "</label>
                    ";
                } else {
                    $htmlRadios .=
                        "
                    <label><input type=\"radio\" class=\"selector\" 
                    name=\"$name\" value=\"" . $values[$i] . "\" checked>" . $labels[$i] . "</label>
                    ";
                }
            }
        } else {
            for ($i = 0; $i < count($labels); $i++) {
                $htmlRadios .=
                    "
                    <label>" . $labels[$i] . "<input type=\"radio\"
                    class=\"selector\" name=\"$name\" value=\"" . $values[$i] . "\"></label>
                    ";
            }
        }

        $html =
            "
            <span id= \"$id\" class=\"$clase spanRadioButton\" data-tipo=\"RadioButton\">
                <form id=\"form_$id\">
                    $htmlRadios
                </form>
            </span>
            ";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $padre,
            $html
        );


    }

    /*
        patron de diseño para crear un radioButton con modo creado, el cual con el propio radioButton
        y evitar dependencia circular
    */
    public static function crear($id, $labels, $name, $values, $default, $posicionTexto, string $clase, $padre)
    {
        // Crea el botón
        $radioButton = new self(
            $id,
            $labels,
            $name,
            $values,
            $default,
            $posicionTexto,
            $clase,
            $padre,
        );

        return $radioButton;
    }

    
    public static function posicionTextoIzquierda()
    {
        return "izquierda";
    }
    public static function posicionTextoDerecha()
    {
        return "derecha";
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