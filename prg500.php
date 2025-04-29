<?php



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

        scriptsCabecera: [
            //"js/prg500/Desplegable1.js",
        ],

        scriptsBody: [
            //"js/prg500/prg500.js",
            //"js/prg500/TablaIzq.js",
            //"js/prg500/TablaDer.js"
        ],

        sonidos: [],

        css: [
            //"css/prg500/prg317.css",
            //"css/prg500/TablaIzq.css"
        ],
    );





    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //      Creamos los elementos 
    //      
    //      (tener en cuenta que si un elemento A usa otro B, 
    //      B debe ser creado antes)
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////



    $base = Seccion::crear(
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

            $cuerpo = Seccion::crear(
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
            $seccionIzq = Seccion::crear(
                "",
                "",
                1,
                0
            ),
            $seccionDer = Seccion::crear(
                "",
                "",
                1,
                1
            )
        ]
    );
    /* #endregion */


    /* #region seccionIzq */

    $seccionIzq->add(
        [
            $seccionIzqSup = Seccion::crear(
                "",
                "",
                0,
                0
            ),
            $seccionIzqInf = Seccion::crear(
                "",
                "",
                1,
                0
            )
        ]
    );

    $seccionIzqSup->add(
        [
            $seccionIzqSup1 = Seccion::crear(
                "",
                "",
                0,
                0
            ),
            $seccionIzqSup2 = Seccion::crear(
                "",
                "",
                1,
                0
            ),
            $seccionIzqSup3 = Seccion::crear(
                "",
                "",
                2,
                0
            ),

        ]
    );
    /* #region seccionIzqSup1*/
    $seccionIzqSup1->add(
        [
            Texto::crear(
                "",
                "",
                "Cliente:",
                0,
                0
            ),
            TextBox::crear(
                "",
                "",
                "",
                "Nº Cliente",
                0,
                1
            ),
            Button::crear(
                "",
                "",
                "Buscar",
                "",
                "",
                0,
                2
            ),
            DateBox::crear(
                "",
                "",
                "Inicio📅",
                0,
                3
            ),
            Texto::crear(
                "",
                "",
                "/",
                0,
                4,
            ),
            DateBox::crear(
                "",
                "",
                "Fin📅",
                0,
                5
            ),
        ]
    );
    /* #endregion */

    /* #region seccionIzqSup2*/
    $seccionIzqSup2->add(
        [
            Texto::crear(
                "",
                "",
                "Nº Factura",
                0,
                0
            ),
            TextBox::crear(
                "",
                "",
                "",
                "Número",
                0,
                1
            )
        ]
    );
    /* #endregion */


    /* #region seccionIzqSup3*/
    /*
    $seccionIzqSup3->add(
        []
    );
    */
    /* #endregion */




    $seccionIzqInf->add(
        [
            Tabla::crear(
                "",
                "",
                ["a", "b", "c"],
                [
                    ["a1", "b1", "c1"],
                    ["a2", "b2", "c2"],
                    ["a3", "b3", "c3"]
                ],
                0,
                0
            )
        ]
    );
    /* #endregion */


    /* #region seccionDer */


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
