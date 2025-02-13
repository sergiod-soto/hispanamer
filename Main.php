<?php

// class autoloader
spl_autoload_register(function ($class_name) {
    include_once $class_name . '.php';
});



//////////////////////////////////////////////////////////////////////////////////////////////
//          Definimos los elementos que componen el programa
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
    $programa,
    null,
);


//............................................
// una seccion
$seccion = Seccion::crear(
    $programa->getNewIdElemento(),
    null,
    $programa,
    $programa,
);

//............................................
// un texto
$label1 = Texto::crear(
    $programa->getNewIdElemento(),
    null,
    "asdasdasd",
    $programa,
    "",
    "",
);










//////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////
//          Colocamos los elementos 
//////////////////////////////////////////////////////////////////////////////////////////////
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
echo ($htmlPrograma);
//.......................
?>