<?php



class RadioButton extends Elemento
{


    public $labels;
    public $horizontal;



    function __construct($id, $labels, $name, $value, $horizontal, $clase, $modo, $padre)
    {

        // preparo el html de cada elemento
        $htmlRadios = "";

        foreach ($labels as $label) {
            $htmlRadios .=
                "
                <label>
                    <input type=\"radio\" name=\"$name\" value=\"$value\">$label
                </label>
                ";
        }

        $html =
            "
            <form>
            $htmlRadios
            </form>
            ";

        // Llamamos al constructor de la clase Elemento
        parent::__construct(
            $id,
            $clase,
            $modo,
            $padre,
            $html
        );

        // Inicializamos el atributo específico de RadioButton
        $this->labels = $labels;
        $this->horizontal = $horizontal;
    }

    /*
        patron de diseño para crear un timeBox con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($id, $labels, $name, $value, $horizontal, string $clase, $padre)
    {
        // Crea el botón
        $boton = new self(
            $id,
            $labels,
            $name,
            $value,
            $horizontal,
            $clase,
            null,
            $padre,
        );


        $modoPadre = null;
        if ($padre != null) {
            $modoPadre = $padre->modo;
        }
        // Crea el modo, inyectando el radioButton en el constructor
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
    public static function horizontal()
    {
        return "horizontal";
    }
    public static function vertical()
    {
        return "vertical";
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