<?php

// include de scripts sin clase
include_once "php/Iconos.php";

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

            "js/prg1/ElementosAGuardar.js",
        ],
        css:
        [
            "css/DateBox.css",
            "css/Popup.css",

            "css/prg1/Tabla.css",
            "css/prg1/TimeBox.css",

        ],
    );






    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Creamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////

    $seccion = Seccion::crear
    (
        Elemento::getNewId(),
        "",
        $programa
    );

    $b1 = Button::crear(
        Elemento::getNewId(),
        "",
        "popup ok",
        Programa::showPopup("estado ok", PopupEstado::Ok),
        $seccion

    );
    $b2 = Button::crear(
        Elemento::getNewId(),
        "",
        "popup error",
        Programa::showPopup("estado error. sdpflspdl pslvpsvpsdpvls dpvsdpv sdpvlsdplv", PopupEstado::Error),
        $seccion

    );
    $b3 = Button::crear(
        Elemento::getNewId(),
        "",
        "popup warning",
        Programa::showPopup("estado warning", PopupEstado::Warning),
        $seccion

    );
    $b4 = Button::crear(
        Elemento::getNewId(),
        "",
        "popup neutro",
        Programa::showPopup("estado neutro", PopupEstado::Normal),
        $seccion

    );

    $a = NoteBox::crear(
        Elemento::getNewId(),
        "",
        "",
        "ASD",
        "titulo",
        "",
        $seccion
    );



    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Colocamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////




    $seccion->add($b1, 0, 0);
    $seccion->add($b2, 1, 0);
    $seccion->add($b3, 2, 0);
    $seccion->add($b4, 3, 0);
    $seccion->add($a, 4, 0);



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