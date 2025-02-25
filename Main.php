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



$prg = "prg1";




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
            "js/ControlSesion.js",
            "js/prg1/boton_1.js"
        ],
        css:
        [

        ],
    );






    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Creamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////

    $seccion = Seccion::crear
    (
        Elemento::getNewId(),
        "",
        $programa
    );


    $texto = TextBox::crear(
        Elemento::getNewId(),
        "",
        "",
        "PLACEHOLDER",
        $seccion,
    );

    $texto2 = TextBox::crear(
        Elemento::getNewId(),
        "",
        "texto de textBox2",
        "",
        $seccion,
    );

    $boton = Button::crear(
        Elemento::getNewId(),
        "",
        "XXX",
        "",
        $seccion
    );


    $_SESSION["a"] = $texto->texto;


    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Colocamos los elementos 
    //////////////////////////////////////////////////////////////////////////////////////////////


    $seccion->add($texto, 0, 0);
    $seccion->add($texto2, 0, 10);
    $seccion->add($boton, 2, 0);






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
    <script>
    localStorage.setItem(\"prgActual\", \"" . $prg . "\");
    </script>
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