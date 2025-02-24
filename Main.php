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
        scriptsCabecera:
        [

        ],
        scriptsBody:
        [
            "js/prg1/Tabla.js",
            "js/prg1/TimeBox.js",
        ],
        css:
        [
            "css/prg1/Tabla.css",
            "css/prg1/TimeBox.css",
        ],
    );



    $conexion = new Conexion
    (
        "localhost",
        "hispanamer",
        "root",
        "025811"
    );




    $returnArrayConsulta = [];
    $respuesta = $conexion->consulta("SELECT nombre FROM clientes ");
    foreach ($respuesta as $elem) {
        $returnArrayConsulta[] = [$elem, $elem, $elem];
    }







    //////////////////////////////////////////////////////////////////////////////////////////////
//          Creamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////


    $seccion = Seccion::crear
    (
        Elemento::getNewId(),
        "",
        $programa
    );

    $tabla = Tabla::crear
    (
        Seccion::getNewId(),
        "",
        ["Nombre", "Nombre #2", "Nombre #3"],
        $returnArrayConsulta,
        $seccion
    );




    $selectorHoras = TimeBox::crear
    (
        Elemento::getNewId(),
        "",
        $seccion
    );

    $textBox = TextBox::crear(
        Elemento::getNewId(),
        "",
        "asd",
        "asdf",
        $seccion
    );



    //////////////////////////////////////////////////////////////////////////////////////////////
//          Colocamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////


    $seccion->add($tabla, 0, 0);
    $seccion->add($selectorHoras, 1, 0);
    $seccion->add($textBox, 2, 0);






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

    $htmlPrograma = $programa->Renderizar();
    echo $htmlPrograma;
}

if ($method === "POST") {

    // Leer el cuerpo de la solicitud
    $inputJSON = file_get_contents("php://input");
    $input = json_decode($inputJSON, true);
}
?>