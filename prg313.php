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

    /**
     *      realizo la consulta inicial
     */

    $conexion = new Conexion("localhost", "hispanamer", "root", "025811");
    $datos = $conexion->consulta("SELECT codigo, medidas FROM boletines_tabla_medidas");
    $datos = Tabla::addId($datos, 1);














    $programa = Programa::crear(

        autor: "sergiod",
        fecha: "17/02/2025",
        nombre: "prg295",

        scriptsCabecera:
        [

        ],

        scriptsBody:
        [
            "js/prg295/ElementosAGuardar.js",
            "js/prg295/Focos.js",
            "js/prg295/Tabla.js",
            "js/prg295/prg295.js",
        ],

        sonidos:
        [
            Sonidos::sonidoEj1->value
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

            // cabecera:
            Cabecera::getCabecera(0, 0),

            $cuerpo = Seccion::crear
            (
                Elemento::getNewId(),
                "cuerpo",
                1,
                0
            ),
            PiePagina::getPiePagina(2, 0),
        ]
    );
    /* #endregion */



    /* #endregion */

    /* #region body */
    $cuerpo->add([

        $cuerpo1 = Seccion::crear(
            Elemento::getNewId(),
            "tabla",
            0,
            0
        ),

        $cuerpo2 = Seccion::crear(
            Elemento::getNewId(),
            "datos",
            0,
            1
        ),
    ]);

    $cuerpo1->add(
        [
            $tabla = Tabla::crear(
                Elemento::getNewId(),
                "",
                ["#", "Código", "Medidas"],
                $datos,
                0,
                0
            )
        ]
    );
    /* #endregion */

    /* #region datos */
    $cuerpo2->add(
        [
            $cuerpo21 = Seccion::crear(
                Elemento::getNewId(),
                "",
                0,
                0
            ),

            $cuerpo22 = Seccion::crear(
                Elemento::getNewId(),
                "",
                1,
                0
            ),
        ],
    );


    $cuerpo21->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Consulta",
            0,
            0
        ),
    ]);


    $cuerpo22->add([

        $seccionTexto = Seccion::crear(
            Elemento::getNewId(),
            "",
            0,
            0
        ),

        $seccionCuadro = Seccion::crear(
            Elemento::getNewId(),
            "",
            0,
            1
        ),
    ]);

    /* #endregion */

    /* #region datos inferior */
    $seccionTexto->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Código:",
            0,
            0
        ),

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Unidad de medidas:",
            1,
            0
        ),

    ]);


    $seccionCuadro->add([

        TextBox::crear(
            "",
            "",
            "",
            "Código",
            0,
            0
        ),
        TextBox::crear(
            "",
            "",
            "",
            "Unidades",
            1,
            0
        ),
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
    $titulo = "prg313";
    //.......................




    //.......................
    $cabecera =
        "
        <meta charset='UTF-8'>
        <title>$titulo</title>
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