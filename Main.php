<?php

// include de scripts sin clase
include_once "prg/Iconos.php";

// class autoloader
spl_autoload_register(function ($class_name) {
    $file = "prg/" . $class_name . '.php';
    include_once $file;
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
        "js/prg1/script.js",
    ];


$programa = Programa::crear(
    autor: "sergiod",
    fecha: "17/02/2025",
    scriptsCabecera: $scriptsCabecera,
    scriptsBody: $scriptsBody
);




//............................................
// una seccion
$seccion = Seccion::crear(
    Elemento::getNewId(),
    "seccion ",
    $programa,
);

//............................................
// una seccion2
$seccion2 = Seccion::crear(
    Elemento::getNewId(),
    "seccion2 ",
    $seccion,
);
//............................................
// una seccion3
$seccion3 = Seccion::crear(
    Elemento::getNewId(),
    "seccion3 ",
    $seccion,
);

// una seccion4
$seccion4 = Seccion::crear(
    Elemento::getNewId(),
    "seccion4 ",
    $seccion,
);

















//............................................
// un boton
$boton1 = Button::crear(
    Elemento::getNewId(),
    "",
    "1 ",
    $seccion2,
);



//............................................
// otro boton
$boton2 = Button::crear(
    Elemento::getNewId(),
    "",
    "2 ",
    $seccion2,
);

//............................................
// otro boton
$boton3 = Button::crear(
    Elemento::getNewId(),
    "",
    "3 ",
    $seccion3,
);
//............................................
// otro boton
$boton4 = Button::crear(
    Elemento::getNewId(),
    "",
    "4 ",
    $seccion3,
);
//............................................
// otro boton
$boton5 = Button::crear(
    Elemento::getNewId(),
    "",
    "5 ",
    $seccion4,
);
//............................................
// otro boton
$boton6 = Button::crear(
    Elemento::getNewId(),
    "",
    "6 ",
    $seccion4,
);






//............................................
// un texto
$label1 = Texto::crear(
    Elemento::getNewId(),
    "",
    "label1 ",
    $seccion2,
    "",
);

//............................................
// un texto
$label2 = Texto::crear(
    Elemento::getNewId(),
    "",
    "label2 ",
    $seccion2,
    "",
);

//............................................
// un texto
$label3 = Texto::crear(
    Elemento::getNewId(),
    "",
    "label3 ",
    $seccion3,
    "",
);

//............................................
// un texto
$label4 = Texto::crear(
    Elemento::getNewId(),
    "",
    "label4 ",
    $seccion3,
    "",
);
// un texto
$label5 = Texto::crear(
    Elemento::getNewId(),
    "",
    "label5 ",
    $seccion4,
    "",
);
// un texto
$label6 = Texto::crear(
    Elemento::getNewId(),
    "",
    "label6 ",
    $seccion4,
    "",
);

//............................................
// un checkbox
$checkbox = CheckBox::crear(
    Elemento::getNewId(),
    "",
    "checkbox text",
    "nombre",
    "value",
    $seccion,
);

$tabla = Tabla::crear(
    Elemento::getNewId(),
    "tabla",
    ["c1", "c2", "c3"],
    [
        [$boton1, "f1c2", "f1c3"],
        ["f2c1", iconoNuevo, iconoNuevo]
    ],
    $seccion,
);




//////////////////////////////////////////////////////////////////////////////////////////////
//          Colocamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////


$seccion->add($tabla, fila: 0, columna: 0);




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