<?php

// class autoloader
spl_autoload_register(function ($class_name) {
    $file = "../prg/" . $class_name . '.php';
    include_once $file;
});





//////////////////////////////////////////////////////////////////////////////////////////////
//          Declaramos los elementos que componen el programa
//////////////////////////////////////////////////////////////////////////////////////////////

//............................................
// el programa base
$programa = Programa::crear(autor: "sergiod", fecha: "17/02/2025");















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
    null,
    $seccion2,
);



//............................................
// otro boton
$boton2 = Button::crear(
    Elemento::getNewId(),
    "",
    "2 ",
    null,
    $seccion2,
);

//............................................
// otro boton
$boton3 = Button::crear(
    Elemento::getNewId(),
    "",
    "3 ",
    null,
    $seccion3,
);
//............................................
// otro boton
$boton4 = Button::crear(
    Elemento::getNewId(),
    "",
    "4 ",
    null,
    $seccion3,
);
//............................................
// otro boton
$boton5 = Button::crear(
    Elemento::getNewId(),
    "",
    "5 ",
    null,
    $seccion4,
);
//............................................
// otro boton
$boton6 = Button::crear(
    Elemento::getNewId(),
    "",
    "6 ",
    null,
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






//////////////////////////////////////////////////////////////////////////////////////////////
//          Colocamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////


$seccion->add($seccion2, fila: 0, columna: 1);
$seccion->add($seccion3, fila: 1, columna: 0);
$seccion->add($seccion4, fila: 1, columna: 1);


$seccion2->add($boton1, 0, 0);
$seccion2->add($boton2, 0, 1);

$seccion3->add($boton3, 0, 0);
$seccion3->add($boton4, 0, 1);

$seccion4->add($boton5, 0, 0);
$seccion4->add($boton6, 0, 1);







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