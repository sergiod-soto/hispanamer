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
    try {
        $conexion = new Conexion("localhost", "hispanamer", "root", "025811");
        $datos = $conexion->consulta("SELECT codigo, medidas FROM boletines_tabla_medidas");
        $datos = Tabla::addId($datos, 1);
    } catch (Exception) {
        echo ("error conectando con el servidor");
    }
    //
    //












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
        ],

        sonidos:
        [
            Sonidos::sonidoEj1->value
        ],

        css:
        [
            "css/prg295/prg295.css",
            "css/prg295/TimeBox.css",
            "css/prg295/Tabla.css"
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
            $cabecera = Seccion::crear
            (
                Elemento::getNewId(),
                "cabecera",
                0,
                0
            ),

            $cuerpo = Seccion::crear
            (
                Elemento::getNewId(),
                "cuerpo",
                1,
                0
            ),
            $piePagina = Seccion::crear
            (
                "seccion_calc",
                "cabeceraInf",
                2,
                0
            ),
        ]
    );
    /* #endregion */

    /* #region cabecera */
    $cabecera->add(
        [

            $cabeceraSup = Seccion::crear
            (
                Elemento::getNewId(),
                "cabeceraSup",
                0,
                0
            ),

            $cabeceraInf = Seccion::crear
            (
                Elemento::getNewId(),
                "cabeceraInf",
                1,
                0
            ),
        ]
    );
    /* #endregion */

    /* #region cabeceraSup */
    $cabeceraSup->add([

        $botonAtrasCabecera = Button::crear(
            Elemento::getNewId(),
            "",
            iconoFlechaAtras,
            "",
            "console.debug('Atras')",
            10,
            10
        ),

        Link::crear(
            Elemento::getNewId(),
            "",
            "http://localhost/corporativo/prg181.php",
            Target::Blank,
            Imagen::crear(
                Elemento::getNewId(),
                "imagenLogo",
                Imagenes::Hispanamer,
                0,
                0
            ),
            "",
            10,
            20
        ),

        $cabeceraSupp1 = Seccion::crear(
            Elemento::getNewId(),
            "",
            10,
            30
        ),

        $cabeceraSupp2 = Seccion::crear(
            Elemento::getNewId(),
            "",
            10,
            40
        ),

        $cabeceraSupp3 = Seccion::crear(
            Elemento::getNewId(),
            "",
            10,
            50
        ),

        $cabeceraSupp4 = Seccion::crear(
            Elemento::getNewId(),
            "",
            10,
            60
        ),
    ]);

    $cabeceraSupp1->add([

        $cabeceraSupp1_1 = Seccion::crear(
            Elemento::getNewId(),
            "",
            0,
            0
        ),

        $cabeceraSupp1_2 = Seccion::crear(
            Elemento::getNewId(),
            "",
            0,
            0
        ),

    ]);
    $cabeceraSupp1_1->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Sesión iniciada:Enrique Becerra Cabezas",
            0,
            0
        ),
    ]);
    $cabeceraSupp1_2->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Boletines de calidad. Tabla de unidades de medidas.",
            1,
            0
        ),
    ]);
    $cabeceraSupp2->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            Programa::fechaActual(),
            0,
            0
        ),
    ]);
    $cabeceraSupp3->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Versión: patatín-patatán.",
            0,
            0
        ),
    ]);
    $cabeceraSupp4->add([

        Texto::crear(
            Elemento::getNewId(),
            "",
            "Ejercicio fiscal: 2025",
            0,
            0
        ),
    ]);

    /* #endregion */

    /* #region cabeceraInf */
    $cabeceraInf->add(
        [
            $cabeceraInf1 = Seccion::crear
            (
                "",
                "",
                0,
                10
            ),

            $cabeceraInf2 = Seccion::crear
            (
                "",
                "",
                0,
                20
            ),

            $cabeceraInf3 = Seccion::crear
            (
                Elemento::getNewId(),
                "",
                0,
                30
            ),
        ]
    );

    $cabeceraInf1->add([

        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoNuevo,
            "Nuevo",
            "console.debug('clic en nuevo')",
            0,
            0
        ),

        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoEditar,
            "Editar",
            "console.debug('clic en editar')",
            0,
            1
        ),
        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoEliminar,
            "Borrar",
            "console.debug('clic en borrar')",
            0,
            2
        ),
    ]);

    $cabeceraInf2->add([

        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoPDF,
            "Descarga PDF",
            "console.debug('clic en PDF')",
            0,
            0
        ),

        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoEXCEL,
            "Descarga Excel",
            "console.debug('clic en EXCEL')",
            0,
            1
        ),
    ]);

    $cabeceraInf3->add([

        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoGuardar,
            "Guardar",
            "console.debug('clic en guardar')",
            0,
            0
        ),

        Button::crear(
            Elemento::getNewId(),
            "boton-cabecera",
            iconoCancelar,
            "Cancelar",
            "console.debug('clic en cancelar')",
            0,
            1
        ),
    ]);


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
                ["", "Código", "Medidas"],
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
            Elemento::getNewId(),
            "",
            "",
            "Código",
            0,
            0
        ),
        TextBox::crear(
            Elemento::getNewId(),
            "",
            "",
            "Unidades",
            1,
            0
        ),
    ]);
    /* #endregion */

    /* #region pie de pagina */
    $piePagina->add(
        [
            $piePagina1 = Seccion::crear(
                "asd",
                "",
                0,
                0
            ),
            $piePagina2 = Seccion::crear(
                "",
                "",
                0,
                1
            )
        ]
    );

    $piePagina1->add(
        [
            TextBox::crear(
                "calculadoraInput",
                "",
                "",
                "Calculadora",
                0,
                0
            ),
            Texto::crear(
                "separadorCalculadora",
                "",
                " = ",
                0,
                1
            ),
            Texto::crear(
                "calculadoraOutput",
                "",
                "",
                0,
                2
            )
        ]
    );

    $piePagina2->add([
        Texto::crear(
            "piePaginaCosa",
            "",
            "(C)HISPANAMER S.A.  COMPAÑIA HISPANOAMERICANA DE PINTURAS S.A.",
            0,
            0
        )
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
    $titulo = "prg295";
    //.......................




    //.......................
    $cabecera =
        "
        <meta charset='UTF-8'>
        <title>$titulo</title>
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
    $inputJSON = file_get_contents("php://input");
    $input = json_decode($inputJSON, true);
}


?>