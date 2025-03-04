<?php




/*
 *  el elemento mas basico. solo hay uno y contiene
 *  dentro todos los elementos que lo conforman
 */
class Programa extends Modo implements IRenderizable
{

    public $nombre;
    public $conexion;           // conexion a la base de datos
    public $estilo;             // estilo del programa     
    public $html;               // html de la pagina del programa
    public $cabecera;
    public $titulo;             // titulo que aparece en la pestanha del navegador
    public $cuerpo;
    public $modo;
    public $elementos;
    public $autor;
    public $fecha;
    public $scriptsCabecera;
    public $scriptsBody;
    public $css;
    public $sonidos;
    public $popup;

    public function __construct($autor, $fecha, $nombre, $scriptsCabecera, $scriptsBody, $sonidos, $css)
    {
        $this->elementos = [];
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

        // Crea el modo, inyectando el botón en el constructor
        $modo = new Modo(null, $programa);

        // Asigna el modo al botón
        $programa->setModo($modo);

        // creo un popup
        $programa->popup = PopUp::crear(
            "popup",
            "",
            "",
            PopupEstado::Normal->value,
            null
        );

        return $programa;
    }

    /*
        funcion auxiliar para la factory
    */
    public function setModo($modo)
    {
        $this->modo = $modo;
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

    /*
        anhade un nuevo elemento a la lista
    */
    public function addElemento($id, $elemento)
    {
        $this->elementos[$id] = $elemento;
    }

    /*
        se elimina un elemento de la lista
    */
    public function removeElemento($elementoId)
    {
        if ($this->elementos == null || !array_key_exists($elementoId, $this->elementos)) {
            throw new Exception(
                "Se ha intentado eliminar un elemento en la clase Programa que no existe"
            );
        }
        unset($elementos[$elementoId]);
    }

    public static function showPopup($texto, $estado)
    {
        return "showPopup('$texto', '$estado->value')";
    }


    /*
        
    */
    function renderizar()
    {
        $htmlScriptsCabecera = "";
        foreach ($this->scriptsCabecera as $script) {
            $htmlScriptsCabecera .= "<script src=\"$script\"></script>\n";
        }

        $htmlScriptsBody = "";
        foreach ($this->scriptsBody as $script) {
            $htmlScriptsBody .= "<script src=\"$script\"></script>\n";
        }

        $htmlCss = "";
        foreach ($this->css as $css) {
            $htmlCss .= "<link rel=\"stylesheet\" href=\"$css\">\n";
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
                    $htmlScriptsCabecera
                    $htmlCss
                    $htmlSonidos
                </head>

                <body>
                    $this->cuerpo
                    " . $this->popup->renderizar() . "
                    $htmlScriptsBody
                </body>
            </html>
            ";
    }
}
?>