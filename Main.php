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



//////////////////////////////////////////////////////////////////////////////////////////////
//          Declaramos los elementos que componen el programa
//////////////////////////////////////////////////////////////////////////////////////////////

//............................................
// el programa base
$scriptsCabecera =
    [

    ];
$scriptsBody =
    [

    ];
$css =
    [

    ];


$programa = Programa::crear(
    autor: "sergiod",
    fecha: "17/02/2025",
    scriptsCabecera: $scriptsCabecera,
    scriptsBody: $scriptsBody,
    css: $css,
);







//////////////////////////////////////////////////////////////////////////////////////////////
//          Creamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////


$botonTest = Button::crear
(
    Elemento::getNewId(),
    "",
    "PRUEBAS",
    $programa
);



$conexion = new Conexion
(
    "localhost",
    "hispanamer",
    "root",
    "025811"
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



//////////////////////////////////////////////////////////////////////////////////////////////
//          echo del programa
//////////////////////////////////////////////////////////////////////////////////////////////

echo $htmlPrograma;



?>