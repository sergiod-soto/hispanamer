<?php

include_once "php/Includes.php";




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
        nombre: "prg295",
        scriptsCabecera:
        [

        ],
        scriptsBody:
        [
            "js/prg1/ElementosAGuardar.js",
        ],
        sonidos:
        [
            Sonidos::sonidoEj1->value
        ],
        css:
        [
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

    $base = Seccion::crear
    (
        Elemento::getNewId(),
        "",
    );



    $base->add(
        // cabecera:
        $sCabecera = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        0,
        0
    );



    $sCabecera->add(
        $sCabeceraSup = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        0,
        0
    );
    //////

    $sCabeceraSup->add(
        $botonAtrasCabecera = Button::crear(
            Elemento::getNewId(),
            "",
            iconoFlechaAtras,
            "console.debug('Atras')"
        ),
        10,
        10
    );


    /////

    $sCabecera->add(
        $sCabeceraInf = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        1,
        0
    );

    $sCabeceraInf->add(
        $sCabeceraInf1 = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        0,
        10
    );
    $sCabeceraInf->add(
        $sCabeceraInf2 = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        0,
        20
    );
    $sCabeceraInf->add(
        $sCabeceraInf3 = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        0,
        30
    );














    $base->add(
        // cuerpo
        $sCuerpo = Seccion::crear
        (
            Elemento::getNewId(),
            "",
        ),
        1,
        0
    );

















    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Colocamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////











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
        $base->renderizar() .
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