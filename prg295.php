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
        nombre: "prg295",
        scriptsCabecera:
        [

        ],
        scriptsBody:
        [
            "js/prg1/ElementosAGuardar.js",
        ],
        sonidos:
        [
            Sonidos::sonidoEj1->value
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

    $base = Seccion::crear
    (
        Elemento::getNewId(),
        "",
    );



    $base->add(
        [
            [
                // cabecera:
                $sCabecera = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                0,
                0
            ],
            [
                $sCuerpo = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                1,
                0
            ]
        ]
    );



    $sCabecera->add(
        [
            [
                $sCabeceraSup = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                0,
                0
            ],
            [
                $sCabeceraInf = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                1,
                0
            ]
        ]
    );




    $sCabeceraSup->add([
        [
            $botonAtrasCabecera = Button::crear(
                Elemento::getNewId(),
                "",
                iconoFlechaAtras,
                "console.debug('Atras')"
            ),
            10,
            10
        ],
        [
            Link::crear(
                Elemento::getNewId(),
                "",
                "http://localhost/corporativo/prg181.php",
                Target::Blank,
                Imagen::crear(
                    Elemento::getNewId(),
                    "",
                    Imagenes::Hispanamer
                ),
                ""
            ),
            10,
            20
        ],
        [
            Texto::crear(
                Elemento::getNewId(),
                "",
                "Boletines de calidad. Tabla de unidades de medidas."
            ),
            10,
            30
        ],
        [
            Texto::crear(
                Elemento::getNewId(),
                "",
                Programa::fecha(),
            ),
            10,
            40

        ],
    ]);


    /////


    $sCabeceraInf->add(
        [
            [
                $sCabeceraInf1 = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                0,
                10
            ],
            [
                $sCabeceraInf2 = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                0,
                20
            ],
            [
                $sCabeceraInf3 = Seccion::crear
                (
                    Elemento::getNewId(),
                    "",
                ),
                0,
                30
            ]
        ]
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
        <!-- necesario para que el sistema de sesion sepa en que programa estamos -->
        <script>localStorage.setItem(\"prgActual\", \"" . $programa->nombre . "\");</script>
        ";
    //.......................


    //.......................
    $cuerpo =
        "" .
        $base->renderizar() .
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