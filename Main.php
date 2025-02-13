<?php

// class autoloader
spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});



//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//          Definimos los elementos que componen el programa
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////

//............................................
// el prorgama base
$programa = Programa::crear();




//............................................
// un boton
$botonAceptar = Button::crear(
    $programa->getNewIdElemento(),
    null,
    "Aceptar",
    null,
    null,
    $programa,
    null,
);



//............................................
// otro boton
$botonCancelar = Button::crear(
    $programa->getNewIdElemento(),
    null,
    "Cancelar",
    null,
    null,
    $programa,
    null,
);

//............................................
// otro boton
$botonAux = Button::crear(
    $programa->getNewIdElemento(),
    null,
    "aux",
    null,
    null,
    $programa,
    null,
);


//............................................
// una seccion

$seccion = Seccion::crear(
    $programa->getNewIdElemento(),
    null,
    null,
    $programa,
    null,
);

$seccion->add($botonAceptar, 0, columna: 0);
$seccion->add($botonAceptar, 0, 1);

$seccion->add($botonAux, 1, 0);
$seccion->add($botonAux, 1, 1);
$seccion->add($botonCancelar, 1, 2);

$seccion->add($botonCancelar, 2, 2);
$seccion->add($botonAceptar, 10, columna: 3);










//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//          Colocamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////






$titulo = "Titulo";

$cabecera =
    "
    <meta charset='UTF-8'>
    <title>$titulo</title>
    ";

$cuerpo =
    "" .
    $seccion->renderizar();
"";

$programa->titulo = $titulo;
$programa->cabecera = $cabecera;
$programa->cuerpo = $cuerpo;

echo ($programa->Renderizar());


?>