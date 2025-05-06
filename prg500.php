<?php



include_once "php/Includes.php";



$method = $_SERVER["REQUEST_METHOD"];



if ($method === "GET") {

    //////////////////////////////////////////////////////////////////////////////////////////////
    //          1) se crean el programa y la conexion
    //          2) se hacen las consultas necesarias
    //          3) se crean los elementos
    //          4) se colocan
    //          5) se renderiza
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
            "js/prg500/prg500.js",
            //"js/prg500/TablaIzq.js",
            //"js/prg500/TablaDer.js"
        ],

        sonidos: [],

        css: [
            "css/prg500/prg500.css",
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
        "",
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
                "seccionIzq",
                "",
                1,
                0
            ),
            $seccionDer = Seccion::crear(
                "seccionDer",
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
                "seccionIzqSup",
                "",
                0,
                0
            ),
            $seccionIzqInf = Seccion::crear(
                "seccionIzqInf",
                "",
                1,
                0
            )
        ]
    );

    $seccionIzqSup->add(
        [
            $seccionIzqSup1 = Seccion::crear(
                "seccionIzqSup1",
                "",
                0,
                0
            ),
            $seccionIzqSup2 = Seccion::crear(
                "seccionIzqSup2",
                "",
                1,
                0
            ),
            $seccionIzqSup3 = Seccion::crear(
                "seccionIzqSup3",
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
                "Inicio",
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
                "Fin",
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

    $seccionIzqSup3->add(
        [
            Texto::crear(
                "",
                "",
                "Tipo de actualización:",
                0,
                0
            ),
            SelectBox::crear(
                "",
                "",
                "tipoActualizacion",
                ["valor1", "valor2", "valor3", "valor4"],
                [
                    "Facturas del Día",
                    "Tintométrico Pendientes",
                    "Tintométrico JATMIX Pendientes",
                    "Tintométrico AQUAMIX Pendientes"
                ],
                0,
                0,
                1
            )
        ]
    );
    /* #endregion */

    $datos = [
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"],
        [" ", "b1", "c1", "d1", "e1", "f1", "g1", "h1"]
    ];
    $datos = Tabla::addId($datos, 0);

    /*
    $conexion = new Conexion(
        Conexion::SERVERNAME,
        Conexion::DATABASE,
        Conexion::USUARIO,
        Conexion::PASSWORD
    );
    */

    $datos2 = null;

    $seccionIzqInf->add(
        [
            $tabla = Tabla::crear(
                "",
                "",
                ["", "-", "Factura", "Fecha", "Cliente", "Nombre", "Kilos", "Base", "Asiento"],
                $datos,
                0,
                0
            ),
            $seccionBajoTabla = Seccion::crear(
                "asdasdasd",
                "",
                1,
                0
            )
        ]
    );

    $seccionBajoTabla->add([
        Texto::crear(
            "",
            "",
            "Kilos:",
            0,
            0
        ),
        Texto::crear(
            "idKilosTabla",
            "",
            "",
            0,
            1
        ),
        Texto::crear(
            "",
            "",
            "Valor:",
            0,
            2
        ),
        Texto::crear(
            "idValorTabla",
            "",
            "",
            0,
            3
        ),
    ]);

    $tabla->setMaxHeight("60vh");
    $tabla->setMaxWidht("90%");


    /* #endregion */


    /* #region seccionDer */
    $seccionDer->add(
        [
            $seccionDer1 = Seccion::crear(
                "seccionDer1",
                "",
                0,
                0
            ),
            $seccionDer2 = Seccion::crear(
                "seccionDer2",
                "",
                0,
                1
            ),
            $seccionDer3 = Seccion::crear(
                "seccionDer3",
                "",
                1,
                0
            ),
            $seccionDer4 = Seccion::crear(
                "seccionDer4",
                "",
                2,
                0
            ),
            $seccionDer5 = Seccion::crear(
                "seccionDer5",
                "",
                3,
                0
            ),
        ]
    );



    /* #region seccionDer1 */

    $seccionDer1->add([
        $seccionDer11 = Seccion::crear(
            "seccionDer11",
            "",
            0,
            0
        ),
        $seccionDer12 = Seccion::crear(
            "seccionDer12",
            "",
            1,
            0
        ),
        $seccionDer13 = Seccion::crear(
            "seccionDer13",
            "",
            2,
            0
        ),
        $seccionDer14 = Seccion::crear(
            "seccionDer14",
            "",
            3,
            0
        )
    ]);

    $seccionDer11->add([
        Texto::crear(
            "",
            "clase1",
            "Alta:",
            0,
            0
        ),
        Texto::crear(
            "",
            "clase1",
            "Lorem ipsum1",
            0,
            1
        ),
        Texto::crear(
            "",
            "clase1",
            "Ultima Actualización:",
            1,
            0
        ),
        Texto::crear(
            "",
            "clase1",
            "Lorem ipsum2",
            1,
            1
        ),
        Texto::crear(
            "",
            "clase1",
            "Agente de venta",
            2,
            0
        ),
        Texto::crear(
            "",
            "clase1",
            "Lorem ipsum3",
            2,
            1
        ),
    ]);


    $seccionDer12->add([
        Linea::crear(
            "",
            "",
            0,
            0
        ),
        $seccionDer121 = Seccion::crear(
            "",
            "",
            1,
            0
        )
    ]);

    $seccionDer121->add(
        [
            Texto::crear(
                "",
                "",
                "Nº de Factura:",
                0,
                0
            ),
            Texto::crear(
                "labelNumFactura",
                "",
                "",
                0,
                1
            ),
            Texto::crear(
                "",
                "",
                "De Fecha:",
                0,
                2
            ),
            DateBox::crear(
                "dateBox1",
                "",
                "",
                0,
                3
            )
        ]
    );

    /* #endregion */

    /* #region seccionDer2 */
  




    $seccionDer2->add([
        $seccionDer21 = Seccion::crear(
            "",
            "",
            0,
            0
        ),
        $seccionDer22 = Seccion::crear(
            "",
            "",
            1,
            0
        ),
        $seccionDer23 = Seccion::crear(
            "",
            "",
            2,
            0
        ),
        $seccionDer24 = Seccion::crear(
            "",
            "",
            3,
            0
        ),
    ]);

    $seccionDer21->add([
        Texto::crear(
            "",
            "",
            "Direccion Postal",
            0,
            0
        ),
        Texto::crear(
            "seccionDer21TextOutput",
            "",
            "",
            0,
            1
        )
    ]);
    $seccionDer22->add([
        Texto::crear(
            "",
            "",
            "VACIO",
            0,
            1
        )
    ]);
    $seccionDer23->add([
        Texto::crear(
            "",
            ":",
            "Crédito",
            0,
            0
        ),
        Texto::crear(
            "creditoOutput",
            "",
            "",
            0,
            1
        ),
        Texto::crear(
            "",
            "",
            "Riesgo:",
            0,
            2
        ),
        Texto::crear(
            "riesgoOutput",
            "",
            "",
            0,
            3
        ),
        Texto::crear(
            "",
            "",
            "Dtos li, ge, ppp:",
            0,
            4
        ),
        Texto::crear(
            "cosaRaraOutput1",
            "",
            "",
            0,
            5
        ),
        Texto::crear(
            "cosaRaraOutput2",
            "",
            "",
            0,
            6
        ),
        Texto::crear(
            "cosaRaraOutput3",
            "",
            "",
            0,
            7
        ),
        Texto::crear(
            "",
            "",
            "Tarifa:",
            1,
            0
        ),
        Texto::crear(
            "tarifaOutput",
            "",
            "",
            1,
            1
        ),
        Texto::crear(
            "",
            "",
            "Pago",
            1,
            2
        ),
        Texto::crear(
            "pagoOutput",
            "",
            "",
            1,
            3
        ),
    ]);




    $seccionDer24->add([
        $seccionDer241 = Seccion::crear(
            "",
            "",
            0,
            0
        ),
        $seccionDer242 = Seccion::crear(
            "",
            "",
            0,
            1
        ),
    ]);
    /* #endregion */

   




    /* #region seccionDer3 */

    /* #endregion */

    //$seccionDer3->


    /* #region seccionDer4 */

    /* #endregion */







    /* #region seccionDer5 */

    /* #endregion */





    /* #region seccionDer1 */



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
