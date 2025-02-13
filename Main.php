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
    "Cancelar",
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
    $programa,
    null,
);

$seccion->add($botonAceptar, 0, 0);
$seccion->printMatriz();







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
    $botonAceptar->renderizar() .
    $programa->nuevaLinea() .
    $botonCancelar->renderizar() .
    "";

$programa->titulo = $titulo;
$programa->cabecera = $cabecera;
$programa->cuerpo = $cuerpo;

echo ($programa->Renderizar());

?>