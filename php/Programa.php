<?php




/*
 *  el elemento mas basico. solo hay uno y contiene
 *  dentro todos los elementos que lo conforman
 */
class Programa implements IRenderizable
{

    public $nombre;
    public $html;               // html de la pagina del programa
    public $cabecera;
    public $titulo;             // titulo que aparece en la pestanha del navegador
    public $cuerpo;
    public $autor;
    public $fecha;
    public $scriptsCabecera;
    public $scriptsBody;
    public $css;
    public $sonidos;
    public $popup;
    public $desplegable;
    public $scriptsBaseCabecera;
    public $scriptsBaseBody;
    public $sonidosBase;
    public $cssBase;

    public function __construct($autor, $fecha, $nombre, $scriptsCabecera, $scriptsBody, $sonidos, $css)
    {
        $this->scriptsCabecera = $scriptsCabecera;
        $this->scriptsBody = $scriptsBody;
        $this->sonidos = $sonidos;
        $this->css = $css;

        $this->titulo = "";
        $this->cabecera = "";
        $this->cuerpo = "";
        //
        $this->autor = $autor;
        $this->fecha = $fecha;
        $this->nombre = $nombre;

        // scripts genericos
        $this->scriptsBaseCabecera = [

        ];

        $this->scriptsBaseBody = [
            //
            "js/Calculadora.js",
            "js/ControlFocus.js",
            "js/ControlModos.js",
            "js/ControlSesion.js",
            "js/DateBox.js",
            "js/Desplegable.js",
            "js/Notas.js",
            "js/NoteBox.js",
            "js/PasswordBox.js",
            "js/Peticion.js",
            "js/Popup.js",
            "js/RadioButton.js",
            "js/SelectBox.js",
            "js/Tabla.js",
            "js/TimeBox.js",
        ];
        $this->sonidosBase = [

        ];

        $this->cssBase = [
            "css/Calculadora.css",
            "css/DateBox.css",
            "css/Desplegable.css",
            "css/GestionModo.css",
            "css/NoteBox.css",
            "css/PasswordBox.css",
            "css/Popup.css",
            "css/Tabla.css",
            //
            "css/prefabricados/Cabecera.css",
            "css/prefabricados/PiePagina.css",
        ];
    }

    /*
        patron de diseño para crear un boton con modo creado, el cual con el propio boton
        y evitar dependencia circular
    */
    public static function crear($autor, $fecha, $nombre, $scriptsCabecera, $scriptsBody, $sonidos, $css)
    {
        // Crea el programa
        $programa = new self(
            $autor,
            $fecha,
            $nombre,
            $scriptsCabecera,
            $scriptsBody,
            $sonidos,
            $css
        );

        // creo un popup
        $programa->popup = PopUp::crear(
            "popup",
            "",
            "",
            PopupEstado::NORMAL->value,
        );

        $programa->desplegable = Desplegable::crear(
            "",
            "",
        );

        return $programa;
    }

    //..........................................................................
    //..........................................................................



    //..........................................................................
    //..........................................................................

    /*
        suministra un id valido al elemento que lo solicite
    */
    public function getNewIdElemento()
    {
        $idElemento = Elemento::$idElemento;
        $idElemento++;
        return $idElemento;
    }




    public static function showPopup($texto, $estado)
    {
        return "showPopup('$texto', '$estado->value')";
    }

    /**
     * Obtiene la fecha actual con formato bonito
     * @return string
     */
    public static function fechaActual()
    {
        $formatter = new IntlDateFormatter(
            'es_ES', // Español de España
            IntlDateFormatter::FULL,
            IntlDateFormatter::NONE,
            'Europe/Madrid',
            IntlDateFormatter::GREGORIAN,
            "EEEE, d 'de' MMMM 'de' y"
        );

        return ucfirst($formatter->format(new DateTime(date("d-m-Y"))));
    }


    /*
        
    */
    function renderizar()
    {
        $htmlscriptsBaseCabecera = "";
        foreach ($this->scriptsBaseCabecera as $script) {
            $htmlscriptsBaseCabecera .= "<script src=\"$script\"></script>\n";
        }

        $htmlScriptsCabecera = "";
        foreach ($this->scriptsCabecera as $script) {
            $htmlScriptsCabecera .= "<script src=\"$script\"></script>\n";
        }

        $htmlscriptsBaseBody = "";
        foreach ($this->scriptsBaseBody as $script) {
            $htmlscriptsBaseBody .= "<script src=\"$script\"></script>\n";
        }
        $htmlScriptsBody = "";
        foreach ($this->scriptsBody as $script) {
            $htmlScriptsBody .= "<script src=\"$script\"></script>\n";
        }

        $htmlCssBase = "";
        foreach ($this->cssBase as $css) {
            $htmlCssBase .= "<link rel=\"stylesheet\" href=\"$css\">\n";
        }

        $htmlCss = "";
        foreach ($this->css as $css) {
            $htmlCss .= "<link rel=\"stylesheet\" href=\"$css\">\n";
        }

        $htmlSonidosBase = "";
        foreach ($this->sonidosBase as $sound) {
            $htmlSonidosBase .= $sound;
        }

        $htmlSonidos = "";
        foreach ($this->sonidos as $sound) {
            $htmlSonidos .= $sound;
        }

        return $this->html =
            "
            <!DOCTYPE html>
            <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    $this->cabecera 
                    $htmlscriptsBaseCabecera
                    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/mathjs/11.11.0/math.min.js\"></script> 
                    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/tablesort/5.2.1/tablesort.min.js\"></script>
                    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/tablesort/5.2.1/sorts/tablesort.number.min.js\"></script>
                    $htmlScriptsCabecera
                    $htmlCssBase
                    $htmlCss
                    $htmlSonidosBase
                    $htmlSonidos
                </head>

                <body>
                    $this->cuerpo 
                    " . $this->popup->renderizar() . " 
                    " . $this->desplegable->renderizar() . "
                    $htmlscriptsBaseBody
                    $htmlScriptsBody
                </body>
            </html>
            ";
    }
}
?>