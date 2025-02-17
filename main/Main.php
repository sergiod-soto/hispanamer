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
$botonAceptar = Button::crear(
    Elemento::getNewId(),
    "",
    "Aceptar",
    null,
    $programa,
);



//............................................
// otro boton
$botonCancelar = Button::crear(
    Elemento::getNewId(),
    "",
    "Cancelar",
    null,
    $programa,
);

//............................................
// otro boton
$botonAux = Button::crear(
    Elemento::getNewId(),
    "",
    "aux",
    null,
    $programa,
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


$seccion2->add($label1, 0, 0);
$seccion2->add($label2, 0, 1);

$seccion3->add($label3, 0, 0);
$seccion3->add($label4, 0, 1);

$seccion4->add($label5, 0, 0);
$seccion4->add($label6, 0, 1);







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