<?php

include_once "php/Includes.php";

/**
 * 
 */


class Cabecera
{

    public static function createFunctions($fAtras, $fNuevo, $fEditar, $fBorrar, $fPDF, $fExcel, $fGuardar, $fCancelar)
    {
        return [
            "atras" => $fAtras,
            "nuevo" => $fNuevo,
            "editar" => $fEditar,
            "borrar" => $fBorrar,
            "pdf" => $fPDF,
            "excel" => $fExcel,
            "guardar" => $fGuardar,
            "cancelar" => $fCancelar,
        ];
    }
    public static function getCabecera($fila, $columna, $nombre, $version, $ejercicioFiscal, $functions)
    {
        $cabecera = Seccion::crear
        (
            "cabeceraBase",
            "cabecera",
            $fila,
            $columna
        );

        /* #region cabecera */
        $cabecera->add(
            [

                $cabeceraSup = Seccion::crear
                (
                    "seccionCabeceraSuperior",
                    "cabeceraSup",
                    0,
                    0
                ),

                $cabeceraInf = Seccion::crear
                (
                    "seccionCabeceraInferior",
                    "cabeceraInf",
                    1,
                    0
                ),
            ]
        );
        /* #endregion */

        /* #region cabeceraSup */
        $cabeceraSup->add([

            Button::crear(
                "botonAtrasCabecera",
                "",
                iconoFlechaAtras,
                "",
                $functions["atras"],
                10,
                10
            ),

            Link::crear(
                "",
                "",
                "http://localhost/corporativo/prg181.php",
                Target::Blank,
                Imagen::crear(
                    "",
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
                "",
                "cabeceraSupParte1",
                10,
                30
            ),

            $cabeceraSupp2 = Seccion::crear(
                "",
                "cabeceraSupParte2",
                10,
                40
            ),

            $cabeceraSupp3 = Seccion::crear(
                "",
                "cabeceraSupParte3",
                10,
                50
            ),

            $cabeceraSupp4 = Seccion::crear(
                "",
                "cabeceraSupParte4",
                10,
                60
            ),
        ]);

        $cabeceraSupp1->add([

            $cabeceraSupp1_1 = Seccion::crear(
                "",
                "",
                0,
                0
            ),

            $cabeceraSupp1_2 = Seccion::crear(
                "",
                "",
                1,
                0
            ),

        ]);
        $cabeceraSupp1_1->add([

            Texto::crear(
                "123",
                "",
                "Sesión iniciada:Enrique Becerra Cabezas", // TODO
                0,
                0
            ),
        ]);
        $cabeceraSupp1_2->add([

            Texto::crear(
                "",
                "",
                $nombre,
                0,
                0
            ),
        ]);
        $cabeceraSupp2->add([

            Texto::crear(
                "",
                "",
                Programa::fechaActual(),
                0,
                0
            ),
        ]);
        $cabeceraSupp3->add([

            Texto::crear(
                "",
                "",
                $version,
                0,
                0
            ),
        ]);
        $cabeceraSupp4->add([

            Texto::crear(
                "",
                "",
                "Ejercicio fiscal: $ejercicioFiscal",
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
                    "",
                    "seccionGuardado",
                    0,
                    30
                ),
            ]
        );

        $cabeceraInf1->add([

            Button::crear(
                "",
                "boton-cabecera nuevo",
                iconoNuevo,
                "Nuevo",
                $functions["nuevo"],
                0,
                0
            ),

            Button::crear(
                "",
                "boton-cabecera editar",
                iconoEditar,
                "Editar",
                $functions["editar"],
                0,
                1
            ),
            Button::crear(
                "",
                "boton-cabecera borrar",
                iconoEliminar,
                "Borrar",
                $functions["borrar"],
                0,
                2
            ),
        ]);

        $cabeceraInf2->add([

            Button::crear(
                "",
                "boton-cabecera pdf",
                iconoPDF,
                "Descarga PDF",
                $functions["pdf"],
                0,
                0
            ),

            Button::crear(
                "",
                "boton-cabecera excel",
                iconoEXCEL,
                "Descarga Excel",
                $functions["excel"],
                0,
                1
            ),
        ]);

        $cabeceraInf3->add([

            Button::crear(
                "",
                "boton-cabecera guardar",
                iconoGuardar,
                "Guardar",
                $functions["guardar"],
                0,
                0
            ),

            Button::crear(
                "",
                "boton-cabecera cancelar",
                iconoCancelar,
                "Cancelar",
                $functions["cancelar"],
                0,
                1
            ),
        ]);
        /* #endregion */

        return $cabecera;
    }
}
?>