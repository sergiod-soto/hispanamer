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

        ],

        sonidos:
        [

        ],

        css:
        [
            "css/prg317/prg317.css",
            "css/prg317/Tabla.css"
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
                "cuerpo",
                1,
                0
            ),
            PiePagina::getPiePagina(2, 0),
        ]
    );
    /* #endregion */


    /* #region cuerpo */

    $cuerpo->add(
        [
            $cuerpoIzq = Seccion::crear(
                "cuerpoIzq",
                "",
                0,
                0
            ),
            $cuerpoDerecho = Seccion::crear(
                "cuerpoDer",
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
                "tabla",
                "",
                ["Código", "Familia"],
                [
                    ["00001", "ASDFASDF"],
                    ["00003", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                    ["00005", "ASDFASDF"],
                ],
                0,
                0,

            )
        ]
    );

    $cuerpoIzq4->add([
        Texto::crear(
            "",
            "",
            "Copiar propiedades de una familia a otra",
            0,
            0
        ),
        $cuerpoIzq4CopiaPropiedades = Seccion::crear(
            "",
            "",
            1,
            0
        )
    ]);

    $cuerpoIzq4CopiaPropiedades->add([

        $copiaPropiedades1 = Seccion::crear(
            "",
            "",
            0,
            0
        ),
        $copiaPropiedades2 = Seccion::crear(
            "",
            "",
            0,
            1
        ),
        $copiaPropiedades3 = Seccion::crear(
            "",
            "",
            0,
            2
        ),
    ]);

    $copiaPropiedades1->add(
        [
            Texto::crear(
                "",
                "",
                "Familia origen",
                0,
                0
            ),
            TextBox::crear(
                "",
                "",
                "",
                "",
                1,
                0
            )
        ]
    );



    $copiaPropiedades2->add([
        Button::crear(
            "",
            "",
            iconoFlechaAdelante,
            "Copiar propiedades",
            "",
            0,
            0
        )
    ]);



    $copiaPropiedades3->add([
        Texto::crear(
            "",
            "",
            "Familia destino",
            0,
            0
        ),
        TextBox::crear(
            "",
            "",
            "",
            "",
            1,
            0
        )
    ]);
    /* #endregion */



    /* #region cuerpo derecha */
    $cuerpoDerecho->add([

        $derSup = Seccion::crear(
            "",
            "",
            0,
            0
        ),
        $derInf = Seccion::crear(
            "",
            "",
            1,
            0
        ),
    ]);


    /* #region derecha superior */

    $derSup->add(
        [
            $derSup1 = Seccion::crear(
                "",
                "",
                0,
                0
            ),
            $derSup2 = Seccion::crear(
                "",
                "",
                1,
                0
            ),
            $derSup3 = Seccion::crear(
                "",
                "",
                2,
                0
            ),
        ]
    );

    /* #endregion */


    /* #region derecha inferior */

    $derInf->add([]);

    /* #endregion */


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