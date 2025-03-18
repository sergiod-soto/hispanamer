<?php

use Dom\Text;

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

    /**
     *      realizo la consulta inicial
     */

    //$conexion = new Conexion("localhost", "hispanamer", "root", "025811");
    //$datos = $conexion->consulta("");














    $programa = Programa::crear(

        autor: "sergiod",
        fecha: "17/02/2025",
        nombre: "prg317",

        scriptsCabecera:
        [

        ],

        scriptsBody:
        [
            //"js/prg295/ElementosAGuardar.js",
            //"js/prg295/Focos.js",
            //"js/prg295/Tabla.js",
            //"js/prg295/prg295.js",
        ],

        sonidos:
        [
            //Sonidos::sonidoEj1->value
        ],

        css:
        [
            "css/prg295/prg295.css",
            "css/prg295/TimeBox.css",
            "css/prg295/Tabla.css",

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
        0,
        0
    );



    /* #region base */
    $base->add(
        [

            /* #region cabecera */
            Cabecera::getCabecera(
                0,
                0,
                "Boletines, tabla de propiedades definición de características a aplicar",
                "asdf",
                "2025",
                Cabecera::createFunctions(
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    "",
                    ""
                ),
            ),
            /* #endregion */

            $cuerpo = Seccion::crear
            (
                "",
                "body",
                1,
                0
            ),
            PiePagina::getPiePagina(2, 0),
        ]
    );
    /* #endregion */


    /* #region body */

    $cuerpo->add(
        [
            $cuerpoIzq = Seccion::crear(
                "",
                "",
                0,
                0
            ),
            $cuerpoDerecho = Seccion::crear(
                "",
                "",
                0,
                1
            ),
        ]
    );
    /* #endregion */

    /* #region parte izq */
    $cuerpoIzq->add([
        $cuerpoIzq1 = Seccion::crear(
            "",
            "",
            0,
            0
        ),
        $cuerpoIzq2 = Seccion::crear(
            "",
            "",
            1,
            0
        ),
        $cuerpoIzq3 = Seccion::crear(
            "",
            "",
            2,
            0
        ),
        $cuerpoIzq4 = Seccion::crear(
            "",
            "",
            3,
            0
        ),
    ]);

    $cuerpoIzq1->add(
        [
            Texto::crear(
                "",
                "",
                "Relación de familias.",
                0,
                0
            )
        ]
    );

    $cuerpoIzq2->add(
        [
            Texto::crear(
                "",
                "",
                "Buscar",
                0,
                0
            ),
            TextBox::crear(
                "",
                "",
                "",
                "",
                0,
                2
            ),
            Button::crear(
                "",
                "",
                "Buscar",
                "Buscar",
                "",
                0,
                4
            )
        ]
    );

    $cuerpoIzq3->add(
        [
            Tabla::crear(
                "",
                "",
                ["Código", "Familia"],
                [
                    [1, 2],
                    [3, 4],
                    [5, 6]
                ],
                0,
                0,

            )
        ]
    );

    $cuerpoIzq4->add([

    ]);



    /* #endregion */






    ////////////////////////////////////////////////////////////////////////////////////////////
    //          Datos a compartir con JS
    ////////////////////////////////////////////////////////////////////////////////////////////


    $datos = json_encode($datos);








    //////////////////////////////////////////////////////////////////////////////////////////////
    //          Generamos el HTML final
    //////////////////////////////////////////////////////////////////////////////////////////////







    //.......................
    $cabecera =
        "
        <meta charset='UTF-8'>
        <title>$programa->nombre</title>
        " . favicon . "
        <!-- necesario para que el sistema de sesion sepa en que programa estamos -->
        <script>localStorage.setItem(\"prgActual\", \"" . $programa->nombre . "\");</script>
         <script>
            var tabla = '$datos';
        </script>
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
    $data = json_decode(file_get_contents("php://input"), true);

    error_log($data["request"]);

    // return al cliente
    // echo "{\"boolean\":true}";

}


/*                      funcion de un boton que manda un objeto al servidor
"
                        var destino = 'http://localhost:8000/prg295.php';
                        var p = new Peticion(JSON.stringify(
                        {
                            var destino = 'http://localhost:8000/prg295.php';
                            p = new Peticion(JSON.stringify(
                            {
                                'request': 'SELECT * FROM ...',
                            }
                        ), destino);
                     "
*/

?>