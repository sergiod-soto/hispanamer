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
        nombre: "prg1",
        scriptsCabecera:
        [

        ],
        scriptsBody:
        [
            //"js/prg1/Tabla1.js",
            "js/prg1/ElementosAGuardar.js",
        ],
        sonidos:
        [

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

    $seccion = Seccion::crear
    (
        Elemento::getNewId(),
        "",
    );

    $r = RadioButton::crear(
        Elemento::getNewId(),
        ["asd1", "asd2", "asd3"],
        "n",
        ["1", "2", "3"],
        "",
        PosicionTexto::derecha,
        "",
    );
    $i = Imagen::crear(
        Elemento::getNewId(),
        "",
        Imagenes::Hispanamer
    );

    $link = Link::crear(
        Elemento::getNewId(),
        "a",
        URL::Hispanamer->value,
        Target::Self,
        $i,
        "aq",
    );



    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Colocamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////




    $seccion->add($r, 0, 0);


    $seccion->add($link, 1, 0);






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