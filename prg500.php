<?php

use Dom\Text;

include_once "php/Includes.php";



$method = $_SERVER["REQUEST_METHOD"];



if ($method === "GET") {

    //////////////////////////////////////////////////////////////////////////////////////////////
    //          1� se crean el programa y la conexion
    //          2� se hacen las consultas necesarias
    //          3� se crean los elementos
    //          4� se colocan
    //          5� se renderiza
    //////////////////////////////////////////////////////////////////////////////////////////////

    /**
     *      realizo la consulta inicial
     */

    //$conexion = new Conexion("localhost", "hispanamer", "root", "025811");
    //$datos = $conexion->consulta("");














    $programa = Programa::crear(

        autor: "sergiod",
        fecha: "25/04/2025",
        nombre: "prg500",

        scriptsCabecera:
        [
            //"js/prg500/Desplegable1.js",
        ],

        scriptsBody:
        [
            //"js/prg500/prg500.js",
            //"js/prg500/TablaIzq.js",
            //"js/prg500/TablaDer.js"
        ],

        sonidos:
        [

        ],

        css:
        [
            "css/prg500/prg317.css",
            "css/prg500/TablaIzq.css"
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
            Desplegable::crear(
                "",
                [
                    "Copiar propiedades",
                    "Pegar propiedades"
                ],
                [
                    "copiarPropiedades()",
                    "pegarPropiedades()"
                ]
            ),

            /* #region cabecera */
            Cabecera::getCabecera(
                0,
                0,
                "Ventas tienda.",
                "1.0",
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
                "Relaci�n de familias.",
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
                iconoLupa,
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
                "tablaIzq",
                "",
                ["C�digo", "Familia"],
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

    /* #endregion */

    /* #region cuerpo derecha */

    $cuerpoDerecho->add([

        $derSup = Seccion::crear(
            "",
            "",
            0,
            0
        ),
        $derMedio = Seccion::crear(
            "",
            "",
            1,
            0
        ),
        $derInf = Seccion::crear(
            "",
            "",
            2,
            0
        ),
    ]);

    /* #region derecha superior */

    $derSup->add(
        [
            $derSup1 = Seccion::crear(
                "propiedadesAsignadas",
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
            $derSup4 = Seccion::crear(
                "",
                "",
                3,
                0
            ),
        ]
    );

    $derSup1->add(
        [
            Texto::crear(
                "",
                "",
                "Propiedades asignadas a la familia:",
                0,
                0
            ),
            Texto::crear(
                "",
                "",
                "asdf",
                0,
                1
            ),
            Texto::crear(
                "",
                "",
                "asdf",
                0,
                2
            ),

        ]
    );

    $derSup2->add(
        [
            Texto::crear(
                "",
                "",
                "Nota: Requerido y obtenido se obtiene valor del archivo",
                0,
                0
            )
        ]
    );

    $derSup3->add(
        [
            Tabla::crear(
                "tablaDer",
                "",
                ["C�digo", "Requerido", "Obtenido", "Norma", "Unidades"],
                [
                    ["001", "GESALMA1.VISCO", "GESFA3", "UNE-234-2-34", "K.U"],
                    ["003", "", "GESALMA1", "UNE-34-563-4", "micras"],
                    ["002", "100", "100", "UNE 2 56", ""],
                    ["10", "GESALMA1.VISCO", "hESFA3", "UNE-234-2-34", "K.U"],
                    ["11", "GESALMA1.VISCO", "iESFA3", "UNE-234-2-34", "K.U"],
                    ["2", "GESALMA1.VISCO", "GESFA4", "UNE-234-2-34", "K.U"]
                ],
                0,
                0
            ),
            Seccion::crear(
                "",
                "",
                0,
                1
            )
        ]
    );

    /* #endregion */

    /* #region derecha medio */

    $derMedio->add([
        Texto::crear(
            "",
            "",
            "",
            0,
            2
        ),
    ]);

    /* #endregion */

    /* #region derecha inferior */

    $derInf->add([
        button::crear(
            "",
            "",
            "ABC",
            "",
            "ordenacionAlfabetica(document.getElementById('tablatablaDer'), 3)",
            0,
            1
        ),
        button::crear(
            "",
            "",
            "123",
            "",
            "ordenacionNumerica(document.getElementById('tablatablaDer'), 1)",
            0,
            0
        ),

    ]);
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