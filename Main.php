<?php

// include de scripts sin clase
include_once "php/Iconos.php";
include_once "php/Sonidos.php";

// class autoloader
spl_autoload_register(function ($class_name) {
    $file = "php/" . $class_name . '.php';
    if ($file != "php/mysqli.php") {
        include_once $file;
    }

});




$method = $_SERVER["REQUEST_METHOD"];
if ($method === "GET") {

    //////////////////////////////////////////////////////////////////////////////////////////////
    //          1º se crean el programa y la conexion
    //          2º se hacen las consultas necesarias
    //          3º se crean los elementos
    //          4º se colocan
    //          5º se renderiza
    //////////////////////////////////////////////////////////////////////////////////////////////

    $programa = Programa::crear(
        autor: "sergiod",
        fecha: "17/02/2025",
        nombre: "prg1",
        scriptsCabecera:
        [

        ],
        scriptsBody:
        [
            "js/ControlSesion.js",
            "js/DateBox.js",
            "js/NoteBox.js",
            "js/PasswordBox.js",
            "js/Popup.js",
            "js/RadioButton.js",
            "js/SelectBox.js",
            "js/Tabla.js",
            //"js/TextBox.js",
            "js/TimeBox.js",

            //"js/prg1/Tabla1.js",
            "js/prg1/ElementosAGuardar.js",
        ],
        sonidos:
        [
            sonidoEj1
        ],
        css:
        [
            "css/DateBox.css",
            "css/Popup.css",
            "css/PasswordBox.css",
            "css/Tabla.css",

            "css/prg1/TimeBox.css",
            "css/prg1/Tabla.css"
        ],
    );






    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //      Creamos los elementos 
    //      
    //      (tener en cuenta que si un elemento A usa otro B, 
    //      B debe ser creado antes)
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $seccion = Seccion::crear
    (
        Elemento::getNewId(),
        "",
        $programa
    );
    $boton = Button::crear(
        Elemento::getNewId(),
        "",
        "sonido",
        "document.getElementById('sound-tirin').play()",
        $tabla
    );
    $cb = CheckBox::crear(
        Elemento::getNewId(),
        "",
        "checkBox",
        "",
        "",
        "",
        $tabla
    );
    $link1 = Link::crear(
        Elemento::getNewId(),
        "",
        "http://localhost/corporativo/",
        Target::Blank,
        "Hispanamer localhost",
        "Nos vamos al localhost?",
        $tabla
    );
    $link2 = Link::crear(
        Elemento::getNewId(),
        "",
        "http://localhost/corporativo/",
        Target::Blank,
        Button::crear(
            Elemento::getNewId(),
            "",
            "link",
            "",
            $tabla
        ),
        "Nos vamos al localhost?",
        $tabla
    );
    $link3 = Link::crear(
        Elemento::getNewId(),
        "",
        "http://localhost/corporativo/",
        Target::Blank,
        iconoPDF,
        "Nos vamos al localhost?",
        $tabla
    );

    $tabla = Tabla::crear(
        "id_1",
        "",
        [
            $boton,
            $link3,
            "c3"
        ],
        [
            [iconoCalendario, iconoEditar, iconoEliminar],
            [iconoFlechaAdelante, iconoFlechaAtras, iconoImpresora],
            [iconoLupa, iconoNuevo, iconoRecargar],
            [iconoReloj, iconoTest, 3],
            [iconoEXCEL, iconoPDF, $boton],
            [$link1, $link2, $link3],
            ["1", "2", 3],
            ["1", "2", 3],
            ["1", "2", 3],
            ["1", "2", 3],
            ["1", "2", 3],
            ["1", "2", 3],
            ["1", "2", 3],
        ],
        $seccion
    );




    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Colocamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////




    $seccion->add($tabla, 0, 0);







    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Generamos el HTML final
    //////////////////////////////////////////////////////////////////////////////////////////////





    //.......................
    $titulo = "Titulo";
    //.......................

    //.......................
    $cabecera =
        "
        <meta charset='UTF-8'>
        <title>$titulo</title>
        <!-- necesario para que el sistema de sesion sepa en que programa estamos -->
        <script>localStorage.setItem(\"prgActual\", \"" . $programa->nombre . "\");</script>
        ";
    //.......................


    //.......................
    $cuerpo =
        "" .
        $seccion->renderizar() .
        "";
    //.......................





    //.......................

    $programa->titulo = $titulo;
    $programa->cabecera = $cabecera;
    $programa->cuerpo = $cuerpo;

    echo $programa->Renderizar();

}

if ($method === "POST") {

    // Leer el cuerpo de la solicitud
    $inputJSON = file_get_contents("php://input");
    $input = json_decode($inputJSON, true);
}
?>