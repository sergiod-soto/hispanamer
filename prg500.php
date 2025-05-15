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

        // crear los overlays necesarios
        overlays: [

        ],
        scriptsCabecera: [
            //"js/prg500/Desplegable1.js",
        ],

        scriptsBody: [
            "js/prg500/prg500.js",
            //"js/prg500/TablaIzq.js",
            "js/prg500/TablaDer.js",
            "js/prg500/Desplegable.js"
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







    /* #region base */

    $base = Seccion::crear(
        "base",
        "",
        false
    );

    $base->add(
        [
            Desplegable::crear("", [
                "Ficha cliente",
                "Consulta existencias",
                "Movimientos artículo",
                "Pedidos pendientes de servir",
                "Últimos envíos",
                "Precios clientes",
                "Fabricación",
                "Costes"
            ], [
                "functionFichaCliente()",
                "",
                "",
                "",
                "",
                "",
                "",
                "",
            ]),
            Cabecera::createCabecera("Facturas de contado", "{\$nombre}", "0.0.1.20250512", "2025", []),
            $cuerpo = Seccion::crear("", "", true),
            PiePagina::createPiePagina(),
        ]
    );

    $cuerpo->add([
        $seccionIzq = Seccion::crear("seccionIzq", "", false),
        $seccionDer = Seccion::crear("seccionDer", "", false),
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
        DateBox::crear("db1", "", "Desde"),
        DateBox::crear("db2", "", "Hasta")
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
        $tablaIzq = Tabla::crear("tablaIzq", "", [
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
        $seccionDer2 = Seccion::crear("", "", false),
        $seccionDer3 = Seccion::crear("", "", false)
    ]);

    /* #region seccionDer1 */
    $seccionDer1->add([
        $seccionDer11 = Seccion::crear("", "", false),
        $seccionDer12 = Seccion::crear("seccionDer12", "", false)
    ]);

    /* #region seccionDer11 */
    $seccionDer11->add([
        $seccionDer11a = Seccion::crear("", "", false),
        $seccionDer11b = Seccion::crear("", "", true),
        $seccionDer11c = Seccion::crear("", "", false),
        $seccionDer11d = Seccion::crear("", "", false)
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


    $seccionDer11b->add([
        $seccionDer11b1 = Seccion::crear("", "", true)
    ]);

    $seccionDer11b1->add([
        Texto::crear("", "", "Nº Factura:"),
        Texto::crear("", "", "NaN"),
        DateBox::crear("", "", "Fecha")
    ]);

    $seccionDer11c->add([
        $seccionDer11c1 = Seccion::crear("", "", true),
        $seccionDer11c2 = Seccion::crear("", "", true),
        $seccionDer11c3 = Seccion::crear("", "", true),
        $seccionDer11c4 = Seccion::crear("", "", true)
    ]);

    $seccionDer11c1->add([
        Texto::crear("", "", "Cliente:"),
        Texto::crear("", "", "")
    ]);

    $seccionDer11c2->add([
        Texto::crear("", "", "Nº pedido de cliente:"),
        Texto::crear("", "", "")
    ]);

    $seccionDer11c3->add([
        Texto::crear("", "", "Depósito de salida:"),
        SelectBox::crear("", "", "", [
            "1"
        ], [
            "muchas opciones"
        ], 0)
    ]);

    $seccionDer11c4->add([
        Texto::crear("", "", "Notificación e-mail:"),
        RadioButton::crear(
            "",
            "",
            ["Pendiente", "Notificado", "NO Modificar"],
            ["0", "1", "2"],
            "notificacion_www",
            0,
            PosicionTexto::IZQUIERDA
        )
    ]);

    /* #endregion */

    /* #region seccionDer12 */
    $seccionDer12->add([
        $seccionDer12a = Seccion::crear("", "", true),
        $seccionDer12b = Seccion::crear("", "", true),
        $seccionDer12c = Seccion::crear("", "", false),
        $seccionDer12d = Seccion::crear("", "", true),
    ]);

    $seccionDer12a->add([
        Texto::crear("", "", "Dirección postal:"),
        TextBox::crear("", "", "", "Otra dirección postal")
    ]);

    $seccionDer12b->add([
        Texto::crear("", "", "¿vacio?"),
    ]);

    $seccionDer12c->add([
        $seccionDer12c1 = Seccion::crear("", "", true),
        $seccionDer12c2 = Seccion::crear("", "", true)
    ]);
    $seccionDer12c1->add([
        Texto::crear("", "", "Crédito:"),
        Texto::crear("", "", "0"),
        Texto::crear("", "", "Riesgo:"),
        Texto::crear("", "", "0"),
        Texto::crear("", "", "Dtos li, ge, ppp:"),
        Texto::crear("", "", "0"),
        Texto::crear("", "", "0"),
        Texto::crear("", "", "0"),
    ]);
    $seccionDer12c2->add([
        Texto::crear("", "", "Tarifa:"),
        Texto::crear("", "", "0"),
        Texto::crear("", "", "Pago:"),
        Texto::crear("", "", "0"),
    ]);

    $seccionDer12d->add([
        $seccionDer12d1 = Seccion::crear("", "", false),
        $seccionDer12d2 = Seccion::crear("", "", false)
    ]);
    $seccionDer12d1->add([
        Texto::crear("", "", "Notas comerciales, precios:"),
        Texto::crear("", "", "¿vacio?")
    ]);

    $seccionDer12d2->add([
        Texto::crear("", "", "Condiciones especiales:"),
        Texto::crear("", "", "¿vacio?")
    ]);


    /* #endregion */

    /* #endregion */

    /* #region seccionDer2 */
    $seccionDer2->add([
        $seccionDer2a = Seccion::crear("", "", true),
        $seccionDer2b = Seccion::crear("", "", true),
        $seccionDer2c = Seccion::crear("", "", true),
    ]);

    $seccionDer2a->add([
        Button::crear("", "", iconoNuevo, "Nueva línea", ""),
        Button::crear("", "", iconoEliminar, "Baja línea", ""),
        Button::crear("", "", iconoInterrogacion, "Opciones de fabricación, fechas", ""),
    ]);

    $seccionDer2b->add([
        Tabla::crear("tablaDer", "", [
            "Albarán",
            "Código",
            "Descripción",
            "Cantidad",
            "Total KLU",
            "PVP",
            "Dto li",
            "€ bruto",
            "Lote"
        ], [
            ["1", "2", "3", "4", "5", "6", "7", "8", "9"],
            ["1", "2", "3", "4", "5", "6", "7", "8", "9"]
        ])
    ]);

    $seccionDer2c->add([
        TextBox::crear("", "", "", "LI"),
        TextBox::crear("", "", "", "Referencia"),
        TextBox::crear("", "", "", "Cantidad"),
        TextBox::crear("", "", "", "Capacidad"),
        TextBox::crear("", "", "", "KLU"),
        TextBox::crear("", "", "", "PVP"),
        TextBox::crear("", "", "", "Dto li"),
        TextBox::crear("", "", "", "Descripción"),
        Button::crear("", "", iconoGuardar, "Guardar", "")
    ]);
    /* #endregion */

    /* #region seccionDer3 */
    $seccionDer3->add([
        $seccionDer3a = Seccion::crear("", "", true),
        $seccionDer3b = Seccion::crear("", "", true)
    ]);

    $seccionDer3a->add([
        $seccionDer3a1 = Seccion::crear("", "", true),
        $seccionDer3a2 = Seccion::crear("", "", false)
    ]);

    $seccionDer3a1->add([
        Texto::crear("", "", "VACIO")
    ]);

    $seccionDer3a2->add([
        Texto::crear("", "", "Notas de la Factura:"),
        Texto::crear("", "", "VACIO"),
    ]);

    $seccionDer3b->add([
        $seccionDer3b1 = Seccion::crear("", "", false),
        $seccionDer3b2 = Seccion::crear("", "", true)
    ]);

    $seccionDer3b1->add([
        $seccionDer3b1a = Seccion::crear("", "", true),
        $seccionDer3b1b = Seccion::crear("", "", true)
    ]);

    $seccionDer3b1a->add([
        Texto::crear("", "", "Kilos KLU"),
        Texto::crear("", "", "Kilos Reales"),
        Texto::crear("", "", "Valor Bruto"),
        Texto::crear("", "", "Dto General (%)"),
        Texto::crear("", "", "Dto ppp (%)"),
        Texto::crear("", "", "Base"),
        Texto::crear("", "", "IVA: 0.00"),
        Texto::crear("", "", "RE: 0.00"),
        Texto::crear("", "", "Total Valor €")
    ]);

    $seccionDer3b1b->add([
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00"),
        Texto::crear("", "", "0.00")
    ]);

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
