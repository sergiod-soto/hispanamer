<?php

use Dom\Text;

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

        // crear los overlays necesarios
        overlays: [

        ],
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
            //"css/prg500/prg500.css",
            //"css/prg500/TablaIzq.css"
        ],
    );





    /////////////////////////////////////////////////////////////////////////////////////////////////////////////
    //      Creamos los elementos 
    //      
    //      (tener en cuenta que si un elemento A usa otro B, 
    //      B debe ser creado antes)
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////







    /* #region base */

    $base = Seccion::crear(
        "base",
        "",
        false
    );

    $base->add(
        [
            Cabecera::createCabecera("Facturas de contado", "{\$nombre}", "0.0.1.20250512", "2025", []),
            $cuerpo = Seccion::crear("", "", true),
            PiePagina::createPiePagina(),
        ]
    );

    $cuerpo->add([
        $seccionIzq = Seccion::crear("seccionIzq", "", false),
        $seccionDer = Seccion::crear("", "", false),
    ]);

    /* #region seccionIzq */
    $seccionIzq->add([
        $seccionIzq1 = Seccion::crear("", "", false),
        $seccionIzq2 = Seccion::crear("", "", true),
        $seccionIzq3 = Seccion::crear("", "", true)
    ]);

    /* #region seccionIzq1 */
    $seccionIzq1->add([
        $seccionIzq11 = Seccion::crear("", "", true),
        $seccionIzq12 = Seccion::crear("", "", true),
        $seccionIzq13 = Seccion::crear("", "", true),
    ]);

    $seccionIzq11->add([
        Texto::crear("", "", "Cliente:"),
        TextBox::crear("", "", "", ""),
        DateBox::crear("", "", "Desde"),
        DateBox::crear("", "", "Hasta")
    ]);

    $seccionIzq12->add([
        Texto::crear("", "", "Nº Factura:"),
        TextBox::crear("", "", "", "")
    ]);

    $seccionIzq13->add([
        Texto::crear("", "", "Tipo de actualización"),
        SelectBox::crear("", "", "tipoActualizacion", [
            "0",
            "1",
            "2",
            "3"
        ], [
            "Facturas del día",
            "Tintométrico pendientes",
            "Tintométrico JATMIX  pendientes",
            "Tintométrico AQUAMIX pendientes"
        ], 0)
    ]);
    /* #endregion */

    /* #region seccionIzq2 (tabla) */
    $seccionIzq2->add([
        $tablaIzq = Tabla::crear("", "", [
            "Factura",
            "Fecha",
            "Cliente",
            "Nombre",
            "Kilos",
            "Base",
            "Asiento"
        ], [
            ["0", "1", "2", "3", "4", "5", "6"]
        ])
    ]);

    /* #endregion */

    /* #region seccionIzq3 */
    $seccionIzq3->add([
        Texto::crear("", "", "Kilos:"),
        Texto::crear("", "", ""),
        Texto::crear("", "", "Valor:"),
        Texto::crear("", "", "")
    ]);
    /* #endregion */

    /* #endregion */




    /* #region seccionDer */
    $seccionDer->add([
        $seccionDer1 = Seccion::crear("", "", true),
        $seccionDer2 = Seccion::crear("", "", true),
        $seccionDer3 = Seccion::crear("", "", true),
        $seccionDer4 = Seccion::crear("", "", true)
    ]);

    /* #region seccionDer1 */
    $seccionDer1->add([
        $seccionDer11 = Seccion::crear("", "", false),
        $seccionDer12 = Seccion::crear("", "", false)
    ]);

    /* #region seccionDer11 */
    $seccionDer11->add([
        $seccionDer11a = Seccion::crear("", "", false),
        $seccionDer11b = Seccion::crear("", "", true),
        $seccionDer11c = Seccion::crear("", "", true),
        $seccionDer11d = Seccion::crear("", "", true)
    ]);

    $seccionDer11a->add([
        $seccionDer11a1 = Seccion::crear("", "", true),
        $seccionDer11a2 = Seccion::crear("", "", true),
        $seccionDer11a3 = Seccion::crear("", "", true)
    ]);

    $seccionDer11a1->add([
        Texto::crear("", "", "Alta:"),
        Texto::crear("", "", "")
    ]);

    $seccionDer11a2->add([
        Texto::crear("", "", "Última actualización:"),
        Texto::crear("", "", "")
    ]);

    $seccionDer11a3->add([
        Texto::crear("", "", "Agente de venta:"),
        SelectBox::crear("", "", "", ["1"], ["No registrado"], 0)
    ]);

    /* #endregion */

    /* #region seccionDer12 */
    $seccionDer12->add([]);

    /* #endregion */


    /* #endregion */


    /* #region seccionDer2 */
    $seccionDer2->add([]);

    /* #endregion */

    /* #region seccionDer3 */
    $seccionDer3->add([]);

    /* #endregion */

    /* #region seccionDer4 */
    $seccionDer4->add([]);

    /* #endregion */

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
