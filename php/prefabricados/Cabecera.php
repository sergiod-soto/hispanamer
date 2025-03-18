<?php

include_once "php/Includes.php";

/**
 * 
 */


class Cabecera
{

    public static function getCabecera($fila, $columna)
    {
        $cabecera = Seccion::crear
        (
            "",
            "cabecera",
            $fila,
            $columna
        );

        /* #region cabecera */
        $cabecera->add(
            [

                $cabeceraSup = Seccion::crear
                (
                    "",
                    "cabeceraSup",
                    0,
                    0
                ),

                $cabeceraInf = Seccion::crear
                (
                    "",
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
                "",
                "",
                iconoFlechaAtras,
                "",
                "console.debug('Atras')",
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
                "Sesión iniciada:Enrique Becerra Cabezas",
                0,
                0
            ),
        ]);
        $cabeceraSupp1_2->add([

            Texto::crear(
                "",
                "",
                "Boletines de calidad. Tabla de unidades de medidas.",
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
                "Versión: patatín-patatán.",
                0,
                0
            ),
        ]);
        $cabeceraSupp4->add([

            Texto::crear(
                "",
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
                "boton-cabecera",
                iconoNuevo,
                "Nuevo",
                "",
                0,
                0
            ),

            Button::crear(
                "",
                "boton-cabecera",
                iconoEditar,
                "Editar",
                "",
                0,
                1
            ),
            Button::crear(
                "",
                "boton-cabecera",
                iconoEliminar,
                "Borrar",
                "",
                0,
                2
            ),
        ]);

        $cabeceraInf2->add([

            Button::crear(
                "",
                "boton-cabecera",
                iconoPDF,
                "Descarga PDF",
                "",
                0,
                0
            ),

            Button::crear(
                "",
                "boton-cabecera",
                iconoEXCEL,
                "Descarga Excel",
                "",
                0,
                1
            ),
        ]);

        $cabeceraInf3->add([

            Button::crear(
                "",
                "boton-cabecera",
                iconoGuardar,
                "Guardar",
                "",
                0,
                0
            ),

            Button::crear(
                "",
                "boton-cabecera",
                iconoCancelar,
                "Cancelar",
                "",
                0,
                1
            ),
        ]);
        /* #endregion */

        return $cabecera;
    }
}
?>